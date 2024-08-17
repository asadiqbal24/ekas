<footer class="oks-site-footer d-flex">
    <div class="container">
        <div class="row">
            @if(!Request::is('login') && !Request::is('password/reset'))
            <div class="col-sm-4">
                <div class="footer-col">
                    <h4>Courses</h4>
                    <ul>
                        <li><a href="{{ route('course.get', ['name' => 'Others']) }}">Search</a></li>
                        <li><a href="{{ route('course.get', ['name' => 'Bachelors']) }}">Top Picks</a></li>
                        <li><a href="{{ route('course.get', ['name' => 'PhD']) }}">Trending</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-col">
                    <h4>Counselling</h4>
                    <ul>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/login">Appointment</a></li>
                        <li><a href="#oks-testimonial-section">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="/about">About</a></li>
                        <li><a href="/blogs">Blog</a></li>
                        <li><a href="/about#oks-contact-us">Contact</a></li>
                    </ul>
                    
                </div>
            </div>
            @endif
        </div>
        <div class="row footer-bottom">
            <div class="col-sm-12">
                <div class="social-button" >
                    <ul>
                        <li><a href="https://twitter.com/TheOfficialEkas" target="_blank"><object type="image/svg+xml"
                            data="image/x-twitter.svg"></object></a></li>
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
                <div class="oks-copyright">
                    <p>© {{date('Y')}} ekas - All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>