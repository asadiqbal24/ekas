@extends('layouts.app')

@section('content')
    <div
        style="box-shadow: rgba(0, 0, 0, 0.2) 0px 3px 10px; padding: 24px; background-color: white; border-radius: 4px; margin-bottom: 29px; position: relative; flex-wrap: wrap; justify-content: center; display: block;">
        <div class="neutralinfoblock infoblock">
            <p class="infoblockheader">Key Information</p>
        </div>
        <div class="course_details">
            <table>
                <tbody>
                    <tr>
                        <th>Programme Name</th>
                        <td>{{ $course->programmename }}</td>
                    </tr>
                    <tr>
                        <th>Name Location</th>
                        <td>{{ $course->namelocation }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        @php
                            $now = \Carbon\Carbon::now();
                            $applicationOpen = \Carbon\Carbon::parse($course->Applicationopen);
                            $applicationDeadline = \Carbon\Carbon::parse($course->ApplicationDeadline);
                            $statusMessage = '';

                            if ($now->lt($applicationOpen)) {
                                $statusMessage = 'Opening Soon';
                            } elseif ($now->gt($applicationDeadline)) {
                                $statusMessage = 'Closed';
                            } elseif ($now->diffInDays($applicationDeadline, false) <= 7 && $now->gt($applicationOpen)) {
                                // diffInDays with false to allow for negative differences
                                $statusMessage = 'About to Close';
                            } else {
                                $statusMessage = 'Open';
                            }
                        @endphp
                        <td>{{ $statusMessage }}</td>
                    </tr>
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
                        <th>Course level</th>
                        <td> {{ $course->level }}</td>
                    </tr>
                    <tr>
                        <th>Subject Field </th>
                        <td> {{ $course->ranking }}</td>
                    </tr>
                    <tr>
                        <th>Tuition Fee</th>
                        <td> {{ $course->tuitionfee }}</td>
                    </tr>


                    <tr>
                        <th>Location (City, country)</th>
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
                        <td>{{ $course->Applicationopen }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="blockheading">
                <p>Read the course/programme information on the university's website.</p>
                URL: <a href="{{ $course->URL }}" target="_blank">Click Here</a>
            </div>

        </div>

    </div>
    @include('layouts.sections.subscribe')
    @include('layouts.footer')
@endsection
