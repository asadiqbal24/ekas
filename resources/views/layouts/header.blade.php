@if(!Auth::check())
<header class="site-header">
    <div class="container">
        <div class="row align-items-center main-header">
            <div class="col-lg-4 col-md-8 col-5">
                <div class="site-logo">
                    <a href="/">
                        <img src="{{Storage::url(App\Services\SettingService::getSetting('site_logo'))}}">
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
                                        <a href="/explore">Explore<i class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="/austria">Austria</a></li>
                                            <li><a href="/belgium">Belgium</a></li>
                                            <li><a href="/finland">Finland</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="oks-submenu-container">
                                        <a href="get/courses">Discover<i class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{url('get/courses?level=Bachelors')}}">Bachelors</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=Masters')}}">Masters</a>
                                            <li><a href="{{url('get/courses?level=Masters')}}">Advanced Masters</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=PhD')}}">PhD</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=Others')}}">Others</a>
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
                        <li><a href="javascript:void(0)" class="ekas-login"><i class="fa-solid fa-heart"></i></a></li>
                        <li><a href="/login"><i class="fa-solid fa-user"></i></a></li>
                    </ul>
                    <div class="eks-login-popup">
                        <i class="fa-solid fa-xmark"></i>
                        <h3>Add as favourite</h3>
                        <p>You need to log in to add the course/programme as a favourite</p>
                        <a href="/login">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endif

@if(Auth::check())
<header class="site-header">
    <div class="container">
        <div class="row align-items-center main-header">
            <div class="col-lg-4 col-md-8 col-5">
                <div class="site-logo">
                    <a href="/">
                        <img src="{{Storage::url(App\Services\SettingService::getSetting('site_logo'))}}">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-2 col-2">
                <div class="oks-main-menu">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                            <i class="fa-solid fa-xmark" ></i>
                        </button>
                        <div class="oks-primary-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li>
                                    <div class="oks-submenu-container">
                                        <a href="/explore">Explore<i class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="austria">Austria</a></li>
                                            <li><a href="belgium">Belgium</a></li>
                                            <li><a href="finland">Finland</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="oks-submenu-container">
                                        <a href="get/courses">Discover<i class="fa-solid fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="{{url('get/courses?level=Bachelors')}}">Bachelors</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=Masters')}}">Masters</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=PhD')}}">PhD</a>
                                            </li>
                                            <li><a href="{{url('get/courses?level=Others')}}">Others</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="services">Services</a></li>
                                <li><a href="blogs">Blog</a></li>
                                <li><a href="about">About</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-5">
                <div class="oks-user-log-info">
                    <ul>
                        <li class="oks-user-login">
                            <a href="user/dashboard" class="my-pages"><i class="fa-solid fa-user" ></i></a>
                            <div class="mypages-container" >
                                <div class="name">
                                    <span class="username"><a href="user/dashboard">{{Auth::user()->fname}} {{Auth::user()->lname}}</a></span>
                                </div>
                                <div class="submenu_content">
                                    <nav aria-label="My pages" class="menu">
                                        <ul class="plain-list">
                                            <li class="menu-item application selected" aria-current="page">
                                                <a href="user/dashboard" class="auth-btn"><i class="fa-solid fa-user"></i>Dashboard</a>
                                            </li>
                                            <li class="menu-item application selected" aria-current="page"><a href="user/profile" class="auth-btn"><i class="fa-solid fa-user-pen"></i>Edit Profile</a></li>
                                            <li class="menu-item log-out" aria-current="page">
                                                <a href="javascript:void(0)" class="logout-btn">Log Out</a>
                                            </li>
                                            <form action="/logout" method="post" id="logoutForm">
                                                @csrf
                                            </form>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
@endif