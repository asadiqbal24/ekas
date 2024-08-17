<!doctype html>
<html>
@if (!Auth::check())
    @include('layouts.styles')
@else
    @include('user._styles')
    @include('layouts.styles')
@endif

<head>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <base href="/">
    <meta content="{{ App\Services\SettingService::getSetting('meta_description') }}" name="description" />
</head>

<body style="overflow-x: hidden">
    @if (Request::is('login'))
        @include('user._header')
    @else
        @include('layouts.header')
    @endif

    @if (
        !Request::is('register') &&
        !Request::is('login') &&
        !Request::is('password/*') &&
        !Request::is('email/*') &&
        !Request::is('book/consult') &&
        !Request::is('document-checker')
    )
        @include('layouts.sections.banner')
    @endif
    @yield('content')
    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    {{-- jquery toaster --}}
    <link rel="stylesheet" href="toast/styles.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css">

    <script src="toast/toast-plugin.js"></script>
    @yield('page-scripts')
    @yield('banner-scripts')

    <script>
        $(document).on('click', '.btn-close', function() {
            $('.alert-dismissible').css('display', 'none');
        });
        $(document).on('click', '.show-pass-eye-btn', function() {
            if ($('.show-password').attr('type') === 'password') {
                $('.show-password').attr('type', 'text');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('.show-password').attr('type', 'password');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
        $(document).on('click', '.auth-btn', function() {
            window.location.href = $(this).attr('href');
        });
        $(document).on('click', '.logout-btn', function() {
            $('#logoutForm').submit();
        });
        $(document).on('click', '.login-redirect', function() {
            window.location.href = '/login';
        });

        function showSuccessToast(message) {
            $.toast({
                title: "Success!",
                message: message,
                type: "success",
                duration: 5000
            });
        }

        function showErrorToast(message) {
            $.toast({
                title: "Error!",
                message: message,
                type: "error",
                duration: 5000
            });
        }
    </script>
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

    @if (session('error'))
        <script>
            $.toast({
                title: "Error!",
                message: {!! json_encode(session('error')) !!},
                type: "error",
                duration: 5000
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            // Add event listener to the body
            $('body').on('click', function() {
                $('.mypages-container').removeClass('toggle');
            });

            $('.my-pages').on('click', function(event) {
                event.stopPropagation();
            });
        });
    </script>

</body>

</html>
