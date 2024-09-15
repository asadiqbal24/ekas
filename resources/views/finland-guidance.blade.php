
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
	{{-- <section class="oks-finland-banner" style="background: linear-gradient(rgb(0 0 0 / 64%), rgb(0 0 0 / 70%)),url(image/finland-bg.jpeg); background-position: center; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<div class="oks-banner-content">
						<h1>Finland</h1>
						<p>Embarking on a journey of higher education in Finland isn't just a step toward academic excellence; it's a transformative experience that combines top-notch education, affordability, and a unique lifestyle. Here are compelling reasons why choosing Finland is the gateway to unlocking a brighter future.</p>
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
                        <form id="step-1-form">
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
    
                              
    
                                <div class="book-buttons">
                                    <button type="button" class="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
                                </div>
                            </div>

                            </form>
    
                        
                          
                        @if($type == 'ekas')
                        
                    <form  method="POST" action="{{route('process-payment-ekas-guide-documents')}}" class="require-validation" role="form" data-cc-on-file="false">
                            @csrf
                      
                        <div class="form-step" id="step-2">
                            <div class="mb-3">
                                <div class="form-group">
                                    <span style="float: right; font-size: 1em;">€1</span><label style="font-weight: bold; font-size: 1.2em;">{{ucfirst($type)}} Austria Guidance Document
                                    </label>

                                    <p style="font-size:12px;">
                                        Discover your educational opportunities in Austria with our comprehensive guide designed especially for international students.
                                    </p>
                                </div>

                                <b>Billing Details</b>
                                <hr>

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
                                <b>Card Details</b>
                                <hr>

                                <label class="form-label">Card Number</label>
                                <div id="card-element" class="form-control">
                                    <div id="card-number"></div>
                                    <img id="card-brand" src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Credit_card_font_awesome.svg" alt="Card Brand" style="display:none; width: 40px; float: right; margin-top: -30px;" />
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
                                    <button type="submit"  style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;"> <i class="fa fa-spinner fa-spin" style="display: none;"></i> Pay Now</button>
                                </div>
                            </div>
                        </div>


                        </form> 

                
                    @endif


                            <div class="form-step" id="{{($type=='ekas'?'step-3':'step-2')}}">
                                <div class="mb-3">
                                    <div class="form-group">
                                       <label style="font-weight: bold; font-size: 1.2em;">{{ucfirst($type)}} Finland Guidance Document
                                        </label>
                                    </div>

                                    @php 
                                        $path = 'download-pdf/finland/'.$type;
                                    @endphp

                                    <a href="{{url($path)}}" target="_blank">
                                        <img src="https://static-00.iconduck.com/assets.00/file-type-pdf-icon-1962x2048-ydoe3jot.png" alt="Download PDF" width="50" height="50"> {{ucfirst($type)}} Finland Guidance.pdf
                                      </a>
        
                                  
                                </div>
                              
    
                                <div class="form-group">
                                     <div class="book-buttons">
                                        <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                    
                                    </div> 
                                </div>
                            </div>
    
                            
    
                            <div id="submission-message" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <p>Thank you for submitting your documents. We will review and get back to you soon.</p>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Initialization of intl-tel-input -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-toast-plugin@1.3.2/dist/jquery.toast.min.js"></script>

    <script>
    $('.previous-btn').on('click', function(e) {
        // Prevent default action if needed
        e.preventDefault();

        // Reload the page
        window.location.reload();
    });
</script>
    <script>
        $(document).ready(function() {
            function submitForm(formId, url, currentStep, nextStep) {
                // Validate form (Add any custom validation logic here)
                let isValid = true;
                $('.error').hide();

                // Example validation
                if (!$(formId).find('#name').val()) {
                    isValid = false;
                    $(formId).find('#name').next('.error').show();
                }

                if (!$(formId).find('#email').val()) {
                    isValid = false;
                    $(formId).find('#email-error').show();
                }

                // If validation fails, stop the submission
                if (!isValid) {
                    return false;
                }

                // Gather form data
                var formData = $(formId).serialize();

                // Extract country name and type from the URL
                const urlPath = window.location.pathname;
                const urlParams = new URLSearchParams(window.location.search);

                const countryName = urlPath.split('/')[1]; // Extract 'austria-guidance'
                const country = countryName.split('-')[0]; // Extract 'austria' from 'austria-guidance'
                const type = urlParams.get('type'); // Extract 'visa' from '?type=visa'

                // Append country name and type to formData
                formData += '&guidance_country=' + country;
                formData += '&type=' + type;

                // AJAX call to submit the form data
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success: function(response) {
                        // Handle success, move to the next step if successful
                        console.log(response);
                        if (response.success) {
                            // Hide current step and show the next step
                            $(currentStep).removeClass('active').hide();
                            $(nextStep).addClass('active').show();

                            // Determine which step you're moving from and to
                            const currentLi = $('#book-progressbar li.active');
                            let nextLi;

                            // Check if "Payment" is in the flow
                            if (currentLi.text().trim() === "Personal Info" && $('#book-progressbar li:contains("Payment")').length) {
                                nextLi = $('#book-progressbar li:contains("Payment")');
                            } else if (currentLi.text().trim() === "Personal Info" || currentLi.text().trim() === "Payment") {
                                nextLi = $('#book-progressbar li:contains("Document")');
                            }

                            // Update progress bar to the next step
                            currentLi.removeClass('active');
                            nextLi.addClass('active');
                        } else {
                            alert('Error: ' + response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        console.log('Error:', textStatus, errorThrown);
                        alert('An error occurred while submitting the form.');
                    }
                });

                return true;
            }

            $('.next-btn').on('click', function(e) {
                e.preventDefault();

                // Call the submitForm function
                submitForm('#step-1-form', '/submit-form-austria-guidance-visa', '#step-1', '#step-2');
            });



        });
    </script>


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
        document.addEventListener('DOMContentLoaded', function() {
    

            const stripe = Stripe("{{env('STRIPE_KEY')}}"); // Replace with your Stripe publishable key
            const elements = stripe.elements();
            // alert(stripe);

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

            const cardNumber = elements.create('cardNumber', {
                style: style
            });
            cardNumber.mount('#card-number');

            const cardExpiry = elements.create('cardExpiry', {
                style: style
            });
            cardExpiry.mount('#card-expiry');

            const cardCvc = elements.create('cardCvc', {
                style: style
            });
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
                        'amex': 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1202px-American_Express_logo_%282018%29.svg.png',
                        'discover': 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Discover_Card_logo.svg/350px-Discover_Card_logo.svg.png',
                        'diners': 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Diners_Club_Logo3.svg/440px-Diners_Club_Logo3.svg.png',
                        'jcb': 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/JCB_logo.svg/400px-JCB_logo.svg.png',
                        'unionpay': 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UnionPay_logo.svg/400px-UnionPay_logo.svg.png',
                        'unknown': 'https://i.ibb.co/ZHrrT4V/vecteezy-no-credit-card-sign-debit-card-not-accepted-vector-icon-6059855-removebg-preview.png'
                    };
                    cardBrandElement.src = brandIcons[cardBrand] || brandIcons['unknown'];
                }
            });


            var consultancyForm = $(".require-validation");

            // consultancyForm.addEventListener('submit', function (e) {
            consultancyForm.on("submit", function(e) {
                e.preventDefault();

                stripe.createToken(cardNumber).then(function(result) {
                    if (result.error) {
                        const errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);

                        // $('.fa-spin').css("display","none");

                    } else {
                        stripeTokenHandler(result.token);

                    }
                });

                // alert('Form submitted successfully!');
            });


            function stripeTokenHandler(token) {

                /* token contains id, last4, and card type */
                consultancyForm.find('input[type=text]').empty();
                consultancyForm.append("<input type='hidden' name='stripeToken' value='" + token.id + "'/>");
                consultancyForm.get(0).submit();

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
            padding-left: 58px;
            /* Ensure enough space for the flag */
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
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