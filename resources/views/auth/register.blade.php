<!doctype html>

<html>
<title>{{ App\Services\SettingService::getSetting('site_title') }} |
    {{ App\Services\SettingService::getSetting('tagline') }}</title>
@include('auth.partials._styles')
<style>
    @media (max-width: 600px) {
        .oks-login-footer {
            padding: 0 !important;
            margin-top: 300px;
        }

        .oks-signup-form-wrap {
            width: 92% !important;
            margin-top: 100px;
        }
    }
</style>

<body>
    <div class="oks-signup-ani-wrap">
        <div class="oks-signup-animation">
            @include('auth.partials._header')
            @include('auth.partials._register')
            @include('auth.partials._footer')
        </div>
        @include('layouts.sections.cloud-animation')
    </div>

    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $(document).on('click', '.show-pass-eye-btn', function() {
            if ($('.show-password').attr('type') === 'password') {
                $('.show-password').attr('type', 'text');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('.show-password').attr('type', 'password');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        $(document).on('click', '#oks-first-btn', function() {
    if ($('#email').val() == '') {
        $(this).prop('disabled', true);
    }
});

    </script>
</body>

</html>
