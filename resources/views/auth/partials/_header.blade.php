<header class="oks-sign-up-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-8 col-5">
                <div class="site-logo">
                    <a href="user/dashboard">
                        <img src="{{ Storage::url(App\Services\SettingService::getSetting('user_dashbord_logo')) }}" alt="Dashboard Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-2 col-2">
                <div class="oks-main-menu">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <div class="oks-primary-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>
                                    <div class="oks-submenu-container">
                                        <a href="javascript:void(0)">Explore<i
                                                class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="/austria">Austria</a></li>
                                            <li><a href="/belgium">Belgium</a></li>
                                            <li><a href="/finland">Finland</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="oks-submenu-container">
                                        <a href="javascript:void(0)">Discover<i
                                                class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a
                                                    href="{{ route('course.get', ['name' => 'Bachelors']) }}">Bachelors</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('course.get', ['name' => 'Masters']) }}">Masters</a>
                                            </li>
                                            <li><a href="{{ route('course.get', ['name' => 'PhD']) }}">PhD</a>
                                            </li>
                                            <li><a
                                                    href="{{ route('course.get', ['name' => 'Others']) }}">Others</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="/services">Services</a></li>
                                <li><a href="/blogs">Blog</a></li>
                                <li><a href="/about">About</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-5">
                <div class="oks-user-info">
                    <ul>
                        <li><a href="/login"><i class="fa-solid fa-user"></i></a></li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
</header>

