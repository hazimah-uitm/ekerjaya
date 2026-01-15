<div class="sidebar-header">
    <div>
        <img src="{{ asset('public/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
    </div>
    <div>
        <h4 class="logo-text">eKERJAYA</h4>
    </div>
    <div class="toggle-icon ms-auto" id="toggle-icon"><i class='bx bx-arrow-to-left'></i></div>
</div>

<!--navigation-->
<ul class="metismenu" id="menu">
    <li class="{{ Request::routeIs('main') ? 'mm-active' : '' }}">
        <a href="{{ route('main') }}">
            <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
            <div class="menu-title">Utama</div>
        </a>
    </li>

    @role('Majikan')
        <li class="{{ Request::routeIs('majikan.dashboard') ? 'mm-active' : '' }}">
            <a href="{{ route('majikan.dashboard') }}">
                <div class="parent-icon"><i class='bx bxs-dashboard'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Pengurusan Rekod</li>
        <li class="{{ Request::routeIs('majikan.profile.show') ? 'mm-active' : '' }}">
            <a href="{{ route('majikan.profile.show') }}">
                <div class="parent-icon"><i class='bx bx-user'></i></div>
                <div class="menu-title">Profil Majikan</div>
            </a>
        </li>
        <li class="{{ Request::routeIs('majikan.vacancy.index') ? 'mm-active' : '' }}">
            <a href="{{ route('majikan.vacancy.index') }}">
                <div class="parent-icon"><i class='bx bx-file'></i></div>
                <div class="menu-title">Pengurusan Jawatan Kosong</div>
            </a>
        </li>
        <li class="{{ Request::routeIs('majikan.application.index') ? 'mm-active' : '' }}">
            <a href="{{ route('majikan.application.index') }}">
                <div class="parent-icon"><i class='bx bx-data'></i></div>
                <div class="menu-title">Pengurusan Permohonan</div>
            </a>
        </li>
    @endrole

    @hasanyrole('Superadmin|Admin')
        <li class="{{ Request::routeIs('admin.dashboard') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bxs-dashboard'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Pengurusan Pengguna</li>

        <li class="{{ Request::is('user*') && !Request::is('user-role*') ? 'mm-active' : '' }}">
            <a href="{{ route('user') }}">
                <div class="parent-icon"><i class='bx bx-user-circle'></i></div>
                <div class="menu-title">Pengguna</div>
            </a>
        </li>

        <li class="menu-label">Pengurusan Rekod</li>

        <li class="{{ Request::is('admin.majikan.approval.index') ? 'mm-active' : '' }}">
            <a href="{{ route('admin.majikan.approval.index') }}">
                <div class="parent-icon"><i class='bx bx-group'></i></div>
                <div class="menu-title">Permohonan Majikan</div>
            </a>
        </li>
    @endhasanyrole

    @role('Superadmin')
        <li class="{{ Request::is('user-role*') ? 'mm-active' : '' }}">
            <a href="{{ route('user-role') }}">
                <div class="parent-icon"><i class='bx bx-shield'></i></div>
                <div class="menu-title">Peranan Pengguna</div>
            </a>
        </li>

        <li class="menu-label">Lain-lain</li>

        <li class="{{ Request::routeIs('activity-log') ? 'mm-active' : '' }}">
            <a href="{{ route('activity-log') }}">
                <div class="parent-icon"><i class='bx bx-history'></i></div>
                <div class="menu-title">Log Aktiviti</div>
            </a>
        </li>

        <li class="{{ Request::routeIs('logs.debug') ? 'mm-active' : '' }}">
            <a href="{{ route('logs.debug') }}">
                <div class="parent-icon"><i class='bx bxs-bug'></i></div>
                <div class="menu-title">Debug Log</div>
            </a>
        </li>
    @endrole
</ul>
<!--end navigation-->
