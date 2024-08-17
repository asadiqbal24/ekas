<!doctype html>

<html>

<head>
     <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <base href="/">
    <title>{{ App\Services\SettingService::getSetting('site_title') }} |
        {{ App\Services\SettingService::getSetting('tagline') }}</title>
    @if (!Auth::check())
        @include('layouts.styles')
    @else
        @include('user._styles')
    @endif

    <style>
     .component {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem;
}

.component blockquote.quote {
    position: relative; 
    text-align: center;
    padding: 1rem 1.2rem;
    width: 100%;
    color: #484748;
    margin: 1rem auto 2rem;
}

.emphasized-text {
    color: #1b4ba6;
    font-weight: bold;
    font-size: 20px;
}

.component blockquote.quote:before,
.component blockquote.quote:after {
    font-family: FontAwesome;
    position: absolute;
    color: #1b4ba6;
    font-size: 34px;
}

.component blockquote.EN:before {
    content: "\f10d";
    top: -12px;
    margin-right: -20px;
    right: 100%;
}

.component blockquote.EN:after {
    content: "\f10e";
    margin-left: -20px;
    left: 100%;  
    top: auto;
    bottom: -20px;
}

.component blockquote.DE:before {
    content: "\f10e";
    margin-right: -20px;
    bottom: -20px;
    right: 100%;
}

.component blockquote.DE:after {
    content: "\f10d";
    margin-left: -20px;
    left: 100%;  
    top: -20px;
    bottom: auto;
}
/* Adjustments for mobile devices */
@media (max-width: 768px) {
    .component {
        padding: 1rem;
    }

    .component blockquote.quote {
        padding: 0.5rem;
        margin: 0.5rem 0;
        text-align: justify; /* Justify text on mobile */
    }

    .component blockquote.EN:before,
    .component blockquote.EN:after,
    .component blockquote.DE:before,
    .component blockquote.DE:after {
        font-size: 24px;
    }
}


        </style>
</head>

<body>
    <!-- site header -->
    @include('layouts.header')
    <!-- Banner section -->
    <section class="oks-about-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="oks-banner-content">
                        <h1>About ekas</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blockquote Content -->
    <section class="oks-about-content-sec" data-aos="fade-top" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-2">
                   

                </div>
                <div class="col-lg-10 col-md-10">
                      
                <section class="component">
<blockquote class="callout quote EN">
  Ever felt buried under an avalanche of information, drowning in countless suggestions and tangled up in overcomplicated procedures? We've been there too. That's exactly why we created ekas. Our platform is designed to simplify your search, offering everything you need to discover your dream course.


  </blockquote>
    <p class="emphasized-text text-center">Effortless. Easy. ekas.</p>
 
  </section>
                </div>
                <div class="col-lg-1 col-md-2">
                   
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="oks-our-teams-sec" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="oks-section-content">
                        <h2>Meet The Team</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="gap:20px;">
                <div class="col-lg-3 col-md-6">
                    <div class="oks-team-member">
                        <div class="team-image">
                            <img src="image/team-2.jpeg">
                        </div>
                        <div class="oks-content">
                            <h3>Dr. Ali Shirazi</h3>
                            <small>C E O</small>
                        </div>
                        <div class="oks-main-content">
                            <i class="oks-popup-cross-btn">x</i>
                            <div class="oks-team-popup-info">
                                <div class="team-image">
                                    <img src="image/team-2.jpeg">
                                </div>
                                <div class="oks-content">
                                    <h3>Dr. Ali Shirazi</h3>
                                    <small>C E O</small>
                                </div>
                            </div>
                            <div class="oks-content-popup">
                                <p>Dr. Ali Shiraz is a management professional who has worked in the industry for 17
                                    Years. He has a PhD in Mechanical Engineering from the University Of Leuven, Belgium
                                    and a Masters in Quality Technology & Management from Chalmers University, Sweden.
                                    He has vast work experience in different multinationals and Big 4 consulting firms.
                                    He is a TEDx speaker and worked with EU & other institutions as socio religious
                                    experts and activist. Dr. Shirazi has strong connections with academia and industry
                                    and he guides youth on education & career development. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oks-team-member">
                        <div class="team-image">
                            <img src="image/team-cus.png">
                        </div>
                        <div class="oks-content">
                            <h3>Mr. Wassi Syed</h3>
                            <small>C O O</small>
                        </div>
                        <div class="oks-main-content">
                            <i class="oks-popup-cross-btn">x</i>
                            <div class="oks-team-popup-info">
                                <div class="team-image">
                                    <img src="image/team-cus.png">
                                </div>
                                <div class="oks-content">
                                    <h3>Mr. Wassi Syed</h3>
                                    <small>C O O</small>
                                </div>
                            </div>
                            <div class="oks-content-popup">
                                <p>Wassi Haider Syed's extensive experience as a Managing Director in diverse ventures,
                                    from steering international expansions to revitalising struggling businesses,
                                    showcases his strategic prowess. Wassi's success in establishing innovative online
                                    platforms further underscores his adaptability and knack for steering startups into
                                    thriving ventures. With a wealth of expertise in business development, branding, and
                                    strategic management, Wassi stands as a pivotal figure perfectly positioned to drive
                                    ekas forward, aligning seamlessly with the startup's ambitions and growth trajectory
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="gap:20px;">
                <div class="col-lg-3 col-md-6">
                    <div class="oks-team-member">
                        <div class="team-image">
                            <img src="image/team-3.png">
                        </div>
                        <div class="oks-content">
                            <h3>Mr. Ali Kazmi</h3>
                            <small>C M O</small>
                        </div>
                        <div class="oks-main-content">
                            <i class="oks-popup-cross-btn">x</i>
                            <div class="oks-team-popup-info">
                                <div class="team-image">
                                    <img src="image/team-3.png">
                                </div>
                                <div class="oks-content">
                                    <h3>Mr. Ali Kazmi</h3>
                                    <small>C M O</small>
                                </div>
                            </div>
                            <div class="oks-content-popup">
                                <p>Ali is an individual with a degree in Management from a prestigious university in
                                    London. Leveraging a diverse range of experiences across various professional
                                    fields, Ali has crafted a compelling narrative that propels the vision of ekas. With
                                    a deep understanding of the aspirations of individuals in South Asia, Ali's mission
                                    is to clarify the complexities of pursuing further studies abroad. The ultimate
                                    objective is to empower every aspirant from South Asia, ensuring they can embark on
                                    a transformative academic journey with confidence and clarity.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oks-team-member">
                        <div class="team-image">
                            <img src="image/team-5.jpeg">
                        </div>
                        <div class="oks-content">
                            <h3>Ms. Nida E Zainab</h3>
                            <small>C B D O</small>
                        </div>
                        <div class="oks-main-content">
                            <i class="oks-popup-cross-btn">x</i>
                            <div class="oks-team-popup-info">
                                <div class="team-image">
                                    <img src="image/team-5.jpeg">
                                </div>
                                <div class="oks-content">
                                    <h3>Ms. Nida E Zainab</h3>
                                    <small>C B D O</small>
                                </div>
                            </div>
                            <div class="oks-content-popup">
                                <p>Ms. Nida E Zainab is currently working as a supply chain analyst at Nikon Metrology
                                    Belgium. She has Advanced Masters in Cultures & Development from University of
                                    Leuven. Her background in social sciences and work in public sector for more than 8
                                    years in Belgium as a psycho-social counseller makes her to be a perfect match to
                                    help youth with career development and adaptation of diversity.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oks-team-member">
                        <div class="team-image">
                            <img src="image/team-2-cus.jpg">
                        </div>
                        <div class="oks-content">
                            <h3>Mr. Mehdi Syed </h3>
                            <small>C F O</small>
                        </div>
                        <div class="oks-main-content">
                            <i class="oks-popup-cross-btn">x</i>
                            <div class="oks-team-popup-info">
                                <div class="team-image">
                                    <img src="image/team-2-cus.jpg">
                                </div>
                                <div class="oks-content">
                                    <h3>Mr. Mehdi Syed </h3>
                                    <small>C F O</small>
                                </div>
                            </div>
                            <div class="oks-content-popup">
                                <p>Mehdi, a Business Studies graduate with a Masters in Business from the UK, with
                                    experience in production management at Warner Brothers Discovery. With expertise in
                                    customer sales, marketing, and process management, Mehdi navigates the dynamic
                                    intersection of business with precision and passion. His journey reflects a
                                    commitment to excellence, seamlessly blending strategic business acumen with a deep
                                    understanding of audience dynamics.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- contact us -->
    <section class="oks-contact-us" id="oks-contact-us" data-aos="fade-up" data-aos-duration="1200">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="oks-contact-form-wrap">
                        <h2>Contact ekas </h2>
                        <p>We appreciate your interest, for general enquiries please fill out the form below and a
                            member of our team will be in touch.</p>
                        <div class="oks-contact-form">
                            <form action="{{ route('contat.us') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea placeholder="Message" name="message"></textarea>
                                    @error('message')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="form-control form-sbmt-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    {{-- <div class="oks-contact-info">
						<h3>Location</h3>
						<p>4 apt. Flawing Street. The Grand Avenue. Liverpool, UK 33342</p>
						<ul>
							<li><i class="fa-solid fa-envelope"></i>contact@infinitewptheme.com</li>
							<li><i class="fa-solid fa-phone"></i>+1-3524-3356</li>
						</ul>
					</div> --}}
                    <div class="social-links">
                        <div class="social-button">
                            <h3>Follow Us On</h3>
                            <ul>
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
    <!-- Subscribe now section -->
    @include('layouts.sections.subscribe')
    <!-- footer -->
    @include('layouts.footer')
    <script type="text/javascript" src="js/scripts.js"></script>
    <link rel="stylesheet" href="toast/styles.css">
    <script src="toast/toast-plugin.js"></script>
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
