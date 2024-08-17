<!doctype html>

<html>

<head>
     <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <title>{{ App\Services\SettingService::getSetting('site_title') }} |
        {{ App\Services\SettingService::getSetting('tagline') }}</title>
    @if (!Auth::check())
        @include('layouts.styles')
    @else
        @include('user._styles')
    @endif
</head>

<body>
    <!-- site header -->
    @include('layouts.header')

    <!-- Banner section -->
    <section class="oks-about-banner" style="background-image: url({{ Storage::url($blog->image) }});">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="oks-banner-content detail-blog">
                        <h1 class="">{{ $blog->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="oks-blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="oks-single-blog-detail">
                        <h1>{{ $blog->title }}</h1>
                        <ul>
                            <li>
                                <i class="fa-solid fa-calendar-days"></i>{{ date('F j, Y', strtotime($blog->datetime)) }}

                            </li>
                            <li><i class="fa-solid fa-user"></i>{{ $blog->authorname }}</li>
                        </ul>
                        <p>{!! $blog->description !!}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="oks-sinlge-sidebar">
                        <div class="oks-categories-list">
                            <h3>Category</h3>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-circle"></i>
                                    <a href="{{ route('get.category.blogs', $blog->blogCategory->id) }}">{{ $blog->blogCategory->blogcategory }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="oks-categories-list">
                            <h3>Follow Us</h3>
                            <ul class="single-icon">
                                <li><a href="https://twitter.com/TheOfficialEkas" target="_blank"><object
                                            type="image/svg+xml" data="image/x-twitter.svg"></object></a></li>
                                <li><a href="https://www.instagram.com/theofficialekas?igsh=MWl5ZDRjYTFqNzU2bQ=="
                                        target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=61553192048665"><i
                                            class="fa-brands fa-facebook" target="_blank"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCWTC1VlAUgygEtFAAAK0QEQ"><i
                                            class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="https://www.tiktok.com/@theofficialekas?_t=8kf4I7Av7AX&_r=1"
                                        target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.sections.subscribe')
    <!-- footer -->
    @include('layouts.footer')

    <script type="text/javascript" src="js/scripts.js"></script>
</body>

</html>
