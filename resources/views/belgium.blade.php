
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
	<section class="oks-belgium-banner" style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/beljium-bg.jpeg); background-position: center; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<div class="oks-banner-content">
						<h1>Belgium</h1>
						<p>Belgium, a land known for its rich history, delectable chocolates, and intricate lace, is emerging as an educational hub attracting students from around the globe. Here's a compelling exploration of why Belgium should be at the top of your list for pursuing higher education.</p>
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
							<li><a onclick="movetoSection(1)">Affordable Living and Study Costs</a></li>
							<li><a onclick="movetoSection(2)">Quality of Education</a></li>
							<li><a onclick="movetoSection(3)">Multilingual Learning Experience</a></li>
							<li><a onclick="movetoSection(4)">International Student-Friendly Atmosphere</a></li>
							<li><a onclick="movetoSection(5)">Cultural Attractions and Heritage</a></li>
							<li><a onclick="movetoSection(6)">Well-Connected Location</a></li>
							<li><a onclick="movetoSection(7)">Open Doors to Opportunities</a></li>
							<li><a onclick="movetoSection(8)">Noteworthy Universities</a></li>
							<li><a onclick="movetoSection(9)">Fantastic Student Life</a></li>
							<li><a onclick="movetoSection(10)">Conclusion</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 tab-info">
					<div class="oks-austria-sec-content">
						<div class="oks-content-box">
							<h3 id="section-1">Affordable Living and Study Costs<i class="fas fa-chevron-down"></i></h3>
							<p>Belgium offers an economically viable option for international students. Public universities charge modest fees, ranging from €1,000 to €7,000 per year, making education accessible. Moreover, the living cost is approximately €850 per month, providing a budget-friendly environment for students.</p>
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
							<h3 id="section-2">Quality of Education<i class="fas fa-chevron-down"></i></h3>
							<p>Renowned for its academic excellence, Belgium houses cities like Brussels, Bruges, and Antwerp, which have significantly contributed to the country's educational advancements. The polyvalent and competitive education system has garnered international acclaim, offering accredited degrees and certificates. Diverse study programs in English, particularly in fields like medicine, arts, management, politics, and international relations, make Belgium an education powerhouse.</p>
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
							<h3 id="section-3">Multilingual Learning Experience<<i class="fas fa-chevron-down"></i></h3>
							<p>Belgium, a multilingual European nation, allows students to choose from three official languages: Dutch, German, and French. This flexibility caters to individual preferences. Additionally, many universities offer programs in English, making it an ideal destination for international students seeking English-language education.</p>
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
							<h3 id="section-4">International Student-Friendly Atmosphere<i class="fas fa-chevron-down"></i></h3>
							<p>The multicultural ambiance, warm hospitality, and a tolerant society make Belgium an attractive destination. Student clubs and associations flourish, providing ample opportunities to meet new people. Belgium's affordability compared to other European countries adds to its allure, creating a welcoming environment for students.</p>
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
							<h3 id="section-5">Cultural Attractions and Heritage<i class="fas fa-chevron-down"></i></h3>
							<p>Immerse yourself in Belgium's cultural legacy with visits to the Fashion Museum, the Mayer van de Bergh Museum, the MAS Photo Museum, and the Plantin Moretus Museum. Explore the Belgian Comic Strip Center in Brussels and marvel at the splendid Renaissance architecture. Belgium's cultural richness makes it not only an academic hub but also a travel destination worth discovering.</p>
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
							<h3 id="section-6">Well-Connected Location<i class="fas fa-chevron-down"></i></h3>
							<p>Situated at the heart of Europe, Belgium's compact size allows easy exploration by bike. Efficient public transportation connects you to neighboring countries like France, Germany, and the Netherlands. Students can traverse the continent conveniently, opening up a plethora of travel opportunities.</p>
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
							<h3 id="section-7">Open Doors to Opportunities<i class="fas fa-chevron-down"></i></h3>
							<p>Belgium's diverse educational institutions, including universities, colleges, and national institutes of art and architecture, offer a range of opportunities. Studying in Belgium ensures you receive quality education at a reasonable cost, with health care and social services provided, enhancing your overall student experience.</p>
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
						    <h3 id="section-8">Noteworthy Universities<i class="fas fa-chevron-down"></i></h3>
						    <p>
						    	<span>
								<strong>KU Leuven:</strong> Belgium's largest and one of Europe's oldest universities, renowned for research.</span>
								<span><strong>Ghent University:</strong> A well-regarded institution, especially in the top 100 global rankings.</span>
								<span><strong>University of Liège:</strong> The only public university for French speakers in Brussels, emphasizing inter-disciplinary research.</span>
								<span><strong>Free University of Brussels (ULB and VUB):</strong> Known for collaboration, offering diverse programs in French and Dutch.</span>
							</p>
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
							<h3 id="section-9">Fantastic Student Life<i class="fas fa-chevron-down"></i></h3>
							<p>Regardless of your chosen region – Wallonia, Flanders, or Brussels – Belgium promises an excellent quality of life. Boasting a cosmopolitan feel, Brussels, in particular, provides international networking opportunities, especially considering its role as the home of the European Parliament. Exceptional student facilities and robust support systems enhance the overall student experience.</p>
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
							<h3 id="section-10">Conclusion<i class="fas fa-chevron-down"></i></h3>
							<p>In conclusion, Belgium beckons students with its affordable education, high-quality programs, multilingual flexibility, and vibrant cultural experiences. Studying in Belgium isn't just about gaining a degree; it's about unlocking a world of opportunities and embarking on a transformative journey.</p>
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
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/ku-leuven.jpeg);">
						<h3>KU Leuven</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>KU Leuven, or Katholieke Universiteit Leuven, is a renowned research university located in Leuven, Belgium. Founded in 1425, it is one of the oldest and most prestigious universities in Europe. Known for its high-quality education, cutting-edge research, and international outreach, KU Leuven offers a wide range of undergraduate, graduate, and doctoral programs. It has a strong emphasis on science, engineering, humanities, and social sciences, and is a leading institution in both fundamental and applied research.</p>
									

									<a href="{{ url('get/courses?universityname=KU Leueven&location=Belgium') }}">Discover Course</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/ghent.jpeg);">
						<h3>Ghent University</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>Ghent University, located in Ghent, Belgium, is a prominent public research university. Established in 1817, it's one of the leading higher education and research institutions in the Flemish region. Known for its innovative research, high-quality teaching, and a broad range of undergraduate and postgraduate programs, the university excels in a variety of fields including sciences, humanities, engineering, and social sciences. It is also distinguished for its strong international connections and a vibrant campus life.</p>
									<a href="{{ url('get/courses?universityname=Ghent University&location=Belgium') }}">Discover Course</a>
									
								
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/ucllovain.jpeg);">
						<h3>Université catholique de Louvain</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The Université Catholique de Louvain (UCLouvain), located in Louvain-la-Neuve, Belgium, is a prominent French-speaking university. Founded in 1425 as the University of Leuven and split in 1968, it's one of the oldest and most respected universities in Europe. UCLouvain is known for its comprehensive research and teaching across a wide range of disciplines, including the humanities, social sciences, natural sciences, engineering, and health sciences. The university is recognized for its strong commitment to international collaboration and innovation in both teaching and research.</p>
									<a href="{{ url('get/courses?universityname=UCLouvain&location=Belgium') }}">Discover Course</a>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/libra.jpeg);">
						<h3>Université Libre de Bruxelles</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The Université Libre de Bruxelles (ULB), situated in Brussels, Belgium, is a prominent French-speaking private research university. Established in 1834, it's renowned for its strong emphasis on research and offers a wide array of undergraduate, graduate, and doctoral programs. The university excels in various fields like the sciences, humanities, law, engineering, and social sciences. ULB is known for its vibrant multicultural environment, its commitment to free inquiry, and a strong tradition of liberalism. It also actively participates in international research networks and collaborations.</p>
									
									<a href="{{ url('get/courses?universityname=Vrije University of Brussels&location=Belgium') }}">Discover Course</a>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="oks-uni-select" style="background-image: linear-gradient(rgb(0 0 0 / 36%), rgb(0 0 0 / 34%)), url(image/varija.jpeg);">
						<h3>Vrije Universiteit Brussel</h3>
						<div class="oks-uni-btn">
							<a href="" class="open-popup">Read More</a>
							<div class="oks-uni-popup">
								<i class="oks-uni-popup-btn">x</i>
								<div class="oks-uni-content">
									<p>The Vrije Universiteit Brussel (VUB) is a Dutch-speaking university located in Brussels, Belgium. Established in 1970, following the split of the Université Libre de Bruxelles, it is known for its high standards in research and education. The university offers a wide range of undergraduate, graduate, and doctoral programs across various disciplines, including the humanities, social sciences, natural sciences, and engineering. VUB is characterized by its emphasis on research, international orientation, and a strong commitment to the principles of free inquiry and critical thinking. It's also recognized for fostering an inclusive, diverse campus environment.</p>
									<a href="{{ url('get/courses?universityname=Vrije University of Brussels&location=Belgium') }}">Discover Course</a>
									
									
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