@extends('layouts.app')
@push('title')
    <title>Ekas</title>
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

.placeholder {
  width: 50vw;
  height: 12vw;
  
  background-color: #F8F9F9;
  box-shadow: 1px 4px 23px 3px rgba(0,0,0, 0.2);
  border-radius: 10px;
  
  padding: 3vw 4vw;
  
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.loader { 
  height: 22%;
  background: linear-gradient(90deg, rgba(210,210,210,0.5) 0%, rgba(238,238,238,0.7) 100%);
  border-radius: 10px;
  animation: loading 0.8s infinite; /* Ensure animation is applied infinitely */
}


.course_details table tr th, .course_details table tr td{
    padding-right: 0 !important;
}

@keyframes loading {
  from {
    width: 100%; /* Start animation with 0% width */
  }
  
}

@media (max-width:768px)  { 
    .loading .placeholder{
        width: 100% !important; 
        height:30vw !important;
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
    Showing <span class="course_count_top"></span>
    
    @if(request()->has('programmename') && request()->programmename!='')
      for "{{request()->programmename}}"                        
    @endif
     <br>
    <span id="active_filters"></span>
</p>
{{-- programmename --}}

                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="oks-dis-after-bann-main-div-select-course">
                            <select name="selectedCourse" id="oks-dis-select-a-z-course" class="oks-dis-select-a-z-course"
                                data-order>
                                <option value="asc">A to Z</option>
                                <option value="desc">Z to A</option>
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
                                <select class="oks-university locations" id="location" name="country" data-attribute='location'>
                                    <option value="" selected>All</option>
                                    @foreach ($locations as $location)
                                        
                                        <option {{($location == request()->location)?'selected':''}} value="{{ $location }}">{{ $location }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="oks-filter-program">
                                <label>University</label>
                                <!-- <select class="oks-university scroll-univeristy-dropdown universities" name="universityname" data-attribute='universityname' id="universityname">
                                    <option value="" selected>All</option>
                                   
                                    @foreach ($univeristies as $univeristy)
                                        <option {{($univeristy->universityname == request()->universityname)?'selected':''}} value="{{ $univeristy->universityname }}">{{ $univeristy->universityname }}</option>
                                    @endforeach
                                </select> -->
                                <select class="oks-university universities" name="universityname" data-attribute='universityname' id="universityname">
                                    <option value="" selected>All</option>
                                   
                                    @foreach ($univeristies as $univeristy)
                                        <option {{($univeristy->universityname == request()->universityname)?'selected':''}} value="{{ $univeristy->universityname }}">{{ $univeristy->universityname }}</option>
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
                                <label> Field Of Study</label>
                                <!-- <select class="oks-university scroll-univeristy-dropdown programs" name="program" data-attribute='programmename' id="programmename">
                                    <option value="" selected>All</option>
                                   
                                    @foreach ($programs as $program)
                                        <option value="{{ $program }}">{{ $program }}</option>
                                    @endforeach
                                </select> -->
                                <select class="oks-university programs" name="fieldofstudy" data-attribute='fieldofstudy' id="fieldofstudy">
                                    <option value="" selected>All</option>
                                   
                                    @foreach ($course_category as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                                <div><input {{('Bachelors' == request()->level)?'checked':''}} type="checkbox" class="level-checkbox" value="Bachelors"
                                        data-attribute='level'><span>Bachelors</span>
                                </div>
                                <div><input {{('Masters' == request()->level)?'checked':''}} type="checkbox" class="level-checkbox" value="Masters"
                                        data-attribute='level'><span>Masters</span>
                                </div>
                                <div><input {{('Masters' == request()->level)?'checked':''}} type="checkbox" class="level-checkbox" value="Masters"
                                        data-attribute='level'><span>Advance Masters</span>
                                </div>
                                <div><input {{('PhD' == request()->level)?'checked':''}}  type="checkbox" class="level-checkbox" value="PhD"
                                        data-attribute='level'><span>PhD</span></div>
                                <div><input {{('Others' == request()->level)?'checked':''}} type="checkbox" class="level-checkbox" value="Others"
                                        data-attribute='level'><span>Others</span></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            <div class="col-sm-8" id="print_details">

<div class="tab-content loading" style="display: none;">
    @foreach($courses as $course)
        <div class="placeholder">
            <div class="loader"></div>
              <div class="loader"></div>
              <div class="loader"></div>
        </div>
        <br>
        @endforeach
    </div>

    <!-- This will contain the filtered courses -->
    <div id="filtered_courses">
        @include('courses._details')
    </div>
    

    <div class="row">
        <div class="col-sm-6 text-left"><span class="course_count">
            <span class="course_count"></span>
        </div>

        <div class="col-sm-6 text-right'" style="text-align: right;">
            <button id="load_more" style="display: none; background:#1b4ba6;" class="btn btn-primary">Load More</button>
        </div>

        
    </div>





</div>
{{-- <div class="row">
                <div class="col-sm-12 text-center">
                <button id="load_more" style="display: none;" class="btn btn-primary">Load More</button>
                 <span class="course_count"></span>
                </div>
            </div>  --}}
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
            // $('#oks-dis-select-a-z-course').change(function() {
            //     // const sortDirection = $(this).val();
            //     // sortDataInPage(sortDirection);
            //     fetchFilteredCourses();
            // });

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
               // window.location.reload();
               window.location.href = 'get/courses';
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
                    $('#load_more').text('Loading...');
                },
                success: function(response) {
                    if (response.html === '') {
                        $('#load-more-courses').text('No more courses');
                        return;
                    }
                    $('#filtered_courses').append(response.html);
                    $('#load_more').text('Load More');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // $(document).ready(function() {
        //     // Initial Load
        //     fetchCourses(coursePage);

        //     $('#load-more-courses').click(function() {
        //         coursePage++;
        //         fetchCourses(coursePage);
        //     });
        // });
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
         var html = '';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    var currentPage = 1;
    var lastPage = false;
    var totalDisplayed = 0;
    var filters = {};
    var sliderChanged = false;

    function fetchFilteredCourses(page = 1, append = false) {
        if (sliderChanged) {
                    $('#handle_output').html('Fee = ' + $('#my_handle').val() + ' €');
                }
               
       var fieldofstudy =  $("#fieldofstudy").val();
      
                
        // Update filters based on user input
        filters = {
            location: $('[name="country"]').val(),
            universityname: $('[name="universityname"]').val(),
            studymode: $('[name="studymode"]').val(),
            programme: $('[name="program"]').val(),
            ApplicationDeadline: $('[name="ApplicationDeadline"]').val(),
            tuitionfee: sliderChanged ? Number($('#my_handle').val()) : '',
            levels: $('.level-checkbox:checked').map(function() { return this.value; }).get(),
            sortBy: $('#oks-dis-select-a-z-course').val(),
            fieldofstudy:fieldofstudy,
            page: page
        };

        // Show loading indicators
        $('.tab-content').show();
        $('.oks-course-item-wrap').hide();

        // Make AJAX request
        $.ajax({
            type: "GET",
            url: "/get/filtered/course",
            data: filters,
            success: function(response) {
                // Update HTML content based on response

                console.log(response);
                if (append) {
                    $('#filtered_courses').append(response.html);
                    totalDisplayed += response.currentPageCount;
                } else {
                    $('#filtered_courses').html(response.html);
                    totalDisplayed = response.currentPageCount;
                }

                // Update pagination information
                $('.course_count_top').html(response.totalCourses + ' results');
                $('.course_count').html(totalDisplayed + ' of ' + response.totalCourses + ' results');

                currentPage = page;
                lastPage = currentPage >= response.totalPages;

                // Show/hide load more button based on pagination state
                if (lastPage) {
                    $('#load_more').hide();
                } else {
                    $('#load_more').show();
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching filtered courses:", error);
                // Handle error scenarios as needed
            },
            complete: function() {
                // Hide loading indicators after AJAX request completes
                $('.tab-content').hide();
                $('.oks-course-item-wrap').show(); // Show all course items
            }
        });
    }

    // Event listeners for filter changes
    $('.oks-university, .level-checkbox').change(function() {
        currentPage = 1;
        fetchFilteredCourses();
    });

    // var programs = JSON.parse('<?= json_encode($programnames) ?>');

    //     console.log("programs");
    //     console.log(programs);

    $('.locations').change(function() {

        var currentLocation = $(this).val();
        var univeristies = JSON.parse('<?= json_encode($univeristies) ?>');

        // console.log(univeristies);

        $(".universities").html("<option value='' selected>All</option>");

        if(currentLocation != ''){
            univeristies.forEach(function(item) {
                if(item.location == currentLocation){
                    $(".universities").append("<option value='"+item.universityname+"'>"+item.universityname+"</option>");
                }
                // console.log(item); // Access each item in the array
            });
        }else{
            univeristies.forEach(function(item) {
                $(".universities").append("<option value='"+item.universityname+"'>"+item.universityname+"</option>");
                
                console.log(item); // Access each item in the array
            });
        }
        
    });



    $('.universities').change(function() {

        var currentUni = $(this).val();

        $.ajax({
            url        :"{{url('get/courses')}}",
            type       :'GET',
            dataType   :'json',
            success    :'success',
            data       :{'uni':currentUni},
            success    :function(result){
                console.log(result);
                $(".programs").html("<option value='' selected>All</option>");
                result.forEach(function(item) {
                    $(".programs").append("<option value='"+item+"'>"+item+"</option>");
                    
                });
            }
        });


        // var programs = <?= json_encode(addslashes($programnames)) ?>;
        // var programs = JSON.parse('<?= json_encode($programnames) ?>');

        // console.log("programs");
        // console.log(programs);

        // $(".programs").html("<option value='' selected>All</option>");

        // if(currentUni != ''){
        //     programs.forEach(function(item) {
        //         if(item.universityname == currentUni){
        //             $(".programs").append("<option value='"+item.programmename+"'>"+item.programmename+"</option>");
        //         }
        //         // console.log(item); // Access each item in the array
        //     });
        // }else{
        //     univeristies.forEach(function(item) {
        //         $(".programs").append("<option value='"+item.programmename+"'>"+item.programmename+"</option>");
                
        //         console.log(item); // Access each item in the array
        //     });
        // }

    });

    // $programs

    

    $('#oks-dis-select-a-z-course').change(function() {
        // const sortDirection = $(this).val();
        // sortDataInPage(sortDirection);
        fetchFilteredCourses();
    });

    $('#my_handle').on('change', function() {
        sliderChanged = true;
        currentPage = 1;
        fetchFilteredCourses();
    });

    // Load more button click event
    $('#load_more').on('click', function() {
        fetchFilteredCourses(currentPage + 1, true);
    });

    // Initial fetch on page load
    fetchFilteredCourses();
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
    @if(request()->has('location') && request()->location !='')
        <script>
            $(".universities").html("<option value='' selected>All</option>");

            var univeristies = JSON.parse('<?= json_encode($univeristies) ?>');
            var currentLocation = "{{request()->location}}";

                univeristies.forEach(function(item) {
                    if(item.location == currentLocation){
                        $(".universities").append("<option value='"+item.universityname+"'>"+item.universityname+"</option>");
                    }
                });
            

        </script>
    @endif
@endsection
