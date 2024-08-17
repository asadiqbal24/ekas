<section class="oks-banner-section">
    <video autoplay loop muted playsinline>
        <source src="videos/home-page-background.mp4" type="video/mp4">
    </video>
    <div class="oks-home-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-8 col-md-10 m-auto">
                    <div class="oks-banner-content">
                        <h1>Find Your Dream <span>Course<span></h1>
                        <div class="oks-home-searchbar">
                            <form id="search_form" method="GET" action="{{ route('course.get') }}">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-10 px-1  m-auto">
                                        <div class="oks-select-course form-group">
                                            <select class="form-control" name="location" id="country">
                                                <option disabled="disabled" selected="true">Country</option>
                                                <option value="Austria"
                                                    @if (!empty($country) && $country == 'Austria') selected @endif>Austria</option>
                                                <option value="Belgium"
                                                    @if (!empty($country) && $country == 'Belgium') selected @endif>Belgium</option>
                                                <option value="Finland"
                                                    @if (!empty($country) && $country == 'Finland') selected @endif>Finland</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-10 px-1  m-auto">
                                        <div class="oks-select-course form-group">
                                            <select class="form-control" name="level" id="level">
                                                <option disabled="disabled" selected="true">Course Level</option>
                                                <option value="Bachelors"
                                                    @if (!empty($level) && $level == 'Bachelors') selected @endif>Bachelors</option>
                                                <option value="Masters"
                                                    @if (!empty($level) && $level == 'Masters') selected @endif>Masters</option>
                                                    <option value="Masters"
                                                    @if (!empty($level) && $level == 'Masters') selected @endif>Advance Masters</option>
                                                <option value="PhD"
                                                    @if (!empty($level) && $level == 'PhD') selected @endif>PhD</option>
                                                <option value="Others"
                                                    @if (!empty($level) && $level == 'Others') selected @endif>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-6 col-10 px-1  m-auto">
                                        <div class="oks-select-course form-group">
                                            <input type="text" class="form-control"
                                                placeholder="Keywords e.g. Programme Name" name="programmename"
                                                id="programmename"
                                                value="@if (!empty($programmename)) {{ $programmename }} @endif">
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-sm-6 col-10 px-1 m-auto">
                                        <div class="form-group">
                                            <button class="btn-form-search" id="submit_search_form_btn "><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <p>Discover Countless Courses Across Europe</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('banner-scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#submit_search_form_btn', function(e) {
                e.preventDefault();
                var country = $('#country').val();
                var level = $('#level').val();
                var program = $('#programmename').val();
                var data = {
                    country: country,
                    level: level,
                    programmename: program,
                }
                const url = new URL(window.location.href);

                if (!url.search) {
                    $('#search_form').submit();
                } else {
                    $.ajax({
                        type: "get",
                        url: "/get/courses",
                        data: data,
                        success: function(response) {
                            $('#print_details').empty();
                            $('#print_details').html(response.html);
                            $('#course_count').html(response.totalCourses);
                            $('#active_filters').html('Active Filters : ' + response.filters +
                                " ");
                            $('html, body').animate({
                                scrollTop: $('#corse_details_section').offset().top
                            }, 'slow');
                        },
                        error: function(error) {
                            // console.log(error);
                        }
                    });
                }

            })
        });
    </script>
@endsection
