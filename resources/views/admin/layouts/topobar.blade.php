<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="/admin" class="logo logo-dark">
                    <span class="logo-sm">
                    </span>
                    <span class="logo-lg">
                        <img src="image/Logo.png" alt="" height="17">
                    </span>
                </a>
                <a href="/admin" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{Storage::url(App\Services\SettingService::getSetting('dashboard_logo'))}}" alt="" height="22">
                    </span>
                    <img src="{{Storage::url(App\Services\SettingService::getSetting('dashboard_logo'))}}" alt="Logo" height="18" style="height: auto; width: 120px;">
                </a>
            </div>
            <style>
                .logo-lg {
                    color: white;
                }
            </style>
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{Storage::url(App\Services\SettingService::getSetting('site_logo'))}}" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger admin-logout-btn" href="javascript:void(0)">
                        <i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>
                        Logout
                    </a>
                    <form action="/logout" method="post" id="adminLogoutForm">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</header>
