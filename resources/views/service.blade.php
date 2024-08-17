
<!doctype html>

<html>
<head>
     <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
    <base href="/">
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
	<section class="oks-about-banner" style="background-image: linear-gradient(rgb(0 0 0 / 60%), rgb(0 0 0 / 60%)),url(image/counseling.jpeg);">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<div class="oks-banner-content">
						<h1>Services</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Services section -->
	@include('layouts.sections.service')

    @include('layouts.sections.subscribe')
	<!-- footer -->
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