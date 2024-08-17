
<!doctype html>

<html>
<head>
	<title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
	 <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
	@if (!Auth::check())
        @include('layouts.styles')
    @else
        @include('user._styles')
    @endif

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
	<section class="oks-finland-banner" style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/finland-bg.jpeg); background-position: center; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<div class="oks-banner-content">
						<h1>Finland</h1>
						<p>Embarking on a journey of higher education in Finland isn't just a step toward academic excellence; it's a transformative experience that combines top-notch education, affordability, and a unique lifestyle. Here are compelling reasons why choosing Finland is the gateway to unlocking a brighter future.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="oks-austria-content-info">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="oks-austria-sidebar sidebar-links">
						<ul>
							<li><a onclick="movetoSection(1)">World-Class Education Hub</a></li>
							<li><a onclick="movetoSection(2)">Affordable Study Costs</a></li>
							<li><a onclick="movetoSection(3)">Unique Learning Experience</a></li>
							<li><a onclick="movetoSection(4)">Exceptional Standard of Living</a></li>
							<li><a onclick="movetoSection(5)">Work Opportunities While Studying</a></li>
							<li><a onclick="movetoSection(6)">Post-Study Work Visa</a></li>
							<li><a onclick="movetoSection(7)">Exceptional Learning Experience (Continued)</a></li>
							<li><a onclick="movetoSection(8)">Finnish Citizens: Ideal Companions</a></li>
							<li><a onclick="movetoSection(9)">Affordability vs. Other Countries</a></li>
							<li><a onclick="movetoSection(10)">Safety: A Top Priority</a></li>
							<li><a onclick="movetoSection(11)">Post-Study Opportunities Simplified</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 tab-info">
					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-1">World-Class Education Hub<i class="fas fa-chevron-down"></i></h3>
							<p>Finland's education system ranks among the best globally, with nine universities, including the University of Helsinki and Aalto University, featured in the prestigious QS World Rankings. Boasting 14,000 international students, Finland ensures an academic environment comparable to leading English-speaking countries.</p>
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
							<h3 id="section-2">Affordable Study Costs<i class="fas fa-chevron-down"></i></h3>
							<p>Finnish and EU students enjoy free education, while international students find tuition fees ranging from 600 to 16,000 euros annually. Scholarships abound, offering opportunities for financial assistance, with some universities even providing fully paid scholarships based on academic merit.</p>
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
							<h3 id="section-3">Unique Learning Experience<i class="fas fa-chevron-down"></i></h3>
							<p>Finland's 'Academic Freedom' allows students to tailor their study modules, fostering a diverse skill set. The flat hierarchy in Finnish universities ensures equal opportunities for all, emphasizing high-quality, interdisciplinary education.</p>
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
							<h3 id="section-4">Exceptional Standard of Living<i class="fas fa-chevron-down"></i></h3>
							<p>Live in one of the happiest countries globally, enjoying student discounts on food and transportation. Finland's work-life balance is embedded in its culture, encouraging students to explore lakes, mountains, and picturesque landscapes during breaks.</p>
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
							<h3 id="section-5">Work Opportunities While Studying<i class="fas fa-chevron-down"></i></h3>
							<p>Finnish universities offer robust career services, allowing international students to work part-time (25 hours per week) without requiring a special permit. A significant percentage of students secure employment contracts even before graduation.</p>
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
							<h3 id="section-6">Post-Study Work Visa<i class="fas fa-chevron-down"></i></h3>
							<p>Graduates from outside the EU completing a master's degree in Finland are granted a one-year post-study work visa. This unique opportunity allows graduates to seek employment, paving the way for a work visa or residence permit after gaining full-time employment.</p>
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
							<h3 id="section-7">Exceptional Learning Experience (Continued)<i class="fas fa-chevron-down"></i></h3>
							<p>Finland's commitment to world-class teaching is evident, with a flexible curriculum accommodating students at their own pace. The country offers both traditional universities and Universities of Applied Sciences, providing scientific research and practical learning, respectively.</p>
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
							<h3 id="section-8">Finnish Citizens: Ideal Companions<i class="fas fa-chevron-down"></i></h3>
							<p>Finns are multilingual, law-abiding, modest, and respectful. With a literacy rate of 100%, you'll engage with a civilized community that values personal space, providing a conducive environment for focused studies.</p>
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
							<h3 id="section-9">Affordability vs. Other Countries</h3>
							<p>Finland's cost of living is more affordable compared to popular study-abroad destinations like Canada and Australia. Enjoy a high-quality lifestyle without compromising on your budget.</p>
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
							<h3 id="section-10">Safety: A Top Priority<i class="fas fa-chevron-down"></i></h3>
							<p>Finland is one of the safest countries globally, with low crime rates focused on property and traffic-related offenses. A substantial number of police officers and a dedicated emergency number (112) ensure a secure environment for international students.</p>
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
							<h3 id="section-11">Post-Study Opportunities Simplified<i class="fas fa-chevron-down"></i></h3>
							<p>After completing a degree, the post-study work visa and the relaxed residency laws make transitioning from student to resident seamless. The Finnish student card further enhances the student experience with discounts on various amenities.</p>
							<p>Embark on a holistic educational journey in Finland, where academic brilliance converges with a vibrant lifestyle. Choose Finland not just for education but for an immersive experience that molds you into a global citizen ready to conquer the future. Finland awaits, ready to shape your academic and personal growth.</p>
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
					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>
					<div class="tab-content loading" >
						<div class="placeholder">
							<div class="loader"></div>
								<div class="loader"></div>
								<div class="loader"></div>
						</div>
						<br>
					</div>

					<div class="tab-content loading" >
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
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/helsi.jpeg);">
						<h3>University of Helsinki</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Helsinki is the oldest and largest institution of academic education and research in Finland. It is a scientific community of 40,000 students and researchers, and ranks among the top 100 universities in the world. The university offers a wide range of bachelor’s, master’s and doctoral programmes, as well as open university and exchange studies. The university’s mission is to contribute to society, education and welfare through the power of science.</p>
									<a href="{{url('get/courses?universityname=Lappeenrannan teknillinen yliopisto')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/oulu.jpeg);">
						<h3>University of Oulu</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Oulu is a science university in northern Finland that creates new knowledge, well-being and innovations for the future through research and education. It has over 13,000 students and 2,900 staff members, and offers 24 international degree programmes in English. The university is known for its multidisciplinary research on global challenges, such as environmental change, digital transformation and health and well-being. The university also collaborates with various partners from industry, academia and society.</p>
									<a href="{{url('get/courses?universityname=Lappeenrannan teknillinen yliopisto')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/truku.jpeg);">
						<h3>University of Turku</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The University of Turku is a science university in southern Finland that creates new knowledge, well-being and innovations for the future through research and education. It has over 25,000 students and personnel, and offers 24 international degree programmes in English. The university is known for its multidisciplinary research on global challenges, such as environmental change, digital transformation and health and well-being. The university also collaborates with various partners from industry, academia and society.</p>
									<a href="{{url('get/courses?universityname=Lappeenrannan teknillinen yliopisto')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/lut.jpeg);">
						<h3>Lappeenranta Lahti University of Technology LUT</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>Lappeenranta-Lahti University of Technology LUT Finland is a science university that combines technology, business and social sciences to address global challenges such as climate change, digitalization and well-being. It has two campuses, one in Lappeenranta and one in Lahti, and offers various degree programmes in English. LUT University is one of the top 300 universities in the world and one of the top 15 universities for sustainable consumption and production.</p>
									<a href="{{url('get/courses?universityname=Lappeenrannan teknillinen yliopisto')}}">Discover Course </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/tempra.jpeg);">
						<h3>Tampere University</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>Tampere University is one of the most multidisciplinary universities in Finland, with research and education in technology, health and society. It has over 21,000 students and 4,000 staff members from more than 80 countries. It offers 24 international degree programmes in English, and collaborates with hundreds of universities and organisations worldwide. It was created in 2019 through a merger between the University of Tampere and Tampere University of Technology.</p>
									<a href="{{url('get/courses?universityname=Tampereen yliopisto')}}">Discover Course </a>
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