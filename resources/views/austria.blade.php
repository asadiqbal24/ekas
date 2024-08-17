
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

 <style>
	@keyframes loading {
		from {
			width: 100%; /* Start animation with 0% width */
		}
	}

	.placeholder{
		width: 50vw;
		height: 12vw;
		background-color: #F8F9F9;
		box-shadow: 1px 4px 23px 3px rgba(0, 0, 0, 0.2);
		border-radius: 10px;
		padding: 3vw 4vw;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}

	.loader{
		height: 22%;
		background: linear-gradient(90deg, rgba(210, 210, 210, 0.5) 0%, rgba(238, 238, 238, 0.7) 100%);
		border-radius: 10px;
		animation: loading 0.8s infinite;
	}

	@media (max-width:768px)  { 
		.loading .placeholder{
			width: 100% !important; 
			height:30vw !important;
		}
	}

	.sidebar-links a {
		cursor: pointer !important;
	}
 </style>
</head>
<body>
	<!-- site header -->
	@include('layouts.header')
	<!-- Banner section -->
	<section class="oks-explore-banner"  style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/austria-background.jpeg); background-position: center; background-size: cover;">>
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
	</section>

	<section class="oks-austria-content-info">
		<div class="container">
			<div class="row justify-content-evenly">
				<div class="col-lg-4 col-md-4">
					<div class="oks-austria-sidebar sidebar-links">
						<ul>
							{{-- href="austria#section-1" --}}
							<li><a onclick="movetoSection(1)" data-section=1>Central Significance in Europe</a></li>
							<li><a  onclick="movetoSection(2)" data-section=2>Rich Cultural Heritage</a></li>
							<li><a onclick="movetoSection(3)" data-section=3>Art & Music Immersion</a></li>
							<li><a onclick="movetoSection(4)" data-section=4>Multicultural Environment</a></li>
							<li><a onclick="movetoSection(5)" data-section=5>Inclusive Accessibility in Education</a></li>
							<li><a onclick="movetoSection(6)" data-section=6>Strong Emphasis on Critical Thinking</a></li>
							<li><a onclick="movetoSection(7)" data-section=7>Exceptional Academic and Research Standards</a></li>
							<li><a onclick="movetoSection(8)" data-section=8>Strong Economy</a></li>
							<li><a onclick="movetoSection(9)" data-section=9>High Standards of Living</a></li>
							<li><a onclick="movetoSection(10)" data-section=10>Affordable Tuition Fees</a></li>
							<li><a onclick="movetoSection(11)" data-section=11>Outdoor Activities</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 tab-info" >
					<div class="oks-austria-sec-content" >
						<div class="oks-content-box">
							<h3 id="section-1">Central Significance in Europe<i class="fas fa-chevron-down"></i></h3>
							<p>Austria's historical significance, particularly through the influential Habsburg dynasty, adds a unique dimension to your academic adventure. Its central location in Europe provides a gateway to explore neighboring countries, enriching your educational experience with diverse cultural traditions.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-2">Rich Cultural Heritage<i class="fas fa-chevron-down"></i></h3>
							<p>Experience a cultural immersion like no other. Austria, birthplace of musical maestros like Mozart and Beethoven, boasts a rich artistic legacy. Vienna, the capital, is a treasure trove of museums, galleries, and architectural wonders, making it a haven for culture enthusiasts.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-3">Art & Music Immersion<i class="fas fa-chevron-down"></i></h3>
							<p>For those passionate about arts and music, Austria is a dream destination. From classical composition to cutting-edge fields like biomedicine and robotics, the country offers a vibrant scene that inspires creativity and innovation.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-4">Multicultural Environment<i class="fas fa-chevron-down"></i></h3>
							<p>Austria's multicultural ambiance, with languages like German, Croatian, Hungarian, and Slovenian spoken, creates a diverse community. Recent immigration trends have further enriched the cultural fabric, offering students exposure to a global perspective.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-5">Inclusive Accessibility in Education<i class="fas fa-chevron-down"></i></h3>
							<p>Austria's commitment to inclusive education ensures that everyone, regardless of background, has equal access to higher education. The emphasis on teaching arts and music makes it particularly appealing for those pursuing creative fields.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-6">Strong Emphasis on Critical Thinking<i class="fas fa-chevron-down"></i></h3>
							<p>Engage in an intellectually stimulating environment. Austria's academic tradition, from the Vienna Circle to modern psychoanalysis, emphasizes critical thinking and interdisciplinary exploration, nurturing well-rounded individuals.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-7">Exceptional Academic and Research Standards<i class="fas fa-chevron-down"></i></h3>
							<p>Home to renowned universities, including the University of Vienna and Vienna University of Technology, Austria ensures academic excellence. The strong emphasis on research, often funded by the government and private Organisation, provides opportunities for students to contribute to groundbreaking discoveries.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-8">Strong Economy<i class="fas fa-chevron-down"></i></h3>
							<p>Austria's stable and thriving economy translates to excellent job prospects for graduates. The focus on innovation, technology, and research positions graduates with a competitive advantage in the well-developed labor market.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-9">High Standards of Living<i class="fas fa-chevron-down"></i></h3>
							<p>Enjoy a high quality of life in Austria, featuring a robust welfare system, efficient public transportation, and comprehensive healthcare. Pursuing studies here means experiencing a balance between academic rigor and a fulfilling lifestyle.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-10">Affordable Tuition Fees<i class="fas fa-chevron-down"></i></h3>
							<p>Witness affordability without compromising on quality education. Austria offers reasonable tuition fees, particularly when compared to other Western European countries. Some courses even provide opportunities for free tuition, making education accessible.</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-11">Outdoor Activities<i class="fas fa-chevron-down"></i></h3>
							<p>For outdoor enthusiasts, Austria is a paradise. Explore picturesque skiing resorts like Alpbach and Zell am See or indulge in ice-skating in front of the City Hall. Between classes, relish the fresh mountain air and partake in a fairytale-like experience.</p>
							<p>Embrace the opportunity to learn German, one of the world's most-spoken languages, and avail yourself of English-taught courses for added convenience. Explore scholarship opportunities like the Helmut Veith Stipend, Marcus Oldham College Scholarship, and Vienna International Postdoctoral Program to support your academic journey.</p>
							<p>Austria, with its blend of culture, academia, and nature, invites you to embark on an enriching educational adventure. Seize the opportunity to broaden your horizons and lay the foundation for a successful future.</p>
							<p>Welcome to Austria – where education meets inspiration!</p>
						</div>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>
				</div>

				{{-- <div class="col-lg-8 col-md-8 tab-content-main" style="display: none;">
					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>
					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" style="display: none;">
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>
				</div> --}}

			</div>


			
		</div>
	</section>

	<!-- Top University -->
	<section class="oks-top-university-sect">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="oks-section-heading">
						<h2>Top Universities</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/viena.jpeg);">
						<h3>University of Vienna</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Vienna is a public research university located in Vienna, Austria. It was founded by Duke Rudolph IV in 1365, making it the oldest university in the modern German-speaking world. It has about 89,000 students and 10,000 staff members, and offers a wide range of degree programmes in various fields of study.</p>
									<a href="{{url('get/courses?universityname=University of Vienna')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/vienna-tech.jpeg);">
						<h3>Vienna University of Technology</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The Vienna University of Technology, also known as TU Wien, is a public research university in Vienna, Austria. It was founded in 1815 as the Imperial-Royal Polytechnic Institute, and it focuses on engineering, computer science, and natural sciences. It has about 26,000 students and 4,000 staff members, and it offers 62 degree programmes in various fields of study.</p>
									<a href="{{url('get/courses?universityname=TU Wien')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/graz.jpeg);">
						<h3>Graz University of Technology</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The Graz University of Technology (TU Graz) is a public research university that was founded in 1811 by Archduke John of Austria. It offers 19 bachelor’s and 35 master’s programmes in engineering, computer science, and natural sciences. It has about 26,000 students and 4,000 staff members, and it is associated with 16 Nobel Prize winners.</p>
									<a href="{{url('get/courses?universityname=Graz University of Technology')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/insbruck.jpeg);">
						<h3>University of Innsbruck</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Innsbruck is a public research university located in Innsbruck, Austria. It was founded in 1669 and is the largest and oldest university in western Austria. It has about 28,000 students and 5,000 staff members, and offers more than 160 degree programmes in various fields of study.</p>
									<a href="{{url('get/courses?universityname=University of Innsbruck')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/johnbaz.jpeg);">
						<h3>Johannes Kepler University Linz</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Innsbruck is a public research university located in Innsbruck, Austria. It was founded in 1669 and is the largest and oldest university in western Austria. It has about 28,000 students and 5,000 staff members, and offers more than 160 degree programmes in various fields of study.</p>
									<a href="{{url('get/courses?universityname=University of Innsbruck')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Subscribe now section -->
	@include('layouts.sections.subscribe')
	<!-- site Footer -->
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
	<script>
		function movetoSection(id){

			
			$(".oks-austria-sec-content").eq(id-1).hide();
			$(".loading").eq(id-1).show();

			$('html, body').animate({
				scrollTop: $(".loading").eq(id-1).offset().top -90
			}, 100);
			

			setTimeout(function(){

				// $(".tab-info").show();
				// $(".tab-content-main").hide();

				$(".oks-austria-sec-content").eq(id-1).show();
				// $(".tab-content-main").hide();
				$(".loading").eq(id-1).hide();


				
				

			}, 1000);

			
		}

		// $(".tab-info").hide();
		// 	$(".tab-content-main").show();

		// 	setTimeout(function(){
		// 		$(".tab-info").show();
		// 		$(".tab-content-main").hide();
		// 	}, 400);
	</script>
</body>
</html>
