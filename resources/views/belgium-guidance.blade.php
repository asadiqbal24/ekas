
<!doctype html>

<html>
<head>
	<title>{{App\Services\SettingService::getSetting('site_title')}} | {{App\Services\SettingService::getSetting('tagline')}}</title>
	 <link rel="icon" type="image/x-icon" href="{{ Storage::url(App\Services\SettingService::getSetting('favicon')) }}">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.css">

	@if (!Auth::check())
        @include('layouts.styles')
    @else
        @include('user._styles')
    @endif
</head>
<body>
	<!-- site header -->
	@include('layouts.header')

    @php

        $type = request()->type ?? 'ekas';

    @endphp

	<!-- Banner section -->
	{{-- <section class="oks-belgium-banner" style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/beljium-bg.jpeg); background-position: center; background-size: cover;">
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
	</section> --}}

    @if($type == 'ekas')

    <style>
        #book-progressbar li:first-child{
            margin-left:10px;
        }
    </style>
@else
<style>
    #book-progressbar li:first-child{
        margin-left:70px;
    }
</style>
@endif

	<section class="oks-signup-form" id="book-consult-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="oks-section-content">
                        <h2>{{ucfirst($type)}} Guidance Document </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-5 col-lg-5 col-md-8 m-auto">
                    <div class="sign-up-progressbar">
                        <div class="sign-up-heading oks-book-time-heading">
                            <h3></h3>
                        </div>
                        <ul id="book-progressbar">
                            <li class="active">Personal Info<span></span></li>
                            @if($type == 'ekas')
                                <li>Payment<span></span></li>
                            @endif
                            <li>Document<span></span></li>
                        </ul>
                    </div>
                    <div class="oks-book-consultent-wrap">
                        <form id="get_user_data_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1: Personal Info -->
                            <div class="form-step active" id="step-1">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="name form-control" placeholder="Enter Name here" required>
                                    <span  class="error">Required</span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="email form-control" placeholder="Enter Email here" required>
                                    <span id="email-error" class="error">Email is required</span>
                                </div>
    
                                {{-- <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone here" required>
                                    <span id="phone-error" class="error">Phone number is required</span>
                                </div> --}}
    
                                <div class="book-buttons">
                                    <button type="button" class="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
                                </div>
                            </div>
    
                            
                            @if($type == 'ekas')
    
                                <!-- Step 2: Payment -->
                                <div class="form-step" id="step-2">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <span style="float: right; font-size: 1em;">€1</span><label style="font-weight: bold; font-size: 1.2em;">{{ucfirst($type)}} Belgium Guidance Document
                                            </label>

                                            <p style="font-size:12px;">
                                                Discover your educational opportunities in Austria with our comprehensive guide designed especially for international students.
                                            </p>
                                        </div>

                                        <b>Billing Details</b><hr>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control first_name" placeholder="" required name="first_name">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control last_name" placeholder="" required name="last_name">
                                            </div>
                                        </div>
    
                                    </div>
    
    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
    
    
                                    </div>
    
    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Town City</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">PostCode</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
    
                                    </div>
    
    
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country/City</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
    
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
    
                                    </div>
                                    <b>Card Details</b><hr>
            
                                        <label class="form-label">Card Number</label>
                                        <div id="card-element" class="form-control">
                                            <div id="card-number"></div>
                                            <img id="card-brand" src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Credit_card_font_awesome.svg" alt="Card Brand" style="display:none; width: 40px; float: right; margin-top: -30px;"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Name on card</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">Expiry date</label>
                                                <div id="card-expiry" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">CVV Code</label>
                                                <div id="card-cvc" class="form-control"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="card-errors" role="alert"></div>
        
                                    <div class="form-group">
                                        <div class="book-buttons">
                                            <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                            <button type="submit" class="next-btn" id="next-btn paynow" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;"> <i class="fa fa-spinner fa-spin" style="display: none;"></i> Pay Now</button>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="form-step" id="{{($type=='ekas'?'step-3':'step-2')}}">
                                <div class="mb-3">
                                    <div class="form-group">
                                       <label style="font-weight: bold; font-size: 1.2em;">{{ucfirst($type)}} Belgium Guidance Document
                                        </label>
                                    </div>

                                    @php 
                                        $path = 'download-pdf/belgium/'.$type;
                                    @endphp

                                    <a href="{{url($path)}}" target="_blank">
                                        <img src="https://static-00.iconduck.com/assets.00/file-type-pdf-icon-1962x2048-ydoe3jot.png" alt="Download PDF" width="50" height="50"> {{ucfirst($type)}} Belgium Guidance.pdf
                                      </a>
        
                                    {{-- <label class="form-label">Card Number</label> --}}
                                    {{-- <div id="card-element" class="form-control">
                                        <div id="card-number"></div>
                                        <img id="card-brand" src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Credit_card_font_awesome.svg" alt="Card Brand" style="display:none; width: 40px; float: right; margin-top: -30px;"/>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name on card</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">Expiry date</label>
                                            <div id="card-expiry" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label">CVV Code</label>
                                            <div id="card-cvc" class="form-control"></div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div id="card-errors" role="alert"></div>
    
                                <div class="form-group">
                                    {{-- <div class="book-buttons">
                                        <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                        <button type="submit" class="next-btn" id="next-btn paynow" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Pay Now</button>
                                    </div> --}}
                                </div>
                            </div>
    
                            
    
                            <div id="submission-message" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p>Thank you for submitting your documents. We will review and get back to you soon.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Initialization of intl-tel-input -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>

    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.querySelector("#phone");
            var iti = window.intlTelInput(input, {
                separateDialCode: true,
                preferredCountries: ["us", "gb", "pk", "in"], // Add your preferred countries
                utilsScript: "https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/utils.js" // for formatting/validation etc.
            });
    
            // Example of handling form submission
            $("form").on("submit", function(e) {
                var phoneError = $('#phone-error');
                if (input.value.trim() === "") {
                    phoneError.show();
                    e.preventDefault();
                } else {
                    phoneError.hide();
                }
            });
        });
    </script>
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var type1 = "{{$type}}";
            if(type1 === 'ekas'){

                const stripe = Stripe("{{env('STRIPE_KEY')}}"); // Replace with your Stripe publishable key
                const elements = stripe.elements();
        
                const style = {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
        
                const cardNumber = elements.create('cardNumber', {style: style});
                cardNumber.mount('#card-number');
        
                const cardExpiry = elements.create('cardExpiry', {style: style});
                cardExpiry.mount('#card-expiry');
        
                const cardCvc = elements.create('cardCvc', {style: style});
                cardCvc.mount('#card-cvc');
        
                cardNumber.addEventListener('change', function(event) {
                    const displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
        
                    const cardBrand = event.brand;
                    const cardBrandElement = document.getElementById('card-brand');
                    cardBrandElement.style.display = cardBrand ? 'inline' : 'none';
                    if (cardBrand) {
                        const brandIcons = {
                            'visa': 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/200px-Visa_Inc._logo.svg.png',
                            'mastercard': 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png',
                            'amex': 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/American_Express_logo_%282018%29.svg/200px-American_Express_logo_%282018%29.svg.png',
                            'discover': 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Discover_Card_logo.svg/200px-Discover_Card_logo.svg.png',
                            'diners': 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Diners_Club_Logo7.svg/200px-Diners_Club_Logo7.svg.png',
                            'jcb': 'https://upload.wikimedia.org/wikipedia/en/thumb/6/6a/JCB_%28credit_card%29_logo.svg/200px-JCB_%28credit_card%29_logo.svg.png',
                            'unionpay': 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/UnionPay_logo.svg/200px-UnionPay_logo.svg.png',
                            'unknown': 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Credit_card_font_awesome.svg/200px-Credit_card_font_awesome.svg.png'
                        };
                        cardBrandElement.src = brandIcons[cardBrand] || brandIcons['unknown'];
                    }
                });

                var form = document.getElementById('get_user_data_form');
                form.addEventListener('submit', function(event) {
                    $('.fa-spin').css("display","inline");

                    event.preventDefault();
                    var type2 = "{{$type}}";
                    stripe.createToken(cardNumber).then(function(result) {
                        if (result.error) {
                            const errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                            $('.fa-spin').css("display","none");

                        } else {
                            stripeTokenHandler(result.token);
                        }
                    });
                });
    

            }else{
                var form = document.getElementById('get_user_data_form');
                form.addEventListener('submit', function(event) {
                    $('.fa-spin').css("display","inline");

                    event.preventDefault();
                    stripeTokenHandler("null");
                    // var type2 = "{{$type}}";
                    // stripe.createToken(cardNumber).then(function(result) {
                    //     if (result.error) {
                    //         const errorElement = document.getElementById('card-errors');
                    //         errorElement.textContent = result.error.message;
                    //         $('.fa-spin').css("display","none");

                    //     } else {
                    //         stripeTokenHandler(result.token);
                    //     }
                    // });
                });
            }
    
            function stripeTokenHandler(token) {
                // const form = document.getElementById('get_user_data_form');
                // const hiddenInput = document.createElement('input');
                // hiddenInput.setAttribute('type', 'hidden');
                // hiddenInput.setAttribute('name', 'stripeToken');
                // hiddenInput.setAttribute('value', token.id);
                // form.appendChild(hiddenInput);
    
                // form.submit();

                var name1 = $(".name").val();
                var email = $(".email").val();
                var type = "{{$type}}";


                var stripeToken = "null";
                if(type == 'ekas'){
                    stripeToken = token.id;
                }

                    $.ajax({
                        url: '{{ route('processPayment') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            stripeToken: stripeToken,
                            first_name:$(".first_name").val(),
                            last_name:$(".last_name").val(),
                            name:name1,
                            email:email,
                            guidance_country:'belgium',
                            type: type            
                        },
                        
                        success: function(response) {
                            $('.fa-spin').css("display","none");
                            $.toast({
                                heading: 'Success',
                                text: 'Payment Succesfull',
                                showHideTransition: 'slide',
                                icon: 'info'
                            });

                            showStep(2);
                            $(".previous-btn").css("display","none");
                            // alert('Payment successful!');
                        },
                        error: function(error) {
                            $('.fa-spin').css("display","none");
                            $.toast({
                                heading: 'Error',
                                text: 'Payment Failed',
                                showHideTransition: 'fade',
                                icon: 'error'
                            })
                        }
                    });
                

            }
    
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const steps = document.querySelectorAll('.form-step');
            const nextButtons = document.querySelectorAll('.next-btn');
            const prevButtons = document.querySelectorAll('.previous-btn');
            const progressBar = document.getElementById('book-progressbar').children;
            let currentStep = 0;
    
            function validateForm() {
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
    
                nextButtons[0].disabled = !isValid;
            }
    
            function showStep(step) {
                steps.forEach((stepElement, index) => {
                    stepElement.classList.toggle('active', index === step);
                    progressBar[index].classList.toggle('active', index <= step);
                });
            }
            
            var payment_status = '{{$payment_status}}';
             var type = "{{$type}}"
            if(payment_status == 'true'){
                if(type == 'ekas'){
                    showStep(2);
                }else{
                    showStep(1);
                }
                
            }


            
    
            nextButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    var targetDiv = $('.form-step').eq(currentStep);
                    var validate = true;

                    var formElements = targetDiv.find('input, textarea, select');

                    formElements.each(function() {
                        var element = $(this);

                        if ($.trim(element.val()) === '') {
                            element.next('.error').attr("style","display:inline !important;");
                            validate = false; 
                        } else {
                            element.next('.error').attr("style","display:none !important;");
        
                        }
                    });

                    if (currentStep < steps.length - 1 && validate) {
                        currentStep++;
                        if(currentStep < 2){
                            showStep(currentStep);
                        }
                        
                    }
                });
            });
    
            prevButtons.forEach((button, index) => {
                button.addEventListener('click', function() {
                    if (currentStep > 0) {
                        currentStep--;
                        showStep(currentStep);
                    }
                });
            });
    
            // form.addEventListener('submit', function(event) {
            //     event.preventDefault();
    
            //     const modal = document.getElementById('submission-message');
            //     modal.style.display = 'block';
    
            //     modal.querySelector('.close').onclick = function() {
            //         modal.style.display = 'none';
            //     };
    
            //     window.onclick = function(event) {
            //         if (event.target === modal) {
            //             modal.style.display = 'none';
            //         }
            //     };
            // });
    
            const emailError = document.getElementById('email-error');
            const phoneError = document.getElementById('phone-error');
    
            validateForm();
    
            emailInput.addEventListener('input', validateForm);
            phoneInput.addEventListener('input', validateForm);
        });
    </script>
    <script>

        

    </script>
    
    <style>
        /* Style for the disabled Next button */
        #next-btn[disabled] {
            background-color: #ccc; /* Gray color */
            color: #666; /* Text color */
            cursor: not-allowed; /* Change cursor */
        }
    
        .error {
            display: none;
            color: red;
        }
    
        .form-step {
            display: none;
        }
    
        .form-step.active {
            display: block;
        }
    
        .iti {
            width: 100%;
        }
    
        .form-group input[type="tel"] {
            padding-left: 58px; /* Ensure enough space for the flag */
        }
    
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }
    
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
    
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
    
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    
        /* Custom styling for Stripe Elements */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            background-color: white;
        }
    
        .StripeElement--invalid {
            border-color: #fa755a;
        }
    
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>

</body>
</html>