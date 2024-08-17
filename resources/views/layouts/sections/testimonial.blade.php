<!-- Testmonial section -->
<section class="oks-testimonial-section" id="oks-testimonial-section">
    <video autoplay loop muted playsinline>
        <source src="videos/testmonials.mp4" type="video/mp4">
    </video>
    <div class="oks-testimonial-video-wrap">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="1200">
                <div class="col-sm-12">
                    <div class="oks-testimonial-content">
                        <h2>Hear From Our <span>Students<span></h2>
                    </div>
                </div>
            </div>
            <div class="oks-testimonial-slider owl-carousel">
                @foreach ($feedbacks as $feedback)
                    <div class="oks-testimonial-slide">
                        <div class="oks-testimonial-item">
                            <div class="oks-testimonial-header">
                                <div class="oks-testimonial-img">
                                    <img src="{{Storage::url($feedback->image)}}">
                                </div>
                                <div class="oks-testimonial-author-content">
                                    <h4>{{$feedback->name}}</h4>
                                    <p>{{$feedback->title}}</p>
                                </div>
                            </div>
                            <p>{{$feedback->review}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </span>
</section>
