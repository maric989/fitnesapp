<div>
    <div class="admin-left-menu-logo">
        <a href="/admin/dashboard">
            <img src="{{ asset('/images/admin-logo.png') }}" alt="My Aura" />
        </a>
    </div>
    <div class="admin-left-menu-options">
        <a href="/admin/dashboard" class="admin-left-menu-option flex v-align-center relative {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <div class="menu-icon home-icon absolute"></div>
            <div class="menu-icon home-icon active-icon absolute"></div>
            <div class="text">Dashboard</div>
        </a>
        <a href="{{ route('admin.program.paginate') }}" class="admin-left-menu-option flex v-align-center relative {{ Request::is('admin/programs') || Request::is('admin/programs/*') ? 'active' : '' }}">
            <div class="menu-icon programs-icon absolute"></div>
            <div class="menu-icon programs-icon active-icon absolute"></div>
            <div class="text">Programs</div>
        </a>
        <a href="{{ route('admin.lessons.paginate') }}" class="admin-left-menu-option flex v-align-center relative {{ Request::is('admin/lessons') || Request::is('admin/lessons/*') ? 'active' : '' }}">
            <div class="menu-icon lessons-icon absolute"></div>
            <div class="menu-icon lessons-icon active-icon absolute"></div>
            <div class="text">Lessons</div>
        </a>
        <a href="{{ route('admin.coach.paginate') }}" class="admin-left-menu-option flex v-align-center relative">
            <div class="menu-icon coaches-icon absolute"></div>
            <div class="menu-icon coaches-icon active-icon absolute"></div>
            <div class="text">Coaches</div>
        </a>
        <a href="/admin" class="admin-left-menu-option flex v-align-center relative">
            <div class="menu-icon transactions-icon absolute"></div>
            <div class="menu-icon transactions-icon active-icon absolute"></div>
            <div class="text">Transactions</div>
        </a>
        <a href="{{ route('admin.users.paginate') }}" class="admin-left-menu-option flex v-align-center relative">
            <div class="menu-icon users-icon absolute"></div>
            <div class="menu-icon users-icon active-icon absolute"></div>
            <div class="text">Users</div>
        </a>
        <a href="/admin" class="admin-left-menu-option flex v-align-center relative">
            <div class="menu-icon settings-icon absolute"></div>
            <div class="menu-icon settings-icon active-icon absolute"></div>
            <div class="text">Settings</div>
        </a>
    </div>
</div>
