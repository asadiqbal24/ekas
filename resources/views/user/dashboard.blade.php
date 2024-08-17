<!doctype html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('dassets/css/card-style.css')}}">
    <style>
        time.icon {
            font-size: 1em;
            /* change icon size */
            display: block;
            position: relative;
            width: 7em;
            height: 7em;
            background-color: #fff;
            margin: 2em auto;
            border-radius: 0.6em;
            box-shadow: 0 1px 0 #bdbdbd, 0 2px 0 #fff, 0 3px 0 #bdbdbd, 0 4px 0 #fff, 0 5px 0 #bdbdbd, 0 0 0 1px #bdbdbd;
            overflow: hidden;

            -webkit-transform-origin: 50% 10%;
            transform-origin: 50% 10%;
        }

        time.icon * {
            display: block;
            width: 100%;
            font-size: 1em;
            font-weight: bold;
            font-style: normal;
            text-align: center;
        }

        time.icon strong {
            position: absolute;
            top: 0;
            padding: 0.4em 0;
            color: #fff;
            background-color: #e11223;
            border-bottom: 1px dashed #f37302;
            box-shadow: 0 2px 0 #fd9f1b;
        }

        time.icon em {
            position: absolute;
            bottom: 0.3em;
            color: #fd9f1b;
        }

        time.icon span {
            width: 100%;
            font-size: 2.8em;
            letter-spacing: -0.05em;
            padding-top: 1.2em;
            color: #2f2f2f;
        }

        time.icon:hover,
        time.icon:focus {
            -webkit-animation: swing 0.6s ease-out;
            animation: swing 0.6s ease-out;
        }



        .calendar-image {
            background-image: url(/calendar.jpg);
            width: 120px !important;
            height: 110px;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: top;

        }

        .supporat-card-list-calendar {
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            /* height: 74%; */
        }

        .no-padding-left {
            padding-left: 0 !important;
        }

        .oks-support-card-guide {
            background: #fff;
            padding: 22px 25px;
            border-radius: 19px;
            height: 363px;
        }


        .oks-support-card-session {
            background: #fcd230;
            padding: 22px 25px;
            border-radius: 19px;
            height: 363px;
        }

        .oks-support-card-session h3 {
            font-size: 16px !important;
            color: black;

        }

        .supporat-card-list-guide {
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            height: unset;
        }

        .oks-support-card-guide h3 {
            font-size: 16px !important;
            color: #1d4bad;

        }

        .oks-support-card-sessions {

            background: #1d4bad;
            padding: 22px 25px;
            border-radius: 19px;
        }


        .oks-support-card-sessions h3 {
            font-size: 16px !important;
            color: #fff;
        }


        .circle2 {

            width: 25px;
            margin: auto;

            height: 25px;

            background-color: #fff;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 15px;

            font-weight: bold;

            color: red;
            border: 1px solid red;


        }

        .circle {
            width: 50px;
            margin: auto;

            height: 50px;

            background-color: yellow;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 26px;

            font-weight: bold;

            color: black;

        }

        .visa-icon {
            color: #1a1f71;
            /* Visa blue */
        }

        .mastercard-icon {
            color: #ff5f00;
            /* MasterCard orange */
        }

        .amex-icon {
            color: #2e77bc;
            /* Amex blue */
        }

        .modalss-header {
            height: 30vh;
            /* Set the height to 30% of the viewport height */
            background-size: cover;
            color: white;
            padding: 1em;
        }

        .secondmodal {
            background-color: white;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 100%;
            /* Adjusted width */
            text-align: center;
        }

        .oks-show-more {
            width: 141px !important;
            height: 45px !important;
            margin-top: 20px;
            margin-right: 5px;
            background: #ffffff85;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #d3d3d37d;
            font-size: 14px;
            line-height: 24px;
            background: #fff;
            width: 295px;
            height: 53px;
        }

        .oks-support-card ul li {
            font-weight: unset !important;
        }

        .oks-support-card {
            height: unset !important;
        }

        .dashb-course {
            padding: unset !important;
            padding: 10px 0px !important;
            height: 245px !important;
        }

        .oks-dashboard-section {
            padding: 46px 0 150px !important;
        }

        /* .oks-dashboad-wrap{
           margin-bottom:30% !important;   
        } */

        @media (max-width:768px) {

            .course_details table tr th,
            .course_details table tr td {
                padding: 8px !important;
            }
        }


        .resultcard_expanded .course_details table {
            table-layout: fixed !important;

        }

        .ground {
            position: absolute !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 120px !important;
        }

        .mountain-scene {
            height: 92% !important;
        }

        .tiny-mountains .tri3:nth-child(2) {
            bottom: -2% !important;
        }

        .tiny-mountains .tri3:nth-child(3) {
            bottom: -4% !important;
        }

        .tiny-mountains .tri3:nth-child(5) {
            bottom: -2% !important;
        }

        .oks-support-card {
            padding-left: 10px !important;
            padding-right: 10px !important;

        }

        .text-sm-center {
            text-align: center;
        }
    </style>
    <title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
    {{-- jquery toaster --}}
    @include('user._styles')
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('toast/styles.css') }}">

    <style>
        .custom-toast-container {
            z-index: 99999 !important;
            /* Ensure the toast appears above all other elements */
        }
    </style>

</head>

<body>
    <!-- site header -->
    <div class="dashboard-board">
        <div class="oks-dashboard-page">
            @include('user._header')
            <section class="oks-dashboard-section" style="margin-bottom: 50px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="oks-dashbar-user-name">
                                <h3><span>{{ Auth::user()->fname }}'s </span>Dashboard</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row oks-row">
                        <div class="col-sm-3 col-lg-3 col-md-12">
                            <div class="oks-profile-sidebar">
                                <div class="oks-dashboard-profile">
                                    <h4>Profile</h4>
                                    <div class="oks-profile-sec">
                                        <div class="profile-name">
                                            <h3>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="oks-profile-info">
                                            @php
                                            $lookingFor = Auth::user()->lookingfor;

                                            @endphp

                                            <ul>
                                                <li><strong>Email: </strong>{{ Auth::user()->email }}</li>
                                                <li><strong>Contact: </strong>{{ Auth::user()->number }}</li>
                                                <li><strong>Current Level: </strong>{{ Auth::user()->academic }}</li>
                                                <li><strong>Desired Level: </strong>
                                                    {{$lookingFor}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="oks-profile-tabs">
                                    <h4>Ekas Support</h4>
                                    <div class="oks-profile-sec">
                                        <a href="book/consult">Book Appointment</a>
                                        <ul class="text-center">
                                            <li><a href="/blogs">Blog</a></li>
                                            <li><a href="/#stories">Video</a></li>
                                            <li><a href="/explore">Life in Europe</a></li>
                                            <li><a href="/document-checker" class="text-center">Document Checker</a></li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-lg-8 col-md-12">
                            <div class="oks-dashboad-wrap" id="tab1">
                                <div class="row">
                                    <!-- right section -->
                                    <div class="col-sm-12">
                                        <div class="oks-dashboad-btn-wrap">
                                            <div class="oks-dashboad-btn">
                                                <button id="oks-dashboard-tab1">Favourites</button>
                                                <button id="oks-dashboard-tab2">ekas Guides</button>
                                                <button id="oks-dashboard-tab3">Sessions</button>
                                                <button id="oks-dashboard-tab4">Notifications</button>
                                            </div>
                                        </div>
                                        @include('courses._details')
                                        <div class="support tab-content">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="oks-support-card">
                                                        <h3>Visa Guidance</h3>
                                                        <div class="supporat-card-list">
                                                            <ul>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('austria-guidance?type=visa')}}" style="text-decoration: none; color:white;padding: 15px 30px;">Austria</a>
                                                                </li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('belgium-guidance?type=visa')}}" style="text-decoration: none; color:white;padding: 15px 30px;">Belgium</a>
                                                                </li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('finland-guidance?type=visa')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Finland</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="oks-support-card" style="background:white;">
                                                        <h3>Academic Guidelines</h3>
                                                        <div class="supporat-card-list">
                                                            <ul>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('austria-guidance?type=academic')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Austria</a>
                                                                </li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('belgium-guidance?type=academic')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Belgium</a>
                                                                </li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" class=""><a href="{{url('finland-guidance?type=academic')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Finland</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="oks-support-card">
                                                        <h3>ekas Guidance</h3>
                                                        <div class="supporat-card-list">
                                                            <ul>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" data-title="Austria Guidance €1" data-price="€1" data-image="{{ asset('image/austria-background.jpeg') }}"><a href="{{url('austria-guidance')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Austria</a></li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" data-title="Belgium Guidance €1" data-price="€1" data-image="{{ asset('image/beljium-bg.jpeg') }}"><a href="{{url('belgium-guidance')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Belgium</a></li>
                                                                <li style="cursor: pointer; border-radius: 6px; background: #1b4ba6; color: white; padding: 9px;" data-title="Finland Guidance €1" data-price="€1" data-image="{{ asset('image/finland-bg.jpeg') }}"><a href="{{url('finland-guidance')}}" style="text-decoration: none; color:white; padding: 15px 30px;">Finland</a></li>
                                                            </ul>



                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true" style="padding:2em;">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content secondmodal" style="width: 60%; padding:0px;">
                                                            <div class="modalss-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float: right; color:white;"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 class="modal-title text-center" id="paymentModalLabel" style="font-weight: 700;">Payment Information</h4>
                                                                <p class="text-center" id="modalDescription">Please fill in the details below to proceed with your payment.</p>
                                                                <div class="oks-book-consultent-wrap">
                                                                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                                                                    <form role="form" action="{{route('stripePost')}}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('pk_test_51Owfu5HDyUEvV9bCayz668CJCAwcNZjlHeXi36IFKL5b8bfuJTaaH0IbjQ91u9SXsXQQiOvjwryzDji77CTYycY900ZTXAEwYK') }}" id="payment-form">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="name" class="form-label">Name</label>
                                                                            <input type="text" name="name" placeholder="Enter your name" required class="form-control" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="email" class="form-label">Email</label>
                                                                            <input type="email" name="email" placeholder="Enter your email" required class="form-control" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="cardNumber" class="form-label">Card Number</label>
                                                                            <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control card-number" size='20' autocomplete='off' required />
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text mt-3">
                                                                                    <i class="fab fa-cc-visa visa-icon mx-2"></i>
                                                                                    <i class="fab fa-cc-mastercard mastercard-icon mx-2"></i>
                                                                                    <i class="fab fa-cc-amex amex-icon mx-2"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="cardExpiry" class="form-label">Expiration Date</label>
                                                                            <div class="d-flex">
                                                                                <input type="number" placeholder="MM" name="card-expiry-month" class="form-control card-expiry-month me-2" required size='2'>
                                                                                <input type="number" placeholder="YY" name="card-expiry-year" class="form-control card-expiry-year" required size='2'>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="cardCVC" class="form-label">CVV</label>
                                                                            <input type="text" autocomplete='off' required class="form-control card-cvc" size='4'>
                                                                        </div>
                                                                        <div class="mt-5 d-flex justify-content-between align-items-center">
                                                                            <button type="submit" class="btn btn-primary" style="background:black; width: 100%;">Pay</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <!-- End Modal -->

                                                <!-- <div class="col-sm-4 todo-list-form">
                                                   <form action="" method="post" id="todoForm">
                                                        @csrf
                                                        <div class="oks-support-card dashb-course">
                                                            <h3>Application to do List</h3>
                                                            <ul>
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <input type="text"
                                                                        style="width: 100%;padding:5px;border-radius:5px"
                                                                        placeholder="Enter Description Here"
                                                                        name="task_description" id="task_description">
                                                                    @error('task_description')
                                                                        <strong
                                                                            class="text-danger">{{ $message }}</strong>
                                                                    @enderror
                                                                    <span
                                                                        style="background-color: #FFCC01;padding: 8px;border-radius:5px; cursor: pointer;"
                                                                        id="toDoFormSubmit">+</span>
                                                                </div>
                                                                <div id="print_todos"
                                                                    style="height: 100px;overflow-y: scroll;">
                                                                    @forelse ($todos as $todo)
                                                                        <li
                                                                            class="d-flex justify-content-between align-items-center main-todo">
                                                                            {{ $todo->task_description }}
                                                                            <i class="fa fa-trash text-danger todo-dlt-btn" data-todoid="{{ $todo->id }}" style="cursor: pointer"></i>
                                                                        </li>
                                                                    @empty
                                                                        <li>No data found</li>
                                                                    @endforelse
                                                                </div>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                </div> -->
                                                <!-- <div class="col-sm-4">
                                                    <div class="oks-support-card deadline"
                                                        >
                                                        <h3>Upcoming Deadline</h3>
                                                        @foreach ($courses as $course)
                                                            @if ($course->expiringSoon)
                                                                <div class="oks-3rd-card">
                                                                    <img src="/image/calendar.png">
                                                                    <p>{{ $course->title }}</p>
                                                                    <p>{{ $course->universityname }}</p>
                                                                    <strong>{{ $course->location }}</strong>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="sessiontab tab-content d-none">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12">
                                                    <div class="oks-support-card-sessions">
                                                        <h3>Session Purcahse</h3>
                                                        <div class="circle">
                                                            4
                                                        </div>
                                                        <div>
                                                            <h4 style="text-align: center;color: #fff;margin-top: 10px;">Schedule Dates</h4>
                                                        </div>
                                                        <div class="supporat-card-list">
                                                            <div class="row mt-1">
                                                                <div class="col-md-7 mt-1 text-sm-center no-padding-left">
                                                                    <label style="color: #fff;">Session 1</label>
                                                                </div>

                                                                <div class="col-md-5 mt-1 text-sm-center">
                                                                    <label style="color: #e4d55a; font-size: 14px;">21/01/25</label>
                                                                </div>
                                                                <div class="col-md-7 mt-1 text-sm-center no-padding-left">
                                                                    <label style="color: #fff;">Session 2</label>
                                                                </div>

                                                                <div class="col-md-5 mt-1 text-sm-center">
                                                                    <label style="color: #e4d55a;font-size: 14px;">21/01/25</label>
                                                                </div>
                                                                <div class="col-md-7 mt-1 text-sm-center no-padding-left">
                                                                    <label style="color: #fff;">Session 3</label>
                                                                </div>

                                                                <div class="col-md-5 mt-1 text-sm-center">
                                                                    <label style="color: #e4d55a;font-size: 14px;">Schedule</label>
                                                                </div>
                                                                <div class="col-md-7 mt-1 text-sm-center no-padding-left">
                                                                    <label style="color: #fff;font-size: 14px;">Session 4</label>
                                                                </div>

                                                                <div class="col-md-5 mt-1 text-sm-center">
                                                                    <label style="color: #e4d55a;font-size: 14px;">Schedule</label>
                                                                </div>


                                                                <div class="col-md-7 mt-3 text-sm-center">
                                                                    <label style="color: #fff;">Remaining</label>
                                                                </div>

                                                                <div class="col-md-5 mt-3 text-sm-center">
                                                                    <div class="circle2">
                                                                        2
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12 mt-3">
                                                                    <label style="color: red;font-size:15px">Expiry-21/03/2025</label>
                                                                </div>

                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-12">
                                                    <div class="oks-support-card-guide">
                                                        <h3>Guidance Report</h3>


                                                        <div class="supporat-card-list-guide">
                                                            <div class="row mt-1">
                                                                <div class="col-md-8 mt-1 text-sm-center no-padding-left">
                                                                    <label>Session 1</label>
                                                                </div>

                                                                <div class="col-md-4 mt-1 text-sm-center">
                                                                    <i class="fa fa-file-pdf-o" style="font-size:25px;color:red"></i>
                                                                </div>










                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-sm-12">
                                                    <div class="oks-support-card-session">
                                                        <h3>Upcoming Session</h3>


                                                        <div class="supporat-card-list-calendar">
                                                            <div class="row mt-1">


                                                                <div class="col-md-12">
                                                                    <time datetime="2014-09-20" class="icon">
                                                                        <em>Saturday</em>
                                                                        <strong>September</strong>
                                                                        <span>20</span>
                                                                    </time>

                                                                </div>

                                                                <div class="col-md-12" style="text-align: center;">
                                                                    <label style="font-size: large;">22:00</label>

                                                                </div>
                                                                <div class="col-md-12 mt-1" style="text-align: center;">
                                                                    <label style="font-size: 15px; background-color: #cfba43;padding: 5px 10px;border-radius: 15px;">Zoom Link</label>

                                                                </div>

                                                                <div class="col-md-12 mt-1" style="text-align: center;">
                                                                    <a href="" style="font-size: 10px;color: red;font-weight: 700;">Read More</a>

                                                                </div>










                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                        <div class="notificationtab tab-content d-none">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="oks-support-card-sessions">
                                                        <h3>Notification : guidance bundle purchased - 01/02/24</h3>
                                                        <h3>Notification : ekas message - how are you ?</h3>
                                                        <h3>Notification : invoice for guiance bundle - 01/02/2024</h3>
                                                        <h3>Notification : booking confirmation - next session on 03/02/24-19:00 PST</h3>
                                                        
                                                        
                                                    </div>
                                                </div>






                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="oks-site-footer oks-login-footer" style="position: static;padding:unset !important">
                <div class="container">
                    <div class="row footer-bottom">
                        <div class="col-sm-12">
                            <div class="social-button">
                                <ul>
                                    <li><a href="https://twitter.com/TheOfficialEkas" target="_blank"><object
                                                type="image/svg+xml" data="image/x-twitter.svg"></object></a></li>
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
                                <p>© {{ date('Y') }} Ekas - All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- <div class="oks-dashboard-animation"> -->
        <!-- <div class="ani-container">
    <div class="bird-container bird-container--one">
     <div class="bird bird--one"></div>
    </div>
    <div class="bird-container bird-container--two">
     <div class="bird bird--two"></div>
    </div>
    <div class="bird-container bird-container--three">
     <div class="bird bird--three"></div>
    </div>
    <div class="bird-container bird-container--four">
     <div class="bird bird--four"></div>
    </div>
   </div>
   <div class="ag-mountains">
   <div class="ag-mountain ag-mountain-5"></div>
   <div class="ag-mountain ag-mountain-4"></div>
   <div class="ag-mountain ag-mountain-3"></div>
   <div class="ag-mountain ag-mountain-2"></div>
   <div class="ag-mountain"></div>
   </div> -->
        <div class="landing">
            <div class="mountain-scene">
                <div id="clouds">
                    <div class="cloud"></div>
                    <div class="cloud"></div>
                    <div class="cloud"></div>
                    <div class="cloud"></div>
                    <div class="cloud"></div>
                </div>
                <!-- background mountains -->
                <div class="small-mountains">
                    <div class="tri"></div>
                    <div class="tri"></div>
                    <div class="tri"></div>
                </div>
                <div class="tall-mountains">
                    <div class="tri2"></div>
                    <div class="tri2"></div>
                    <div class="tri2"></div>
                </div>
                <!-- foreground mountains -->
                <div class="tiny-mountains">
                    <div class="tri3"></div>
                    <div class="tri3"></div>
                    <div class="tri3"></div>
                    <div class="tri3"></div>
                    <div class="tri3"></div>
                </div>
            </div>
            <div class="ground"></div>
        </div>
        <!-- </div> -->
    </div>
    @include('layouts.sections.coming-soon')


    <script type="text/javascript" src="dassets/js/scripts.js"></script>
    <script src="{{ asset('toast/toast-plugin.js') }}"></script>
</body>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey('pk_test_51Owfu5HDyUEvV9bCayz668CJCAwcNZjlHeXi36IFKL5b8bfuJTaaH0IbjQ91u9SXsXQQiOvjwryzDji77CTYycY900ZTXAEwYK');

                // Capture the expiration month input
                var expMonth = $('.card-expiry-month').val();

                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    // Pass the expiration month
                    exp_month: expMonth,
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                // Log the specific Stripe API error message to the console
                console.error("Stripe API Error:", response.error.message);

                // Display the error message to the user
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var paymentMethodSelect = document.getElementById('payment_method');
        var stripeCardForm = document.getElementById('stripe-card-form');

        paymentMethodSelect.addEventListener('change', function() {
            var selectedOption = paymentMethodSelect.value;

            if (selectedOption === 'credit_card') {
                stripeCardForm.style.display = 'block';
            } else {
                stripeCardForm.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#selected_date", {
            dateFormat: "Y-m-d",
        });

        flatpickr("#selected_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr
        flatpickr("#selected_date", {
            dateFormat: "Y-m-d",
        });

        flatpickr("#selected_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        // Form step logic
        const form = document.getElementById('consultancyForm');
        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');

        const nextBtnStep1 = document.getElementById('next-btn-step1');
        const nextBtnStep2 = document.getElementById('next-btn-step2');

        const guidanceForm = document.getElementById('guidance_form');
        const guidancePackage = document.getElementById('guidance_package');

        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        const emailError = document.getElementById('email-error');
        const phoneError = document.getElementById('phone-error');

        function validateStep1() {
            const isValid = guidanceForm.value && guidancePackage.value;
            nextBtnStep1.disabled = !isValid;
        }

        function validateStep3() {
            let isValid = true;
            if (!emailInput.value) {
                emailError.style.display = 'inline';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            if (!phoneInput.value) {
                phoneError.style.display = 'inline';
                isValid = false;
            } else {
                phoneError.style.display = 'none';
            }

            nextBtnStep2.disabled = !isValid;
        }

        guidanceForm.addEventListener('change', validateStep1);
        guidancePackage.addEventListener('change', validateStep1);

        emailInput.addEventListener('input', validateStep3);
        phoneInput.addEventListener('input', validateStep3);

        nextBtnStep1.addEventListener('click', function() {
            step1.style.display = 'none';
            step2.style.display = 'block';
        });

        nextBtnStep2.addEventListener('click', function() {
            step2.style.display = 'none';
            step3.style.display = 'block';
            validateStep3(); // Validate step 3 fields
        });

        document.querySelectorAll('.previous-btn').forEach(button => {
            button.addEventListener('click', function() {
                if (step2.style.display === 'block') {
                    step2.style.display = 'none';
                    step1.style.display = 'block';
                } else if (step3.style.display === 'block') {
                    step3.style.display = 'none';
                    step2.style.display = 'block';
                }
            });
        });


    });
</script>
<script>
    $(document).ready(function() {
        $('ul li[data-bs-toggle="modal"]').on('click', function() {
            var title = $(this).data('title');
            var price = $(this).data('price');
            var image = $(this).data('image');

            $('#paymentModalLabel').text(title);
            $('#modalDescription').text('Discover your educational opportunities in ' + title.split(' ')[0] + ' with our comprehensive guide designed especially for international students.');
            $('#totalDue').text('Total due: ' + price);
            $('.modalss-header').css('background', 'url(' + image + ') no-repeat center center').css('background-size', 'cover');
            $('#paymentModal button[type="submit"]').text('Pay ' + price);
        });
    });
</script>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showSuccessToast(message) {
        $.toast({
            title: "Success!",
            message: message,
            type: "success",
            duration: 5000
            // afterShown: function() {
            //         $('.jq-toast-wrap').css('z-index', '9999');
            //     }
        });
    }

    function showErrorToast(message) {
        $.toast({
            title: "Error!",
            message: message,
            type: "error",
            duration: 5000
        });
    }
    $(document).on('click', '#toDoFormSubmit', function() {
        var value = $('#task_description').val().trim();
        var data = {
            task_description: value,
        };
        $.ajax({
            type: "POST",
            url: "add/to/list",
            data: data,
            success: function(response) {
                if (response.message) {
                    showSuccessToast(response.message);
                    $('#task_description').val('');
                } else {
                    showSuccessToast("Success, but no message returned.");
                }
                getTodos();
            },
            error: function(xhr, status, error) {
                showErrorToast("An error occurred: " + xhr.responseText);
            }
        });
    });
    // get todos
    function getTodos() {
        var todoHtml = '';
        $.ajax({
            type: "GET", // Typically, HTTP methods are written in uppercase
            url: "get/todos",
            success: function(response) {
                var todos = response.todos;
                todos.forEach(element => {
                    // Improved readability and proper closing of tags
                    todoHtml += `<li class="d-flex justify-content-between align-items-center main-todo">
                    ${element.task_description}
                    <i class="fa fa-trash text-danger todo-dlt-btn" data-todoid="${element.id}" style="cursor: pointer;"></i>
                </li>`;
                });
                $('#print_todos').html(todoHtml); // Moved to a new line for clarity
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    $('.logout-btn').on('click', function() {
        $('#logoutForm').submit();
    })
    $('#oks-dashboard-tab2').on('click', function() {
        $('#toggle-div').hide();
        $('.sessiontab').addClass('d-none');
        $('.support').removeClass('d-none');
        $('#oks-dashboard-tab3').removeClass('active');
        $('#oks-dashboard-tab4').removeClass('active');

$('.notificationtab').addClass('d-none');

    })
    $('#oks-dashboard-tab1').on('click', function() {
        $('#toggle-div').show();
        $('.sessiontab').addClass('d-none');
        $('#oks-dashboard-tab3').removeClass('active');
        $('#oks-dashboard-tab4').removeClass('active');

        $('.notificationtab').addClass('d-none');

    })
    $('#oks-dashboard-tab3').on('click', function() {
        //    / alert("true");

        $('.sessiontab').removeClass('d-none');
        $(this).addClass('active');
        $('.support').addClass('d-none');
        $('#oks-dashboard-tab2').removeClass('active');
        $('#oks-dashboard-tab1').removeClass('active');
        $('#toggle-div').hide();

        $('#oks-dashboard-tab4').removeClass('active');

        $('.notificationtab').addClass('d-none');


    })

    $('#oks-dashboard-tab4').on('click', function() {
        //    / alert("true");

        $('.notificationtab').removeClass('d-none');
        $('.sessiontab').addClass('d-none');
        $(this).addClass('active');
        $('.support').addClass('d-none');
        $('#oks-dashboard-tab2').removeClass('active');
        $('#oks-dashboard-tab1').removeClass('active');
        $('#oks-dashboard-tab3').removeClass('active');
        $('#toggle-div').hide();


    })



    $('.oks-show-more').on('click', function() {
        var courseId = $(this).data('course-id');
        var parent = $(this).closest('.oks-course-item-wrap').find('.details_' + courseId);
        if ($(parent).hasClass('show')) {
            $(parent).removeClass('show');
        } else {
            $(parent).addClass('show');
        }
    })

    $('.todo-dlt-btn').on('click', function(e) {
        var todoid = $(this).data('todoid');
        e.preventDefault();
        var userConfirmed = confirm('Are you sure you want to delete this?');
        if (userConfirmed) {
            $(this).closest('.main-todo').html('');
            $.ajax({
                type: "get",
                url: "delete/todo/" + todoid,
                success: function(response) {
                    $(this).closest('.main-todo').html('');
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    });
</script>
<script>
    $(document).on('click', '.auth-btn', function() {
        window.location.href = $(this).attr('href');
    })
    window.onload = function() {
        if (window.location.hash) {
            const section = document.getElementById(window.location.hash.substring(1));
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    };
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
        var container = $(this).closest('.oks-course-item-wrap');
        $.ajax({
            type: "get",
            url: "/remove/from/wishlist/" + courseId,
            success: function(response) {
                showSuccessToast(response.message);
                btn.removeClass("removeFromWishlist");
                btn.addClass("addToWishlist");
                heartIcon.removeClass('fa-solid fa-heart');
                heartIcon.addClass('far fa-heart');
                container.remove();
            },
            error: function(error) {
                showErrorToast(error)
            }
        });
    })

    $(document).keypress(
        function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });
</script>
<style>
    /* Style for the disabled Next button */
    #next-btn[disabled] {
        background-color: #ccc;
        /* Gray color */
        color: #666;
        /* Text color */
        cursor: not-allowed;
        /* Change cursor */
    }
</style>

</html>

<!-- Modal trigger button -->