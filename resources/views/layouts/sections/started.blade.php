<!-- Started Section section -->

<section class="oks-get-started-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 m-auto">
                <div class="oks-section-content" data-aos="fade-up" data-aos-duration="1300">
                    <h2>Ready to explore the world of European education? Let’s get started!</h2>
                    <div class="oks-started-btn">
                        <div style="">

                        </div>
                        <a href="get/courses#corse_details_section">Search for Courses</a>
                       <a href="{{ Auth::check() ? 'javascript:void(0)' : url('/book/consult') }}" 
   onclick="if ({{ Auth::check() ? 'true' : 'false' }}) { window.location.href='/book/consult'; }">
    Book an Appointment
</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.sections.coming-soon')
