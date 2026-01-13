<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.index');
})->name('main');

Route::get('/dashboard', function () {
    return view('frontend.pages.dashboard');
})->name('dashboard');

Route::get('/permohonan-saya', function () {
    return view('frontend.pages.applications-index');
})->name('applications.index');

Route::get('/profil', function () {
    return view('frontend.pages.profile-complete'); // untuk edit profil (prototaip guna form sama)
})->name('profile.frontend');

Route::get('/resume/pdf', function () {
    return view('frontend.pages.resume-pdf'); // sementara placeholder dulu
})->name('resume.pdf');

Route::get('/jobs', function () {
    return view('frontend.pages.job-list');
})->name('jobs');

Route::get('/jawatan/{slug}', function ($slug) {
    return view('frontend.pages.job-detail', [
        'slug' => $slug
    ]);
})->name('job.detail');

Route::get('/jawatan/{slug}/mohon', function ($slug) {

    // 1. Belum login
    if (!session()->has('user')) {
        session(['redirect_after_login' => url()->current()]);
        return redirect()->route('login');
    }

    // 2. Profil belum lengkap
    if (empty(session('user.profile_complete'))) {
        session(['redirect_after_profile' => url()->current()]);
        return redirect()->route('profile.complete');
    }

    // 3. Terus SUBMIT permohonan (session)
    $applications = session('applications', []);

    $applications[] = [
        'jawatan' => ucwords(str_replace('-', ' ', $slug)),
        'tarikh_mohon' => now()->format('d/m/Y'),
        'status' => 'Dihantar'
    ];

    session(['applications' => $applications]);

    return redirect()->route('applications.index')
        ->with('success', 'Permohonan jawatan berjaya dihantar.');
})->name('job.apply');

Route::get('/profil/lengkap', function () {
    return view('frontend.pages.profile-complete');
})->name('profile.complete');

Route::post('/profil/lengkap', function (\Illuminate\Http\Request $request) {

    // Simpan data resume dalam session (prototaip)
    session(['resume' => $request->all()]);

    // Set profile_complete = true pada session user
    $user = session('user', []);
    $user['profile_complete'] = true;
    session(['user' => $user]);

    // Balik ke tempat asal (contoh: /jawatan/{slug}/mohon)
    if (session()->has('redirect_after_profile')) {
        $url = session('redirect_after_profile');
        session()->forget('redirect_after_profile');
        return redirect($url)->with('success', 'Profil berjaya dilengkapkan.');
    }

    return redirect()->route('main')->with('success', 'Profil berjaya dilengkapkan.');
})->name('profile.complete.submit');


Route::get('/permohonan-saya', function () {
    return view('frontend.pages.applications-index');
})->name('applications.index');


Route::get('/category', function () {
    return view('frontend.pages.category');
})->name('category');

Route::get('/testimonial', function () {
    return view('frontend.pages.testimonial');
})->name('testimonial');

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

Route::get('/404', function () {
    return view('frontend.pages.404');
})->name('404');


// Login & logout function
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/first-time-login', 'Auth\LoginController@showForm')->name('firsttimelogin.form');
Route::post('/first-time-login', 'Auth\LoginController@sendLink')->name('firsttimelogin.send');

Route::get('register', 'UserController@showPublicRegisterForm')->name('register');
Route::post('register', 'UserController@storePublicRegister')->name('register.store');
Route::get('/verify-email/{token}', 'UserController@verifyEmail')->name('verify.email');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::middleware('auth')->group(function () {

    //Campus
    Route::get('campus', 'CampusController@index')->name('campus');
    Route::get('campus/view/{id}', 'CampusController@show')->name('campus.show');
    Route::get('/campus/search', 'CampusController@search')->name('campus.search');

    //Position
    Route::get('position', 'PositionController@index')->name('position');
    Route::get('position/view/{id}', 'PositionController@show')->name('position.show');
    Route::get('/position/search', 'PositionController@search')->name('position.search');


    Route::get('/home', 'HomeController@index')->name('home');

    // User Profile
    Route::get('profile/{id}', 'UserProfileController@show')->name('profile.show');
    Route::get('profile/{id}/edit', 'UserProfileController@edit')->name('profile.edit');
    Route::put('profile/{id}', 'UserProfileController@update')->name('profile.update');
    Route::get('profile/{id}/change-password', 'UserProfileController@changePasswordForm')->name('profile.change-password');
    Route::post('profile/{id}/change-password', 'UserProfileController@changePassword')->name('profile.update-password');

    // Superadmin - Activity Log
    Route::get('activity-log', 'ActivityLogController@index')->name('activity-log');
    Route::get('/debug-logs', 'ActivityLogController@showDebugLogs')->name('logs.debug');

    // User Management
    Route::get('user', 'UserController@index')->name('user');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('user/store', 'UserController@store')->name('user.store');
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('user/{id}', 'UserController@update')->name('user.update');
    Route::get('user/view/{id}', 'UserController@show')->name('user.show');
    Route::get('/user/search', 'UserController@search')->name('user.search');
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('/user/trash', 'UserController@trashList')->name('user.trash');
    Route::get('/user/{id}/restore', 'UserController@restore')->name('user.restore');
    Route::delete('/user/{id}/force-delete', 'UserController@forceDelete')->name('user.forceDelete');

    // User Role Management
    Route::get('user-role', 'UserRoleController@index')->name('user-role');
    Route::get('user-role/create', 'UserRoleController@create')->name('user-role.create');
    Route::post('user-role/store', 'UserRoleController@store')->name('user-role.store');
    Route::get('user-role/{id}/edit', 'UserRoleController@edit')->name('user-role.edit');
    Route::post('user-role/{id}', 'UserRoleController@update')->name('user-role.update');
    Route::get('user-role/view/{id}', 'UserRoleController@show')->name('user-role.show');
    Route::get('/user-role/search', 'UserRoleController@search')->name('user-role.search');
    Route::delete('user-role/{id}', 'UserRoleController@destroy')->name('user-role.destroy');
    Route::get('/user-role/trash', 'UserRoleController@trashList')->name('user-role.trash');
    Route::get('/user-role/{id}/restore', 'UserRoleController@restore')->name('user-role.restore');
    Route::delete('/user-role/{id}/force-delete', 'UserRoleController@forceDelete')->name('user-role.forceDelete');

    //Campus
    Route::get('campus/create', 'CampusController@create')->name('campus.create');
    Route::post('campus/store', 'CampusController@store')->name('campus.store');
    Route::get('campus/{id}/edit', 'CampusController@edit')->name('campus.edit');
    Route::post('campus/{id}', 'CampusController@update')->name('campus.update');
    Route::delete('campus/{id}', 'CampusController@destroy')->name('campus.destroy');
    Route::get('/campus/trash', 'CampusController@trashList')->name('campus.trash');
    Route::get('/campus/{id}/restore', 'CampusController@restore')->name('campus.restore');
    Route::delete('/campus/{id}/force-delete', 'CampusController@forceDelete')->name('campus.forceDelete');

    //Position
    Route::get('position/create', 'PositionController@create')->name('position.create');
    Route::post('position/store', 'PositionController@store')->name('position.store');
    Route::get('position/{id}/edit', 'PositionController@edit')->name('position.edit');
    Route::post('position/{id}', 'PositionController@update')->name('position.update');
    Route::delete('position/{id}', 'PositionController@destroy')->name('position.destroy');
    Route::get('/position/trash', 'PositionController@trashList')->name('position.trash');
    Route::get('/position/{id}/restore', 'PositionController@restore')->name('position.restore');
    Route::delete('/position/{id}/force-delete', 'PositionController@forceDelete')->name('position.forceDelete');
});
