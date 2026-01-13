<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\EmailVerificationToken;
use App\Models\Position;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use SoftDeletes;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);

        $userList = User::latest()->paginate($perPage);

        return view('pages.user.index', [
            'userList' => $userList,
            'perPage' => $perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('publish_status', 1)->get();

        return view('pages.user.create', [
            'save_route' => route('user.store'),
            'str_mode' => 'Tambah',
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'roles'    => 'required|array|exists:roles,name',
            'publish_status' => 'required|in:1,0',
        ], [
            'name.required'     => 'Sila isi nama pengguna',
            'email.required'    => 'Sila isi emel pengguna',
            'email.unique'    => 'Emel telah wujud',
            'roles.required'    => 'Sila isi peranan pengguna',
            'publish_status.required' => 'Sila isi status pengguna',
        ]);

        $user = new User();
        $user->fill($request->except('roles'));
        $user->password = null; // Password will be set later via email link
        $user->email_verified_at = null; // Email verification pending
        $user->save();

        // Assign roles to the user
        $user->assignRole($request->input('roles'));

        // Send password reset link to the new user with the isNewAccount flag set to true
        $token = Password::broker()->createToken($user);
        $user->notify(new ResetPasswordNotification($token, true));

        return redirect()->route('user')
            ->with('success', 'Maklumat berjaya disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('pages.user.view', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('publish_status', 1)->get();

        return view('pages.user.edit', [
            'save_route' => route('user.update', $id),
            'str_mode' => 'Kemas Kini',
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email,' . $id,
            'roles'      => 'required|array|exists:roles,name',
            'publish_status' => 'required|in:1,0',
        ], [
            'name.required'     => 'Sila isi nama pengguna',
            'email.required'    => 'Sila isi emel pengguna',
            'email.unique'    => 'Emel telah wujud',
            'roles.required'    => 'Sila isi peranan pengguna',
            'publish_status.required' => 'Sila isi status pengguna',
        ]);

        $user = User::findOrFail($id);
        $user->fill($request->except('roles', 'password'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        $user->syncRoles($request->input('roles'));

        return redirect()->route('user')
            ->with('success', 'Maklumat berjaya dikemaskini');
    }

    public function showPublicRegisterForm()
    {
        return view('auth.register');
    }

    public function storePublicRegister(Request $request)
    {
        $request->validate([
            'register_as' => 'required|in:jobseeker,employer',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'register_as.required' => 'Sila pilih pendaftaran sebagai Majikan atau Pencari Kerja',
            'register_as.in'       => 'Pilihan pendaftaran tidak sah',
            'name.required'        => 'Sila masukkan nama anda',
            'email.required'       => 'Sila masukkan alamat emel anda',
            'email.unique'         => 'Alamat emel ini telah wujud',
            'password.required'    => 'Sila masukkan kata laluan',
            'password.min'         => 'Kata laluan minimum 8 aksara',
            'password.confirmed'   => 'Pengesahan kata laluan tidak sepadan',
        ]);

        // Map pilihan UI -> Nama role dalam DB (Spatie roles)
        $roleName = $request->register_as === 'employer' ? 'Majikan' : 'Pencari Kerja';

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->publish_status = 1;
        $user->email_verified_at = null;
        $user->save();

        // Assign role ikut pilihan
        $user->assignRole($roleName);

        // Generate token verification (kekal macam flow kau)
        $token = Str::random(40);

        EmailVerificationToken::updateOrCreate(
            ['user_id' => $user->id],
            ['token' => $token]
        );

        $user->notify(new EmailVerificationNotification($user, $token));

        return view('auth.register-confirm');
    }


    public function verifyEmail($token)
    {
        $record = EmailVerificationToken::where('token', $token)->first();

        if (!$record) {
            return redirect('/login')->withErrors(['msg' => 'Token tidak sah atau telah luput.']);
        }

        $user = User::find($record->user_id);
        $user->email_verified_at = Carbon::now();
        $user->save();

        // Padam token selepas sah
        $record->delete();

        return redirect('/login')->with('success', 'Emel anda telah disahkan. Sila log masuk.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();

        return redirect()->route('user')->with('success', 'Maklumat berjaya dihapuskan');
    }

    public function trashList()
    {
        $trashList = User::onlyTrashed()->latest()->paginate(10);

        return view('pages.user.trash', [
            'trashList' => $trashList,
        ]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->restore();

        return redirect()->route('user')->with('success', 'Maklumat berjaya dikembalikan');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('user.trash')->with('success', 'Maklumat berjaya dihapuskan sepenuhnya');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $userList = User::where('name', 'LIKE', "%$search%")
                ->latest()
                ->paginate(10);
        } else {
            $userList = User::latest()->paginate(10);
        }

        return view('pages.user.index', [
            'userList' => $userList,
        ]);
    }
}
