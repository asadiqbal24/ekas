<html>

<head>
    <title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
     <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    @if (!Auth::check())
        @include('layouts.styles')
    @else
        @include('user._styles')
    @endif
</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    <!-- site header -->
    @include('layouts.header')
    <!-- Banner section -->
    <section class="oks-explore-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="oks-banner-content">
                        <h1>Explore</h1>
                        <!-- <p>Discover the country you would like  to go</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.sections.discover')
    @include('layouts.sections.subscribe')
    @include('layouts.footer')
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $(document).on('click', '.auth-btn', function() {
            window.location.href = $(this).attr('href');
        })
        $(document).on('click', '.login-redirect', function() {
            window.location.href = '/login';
        })
        $(document).on('click', '.logout-btn', function() {
            $('#logoutForm').submit();
        })
    </script>
    <link rel="stylesheet" href="toast/styles.css">
    <script src="toast/toast-plugin.js"></script>
    @if (session('success'))
        <script>
            $.toast({
                title: "Success!",
                message: {!! json_encode(session('success')) !!},
                type: "success",
                duration: 5000
            });
        </script>
    @endif
</body>

</html>
