@extends('layouts.app')
@push('title')
    <title>Ekas | Empower Tomorrow </title>
@endpush
@section('content')
    <style>
        .my_handle {
            width: 100%;
        }

        input[type=range] {
            -webkit-appearance: none;
            width: 100%;
            height: 10px;
            background: #ddd;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
            border-radius: 10px;
        }

        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            background: #FFCC01;
            cursor: pointer;
            border-radius: 10px;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            background-color: #ffcc01;
            color: #000;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            z-index: 1000;
        }


.containers {
  display: flex;
  border: 1px solid #eaecef;
  height: 200px;

  background-color: white;
  box-shadow: 2px 5px 5px 1px lightgrey;
}

.content {
  border: 1px solid white;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  padding: 20px;
  justify-content: space-between;
}

.stripe {
  border: 1px solid white;
  height: 20%;
  background-color: #babbbc;
}

.small-stripe {
  width: 40%;
}

.medium-stripe {
  width: 70%;
}

.long-stripe {
  width: 100%;
}

.containers.loading .img, .containers.loading .stripe {
  animation: hintloading 2s ease-in-out 0s infinite reverse;
  -webkit-animation: hintloading 2s ease-in-out 0s infinite reverse;
}

@keyframes hintloading
{
  0% {
    opacity: 0.5;
  }
  50%  {
    opacity: 1;
  }
  100% {
    opacity: 0.5;
  }
}

@-webkit-keyframes hintloading
{
  0% {
    opacity: 0.5;
  }
  50%  {
    opacity: 1;
  }
  100% {
    opacity: 0.5;
  }
}


    </style>
    <section class="oks-discover-after-banner" id="corse_details_section">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Message</strong> {{ session()->get('message') }}
                </div>
            @endif
            <script>
                var alertList = document.querySelectorAll(".alert");
                alertList.forEach(function(alert) {
                    new bootstrap.Alert(alert);
                });
            </script>

            <div class="oks-dis-after-bann-main-div">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="oks-dis-after-bann-main-div-heading">
                          <p id="result-count-container">
    Showing <span id="course_count"></span> results for 2024 <br>
    <span id="active_filters"></span>
</p>


                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="oks-dis-after-bann-main-div-select-course">
                            <select name="selectedCourse" id="oks-dis-select-a-z-course" class="oks-dis-select-a-z-course"
                                data-order>
                                <option value="AtoZ">A to Z</option>
                                <option value="ZtoA">Z to A</option>
                            </select>
                            <div class="oks-filte-btn">
                                <button>Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="oks-dis-filter-main-div-left">
                        <div class="mobile-close-popup">x</div>
                        <div class="oks-dis-filter-reset">
                            <span>Filter</span>
                            <span id="reset" style="cursor:pointer;">Reset</span>
                        </div>

                        <div class="oks-dis-university-subject">
                            <div class="oks-filter-program">
                                <label>Filter by Fee</label>
                                <div class="">
                                    <input type="range" name="tuitionfee" class="my_handle" id="my_handle" min="800"
                                        max="16000" step="100" value="0">
                                    <span id="handle_output"></span>
                                </div>
                            </div>
                            <div class="oks-filter-program">
                                <label>Location</label>
                                <select class="oks-university" id="location" name="country" data-attribute='location'>
                                    <option value="" selected>All</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location }}">{{ $location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="oks-filter-program">
                                <label>University</label>
                                <select class="oks-university scroll-univeristy-dropdown" name="universityname" data-attribute='universityname' id="universityname">
                                    <option value="" selected>All</option>
                                    @foreach ($univeristies as $univeristy)
                                        <option value="{{ $univeristy }}">{{ $univeristy }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="oks-filter-program">
                                <label>Study Mode</label>
                                <select class="oks-university " name="studymode" data-attribute='studymode'>
                                    <option value="" selected>All</option>
                                    <option value="half time">Half time</option>
                                    <option value="full time">Full time</option>
                                </select>
                            </div>
                            <div class="oks-filter-program">
                                <label>Courses</label>
                                <select class="oks-university" name="program" data-attribute='programmename'>
                                    <option value="" selected>All</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program }}">{{ $program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="oks-filter-program">
                                <label>Deadline</label>
                                <select class="deadline-filter oks-university" name="ApplicationDeadline"
                                    data-attribute='ApplicationDeadline'>
                                    <option value="" selected>All</option>
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                    <option value="closing soon">Closing Soon</option>
                                </select>
                            </div>
                            <div class="oks-dis-study-level">
                                <p>Course Level</p>
                                <div><input type="checkbox" class="level-checkbox" value="Bachelors"
                                        data-attribute='level'><span>Bachelors</span>
                                </div>
                                <div><input type="checkbox" class="level-checkbox" value="Masters"
                                        data-attribute='level'><span>Masters</span>
                                </div>
                                <div><input type="checkbox" class="level-checkbox" value="PhD"
                                        data-attribute='level'><span>PhD</span></div>
                                <div><input type="checkbox" class="level-checkbox" value="Others"
                                        data-attribute='level'><span>Others</span></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-sm-8" id="print_details">
                    <div class='containers loading' id="loader" style="display: none;">
  
                      <div class='content'>
                        <div class='stripe small-stripe'>
                        </div>
                        <div class='stripe medium-stripe'>
                        </div>
                        <div class='stripe long-stripe'>
                        </div>
                      </div>
                    </div>
                    @include('courses._details')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                <button id="load_more" style="display: none;" class="btn btn-primary">Load More</button>
                </div>
            </div>
        </div>
    </section>

    <div class="border">
        @include('layouts.footer')
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top">&#8679;</button>
@endsection
@section('page-scripts')
    <script>
        $('html, body').animate({
            scrollTop: $('#corse_details_section').offset().top
        });
        $(document).ready(function() {

            
            const appliedFilters = new Set();
            let selectedLevelCount = 0;
            $('#oks-dis-select-a-z-course').change(function() {
                const sortDirection = $(this).val();
                sortDataInPage(sortDirection);
            });

            function sortDataInPage(sortDirection) {
                var items = $('#print_details').children('div')
                    .get(); // Assuming each item is a div. Adjust the selector as needed.

                items.sort(function(a, b) {
                    var nameA = $(a).data('name').toUpperCase(); // Using data-name attribute for sorting
                    var nameB = $(b).data('name')
                        .toUpperCase(); // Adjust this as per your sorting attribute

                    if (sortDirection === 'AtoZ') {
                        return nameA.localeCompare(nameB); // Sort A to Z
                    } else {
                        return nameB.localeCompare(nameA); // Sort Z to A
                    }
                });

                // Re-append sorted items to the container
                $.each(items, function(i, item) {
                    $('#print_details').append(item);
                });
            }
            $('#reset').click(function() {
                window.location.reload();
            });

        });

        // Back to Top Button Functionality
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });

        $('#back-to-top').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });

        // Lazy Load and Load More Button
        let coursePage = 1;

        function fetchCourses(page) {
            $.ajax({
                url: '/get/courses?page=' + page,
                type: 'get',
                beforeSend: function() {
                    $('#load-more-courses').text('Loading...');
                },
                success: function(response) {
                    if (response.html === '') {
                        $('#load-more-courses').text('No more courses');
                        return;
                    }
                    $('#print_details').append(response.html);
                    $('#load-more-courses').text('Load More');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        $(document).ready(function() {
            // Initial Load
            fetchCourses(coursePage);

            $('#load-more-courses').click(function() {
                coursePage++;
                fetchCourses(coursePage);
            });
        });
    </script>
    <style>
        .eks-login-discover {
            display: none;
        }
    </style>

    <script>
        // Attach click event to the document for dynamic elements
        $(document).on('click', '.oks-show-more-btn', function() {
            var courseId = $(this).data('course-id');
            $('.oks-show-more-btn').toggleClass('show');
            $('.details_' + courseId).toggleClass('show');
        });
       $(document).ready(function() {
    var currentPage = 1;
    var lastPage = false;
    var totalDisplayed = 0;
    var filters = {};
    var sliderChanged = false;


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function fetchFilteredCourses(page = 1, append = false) {
        if (sliderChanged) {
            $('#handle_output').html('Fee = ' + $('#my_handle').val() + ' €');
        }

        filters = {
            location: $('[name="country"]').val(),
            universityname: $('[name="universityname"]').val(),
            studymode: $('[name="studymode"]').val(),
            programmename: $('[name="program"]').val(),
            ApplicationDeadline: $('[name="ApplicationDeadline"]').val(),
            tuitionfee: sliderChanged ? Number($('#my_handle').val()) : '',
            levels: $('.level-checkbox:checked').map(function() { return this.value; }).get(),
            page: page
        };

        $('#loader').show();
        $('#print_details').css('opacity', '0.5');

        $.ajax({
            type: "GET",
            url: "/get/filtered/course",
            data: filters,
            success: function(response) {
                if (append) {
                    $('#print_details').append(response.html);
                     totalDisplayed += response.currentPageCount;
                } else {
                    $('#print_details').html(response.html);
                    totalDisplayed = response.currentPageCount;
                }

                 $('#course_count').html(totalDisplayed + ' of ' + response.totalCourses + ' results');
                currentPage = page;
                lastPage = currentPage >= response.totalPages;
                
                if (lastPage) {
                    $('#load_more').hide();
                } else {
                    $('#load_more').show();
                }
            },
            complete: function() {
                $('#loader').hide();
                $('#print_details').css('opacity', '1');
            }
        });
    }

    $('.oks-university, .level-checkbox').change(function() {
        currentPage = 1;
        fetchFilteredCourses();
    });

    $('#my_handle').on('change', function() {
        sliderChanged = true;
        currentPage = 1;
        fetchFilteredCourses();
    });

    $('#load_more').on('click', function() {
        fetchFilteredCourses(currentPage + 1, true);
    });
});

        $(document).on('click', '.auth-btn', function() {
            window.location.href = $(this).attr('href');
        })
        document.querySelector('.scroll-univeristy-dropdown').addEventListener('mousedown', function() {
            this.size = 100;
            this.style.height = '200px';
            this.style.overflowY = 'scroll';
        });

        document.querySelector('.scroll-univeristy-dropdown').addEventListener('change', function() {
            this.size = 0;
            this.style.height = '50px';
        });

        document.querySelector('.scroll-univeristy-dropdown').addEventListener('blur', function() {
            this.size = 0;
            this.style.height = '50px';
        });

        $(document).on('click', '.addToWishlist', function() {
            var btn = $(this);
            var heartIcon = $(this).find('.far.fa-heart');
            var courseId = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "/add/to/wishlist/" + courseId,
                success: function(response) {
                    showSuccessToast(response.message)
                    btn.removeClass("addToWishlist");
                    btn.addClass("removeFromWishlist");
                    heartIcon.removeClass('far fa-heart');
                    heartIcon.addClass('fa-solid fa-heart');
                },
                error: function(error) {
                    showErrorToast(error)
                }
            });
        })
        $(document).on('click', '.removeFromWishlist', function() {
            var btn = $(this);
            var heartIcon = $(this).find('.fa-solid.fa-heart');
            var courseId = $(this).attr('id');
            $.ajax({
                type: "get",
                url: "/remove/from/wishlist/" + courseId,
                success: function(response) {
                    showSuccessToast(response.message);
                    btn.removeClass("removeFromWishlist");
                    btn.addClass("addToWishlist");
                    heartIcon.removeClass('fa-solid fa-heart');
                    heartIcon.addClass('far fa-heart');
                },
                error: function(error) {
                    showErrorToast(error)
                }
            });
        });
    </script>
@endsection
