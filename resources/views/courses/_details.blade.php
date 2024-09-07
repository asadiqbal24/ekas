@forelse ($courses as $course)
<div class="oks-course-item-wrap tab-content" style="margin-bottom: 25px;" data-name="{{ $course->title }}">
    <div class="oks-dis-filter-main-div-right">
        <h3>{{ $course->title }}</h3>
        <p>{{ $course->namelocation }}</p>
        @php
        $now = \Carbon\Carbon::now();

        // Check if $course->Applicationopen is a valid date
        $applicationOpen = $course->Applicationopen && strtotime($course->Applicationopen)
        ? \Carbon\Carbon::parse($course->Applicationopen)
        : null;

        // Check if $course->ApplicationDeadline is a valid date
        $applicationDeadline = $course->ApplicationDeadline && strtotime($course->ApplicationDeadline)
        ? \Carbon\Carbon::parse($course->ApplicationDeadline)
        : null;

        $statusMessage = 'Currently Not Available'; // Default message if dates are not available

        if ($applicationOpen && $now->lt($applicationOpen)) {
        $statusMessage = 'Opening Soon';
        } elseif ($applicationDeadline && $now->gt($applicationDeadline)) {
        $statusMessage = 'Application Closed';
        } elseif ($applicationDeadline && $now->diffInDays($applicationDeadline, false) <= 7 && $now->gt($applicationOpen)) {
            // diffInDays with false to allow for negative differences
            $statusMessage = 'Application closing soon';
            } elseif ($applicationOpen && $applicationDeadline && $now->gt($applicationOpen)) {
            $statusMessage = 'Application Open';
            }
            @endphp
            <div class="oks-application-btn"><span
                    class=" @if ($statusMessage == 'Application Open') green @elseif($statusMessage == 'Application closing soon') orangedot @elseif($statusMessage == 'Opening Soon') orangedot @else red @endif "></span>
                <p>{{ $statusMessage }}</p>
            </div>
            <div class="@if(Request::is('user/dashboard')) oks-show-more @else oks-show-more-btn @endif" data-course-id="{{ $course->id }}" style="cursor: pointer;display: flex;justify-content: space-between;align-items: center;cursor: pointer">
                Show more<i class="fa-solid fa-chevron-down"></i>
            </div>
    </div>
    @if (!Auth::check())
    <div class="oks-wishlist-icon">
        <a href="javascript:;" class="ekas-login"><i class="far fa-heart"></i></a>

        <div class="eks-login-discover" style="display: none;">
            <i class="fa-solid fa-xmark"></i>
            <h3>Add as favourite</h3>
            <small style="font-size: 13px">You need to log in to add the course/programme as a favourite</small>
            <a href="/login">Log in</a>
        </div>
    </div>
    @else
    @if ($course->inWishlist)
    <div class="oks-wishlist-icon">
        <a href="javascript:;" class="removeFromWishlist" id="{{ $course->id }}">
            <i class="fa-solid fa-heart" title="Remove From Wishlist"></i>
        </a>
    </div>
    @else
    <div class="oks-wishlist-icon">
        <a href="javascript:;" class="addToWishlist" id="{{ $course->id }}">
            <i class="far fa-heart" title="Add to Wishlist"></i>
        </a>
    </div>
    @endif
    @endif
    <div class="resultcard_expanded universal_high details_{{ $course->id }} hidden"
        style="background-color: white; border-radius: 4px; margin-bottom: 29px; position: relative; flex-wrap: wrap; justify-content: space-between; display: block;">
        <div class="neutralinfoblock infoblock">
            <p class="infoblockheader">Key Information</p>
        </div>
        <div class="course_details">
            <table>
                <tbody>
                    <tr>
                        <th>University Name</th>
                        <td>{{ $course->universityname }}</td>
                    </tr>
                    <tr>
                        <th>Programme Name</th>
                        <td>{{ $course->programmename }}</td>
                    </tr>
                    <tr>
                        <th>University Ranking</th>
                        <td>{{ $course->ranking }}</td>
                    </tr>
                    <tr>
                        <th>Course Level</th>
                        <td>{{ $course->level }}</td>
                    </tr>
                    <tr>
                        <th>Subject Field </th>
                        <td>{{ $course->fieldofstudy }}</td>
                    </tr>
                    <tr>
                        <th>Tuition Fee</th>
                        <td>{{ $course->tuitionfee }}</td>
                    </tr>


                    <tr>
                        <th>Location (City, Country)</th>
                        <td>{{ $course->location }}</td>
                    </tr>
                    <tr>
                        <th>Entry Requirement</th>
                        <td>{{ $course->EntryRequirement }}</td>
                    </tr>
                    <tr>
                        <th>IELTS/TOFEL Requirement</th>
                        <td>{{ $course->IELTSTOFELRequirement }}</td>
                    </tr>
                    <tr>
                        <th>GRE/GMAT/SAT Requirement</th>
                        <td>{{ $course->GREGMATSATRequirement }}</td>
                    </tr>
                    <tr>
                        <th>Application Deadline</th>
                        <td>
    @if (\Carbon\Carbon::hasFormat($course->ApplicationDeadline, 'Y-m-d') || strtotime($course->ApplicationDeadline))
        {{ \Carbon\Carbon::parse($course->ApplicationDeadline)->format('d-m-Y') }}
    @else
        {{ $course->ApplicationDeadline }}
    @endif
</td>
                    </tr>
                </tbody>
            </table>

            <div class="blockheading">
                <p>Read the course/programme information on the university's website.</p>
                URL: <a href="{{ $course->URL }}" class="ms-3 btn btn-sm btn-primary text-white" target="_blank">Click Here</a>
            </div>
        </div>
    </div>
</div>
@empty
@if (Request::is('user/*'))
<div class="col-sm-10 m-auto " id="toggle-div">
    <div class="oks-disc-main-div">
        <div class="oks-wishlist-non-page">
            {{-- <div class="oks-wishlist-image"></div> --}}
            <div class="oks-wishlist-content">
                <p class="weight-medium">You haven't selected any favourites</p>
                <p class="blockheading">Click on the heart symbol to save the courses and programmes you're
                    interested in. You'll then see them listed here.</p>
                <div class="block">
                    <a href="/get/courses">Find courses and programmes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="oks-wishlist-content">
    <p class="weight-medium">Your search criteria didn't match any courses or programmes
    </p>
    <p class="blockheading">Are you currently enrolled in a programme? Try <a href="/login"></a> in to find the courses you can apply for.</p>
    <div class="block">
        <a href="/get/courses">Find courses and programmes</a>
    </div>
</div>
@endif
@endforelse

<script>
    $('.oks-wishlist-icon .ekas-login').on('click', function(e) {
        e.preventDefault();
        $(this).next('.eks-login-discover').show();
    });
    $('.eks-login-discover i').on('click', function() {
        $('.eks-login-discover').hide();
    });
</script>


<!-- You can dismiss by clicking somewhere -->