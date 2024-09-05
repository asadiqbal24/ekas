<!doctype html>

<html>

<head>
    @if (!Auth::check())
    @include('layouts.styles')
    @else
    @include('user._styles')
    @endif
    <title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css">
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        #loader_image {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif') 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>
</head>

<body>
    <!-- site header -->
    @include('layouts.header')
    <!-- Banner section -->

    {{-- <div id="loader_image" style="display: none;"></div> --}}


    {{-- <section class="oks-explore-banner"  style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/austria-background.jpeg); background-position: center; background-size: cover;">>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<div class="oks-banner-content">
						<h1>Austria</h1>
						<p>Welcome to the heart of Europe! If you're contemplating studying abroad, consider Austria, a country that seamlessly blends rich cultural heritage, academic excellence, and stunning landscapes. Here are several compelling reasons to choose Austria for your higher education journey!.</p>
					</div>
				</div>
			</div>
		</div>
	</section> --}}



    @php

    $type = request()->type ?? 'ekas';

    @endphp


    @if($type == 'ekas')

    <style>
        #book-progressbar li:first-child {
            margin-left: 10px;
        }
    </style>
    @else
    <style>
        #book-progressbar li:first-child {
            margin-left: 70px;
        }
    </style>
    @endif



    <section class="oks-signup-form" id="book-consult-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="oks-section-content">
                        <h2>{{ucfirst($type)}} Guidance Document </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 col-lg-5 col-md-8 m-auto">
                    <div class="sign-up-progressbar">
                        <div class="sign-up-heading oks-book-time-heading">
                            <h3></h3>
                        </div>
                        <ul id="book-progressbar">
                            <li>Personal Info<span></span></li>
                          
                            <li>Payment<span></span></li>
                            
                            <li class="active">Document<span></span></li>
                        </ul>
                    </div>
                    <div class="oks-book-consultent-wrap">

                        <div class="form-step" >
                            <div class="mb-3">
                                <div class="form-group">
                                    <label style="font-weight: bold; font-size: 1.2em;">{{ucfirst($type)}} Austria Guidance Document
                                    </label>

                                </div>

                                @php
                                $path = 'download-pdf/austria/'.$type;
                                @endphp
                                <a href="{{url($path)}}" target="_blank">
                                    <img src="https://static-00.iconduck.com/assets.00/file-type-pdf-icon-1962x2048-ydoe3jot.png" alt="Download PDF" width="50" height="50"> {{ucfirst($type)}} Austria Guidance.pdf
                                </a>

                           
                            
                                <div class="book-buttons">
                                    <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                </div>
                            </div>
                            
                          
                        </div>



                    

                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
    $(document).ready(function() {
       
        $('.previous-btn').on('click', function() {
           
            window.location.href = '/user/dashboard';
        });
    });
</script>



</body>

</html>