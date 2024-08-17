<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<style>
    .error {
        color: red;
        display: none;
    }

    .invalid {
        border: 2px solid red;
    }
    .flatpickr-calendar{
        background-color: var(--primary-color) !important;
    }
    .iti {
        width:100%!important;
    }
</style>
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/main-style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<section class="oks-signup-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5 col-lg-5 col-md-8 m-auto">
                    <div class="sign-up-progressbar">
                        <div class="sign-up-heading oks-book-time-heading">
                            <h3>Book Consultancy Form</h3>
                        </div>
                        <ul id="book-progressbar">
                            <li class="active">Services<span></span></li>
                            <li>Time & Date<span></span></li>
                            <li>Personal Info<span></span></li>
                            <li>Payment<span></span></li>
                        </ul>
                    </div>
                    <div class="oks-book-consultent-wrap">
                        {{-- <script src='https://js.stripe.com/v2/' type='text/javascript'></script> --}}
        <form role="form" action="{{route('stripePost')}}" method="post" class="require-validation" data-cc-on-file="false"  id="payment-form">
            @csrf

            <div class="form-step active" id="step-1">
                <div class="form-group">
                    <label for="guidance_form">Choose Services</label>
                    <select id="guidance_form" class="form-control" required name="service">
                        <option value="" disabled selected>-- Select Services --</option>
                        <option value="application">Application Guidance</option>
                        <option value="academic">Academic Guidance</option>
                        <option value="visa">Visa Guidance</option>
                        <option value="general">General Guidance</option>
                    </select>
                    <span  class="error">Required</span>
                </div>
                <div class="form-group">
                    <label for="guidance_package">Choose Guidance Package</label>
                    <select id="guidance_package" class="form-control" required name="package">
                        <option value="" disabled selected>-- Select Guidance Package --</option>
                        <option value="single|30">Single Session - 30€</option>
                        <option value="bundle1|50">Bundle One - 50€</option>
                        <option value="bundle2|100">Bundle Two - 100€</option>
                    </select>
                    <span  class="error">Required</span>
                </div>
                <div class="book-buttons">
                    <button type="button" class="next-btn" >Next</button>
                </div>
            </div>
            <div class="form-step" id="step-2">
                <div class="form-group">
                    <label for="selected_date">Select Date</label>
                    <input type="text" id="selected_date" class="form-control" required name="date">
                    <span  class="error">Required</span>
                </div>
                <div class="form-group">
                    <label for="selected_time">Select Time (PKT)</label>
        <select id="selected_time" class="form-control" required name="time">
            <option value="">Select Time</option>
            <option value="00:00">00:00 AM </option>
            <option value="01:00">01:00 AM </option>
            <option value="02:00">02:00 AM </option>
            <option value="03:00">03:00 AM </option>
            <option value="04:00">04:00 AM </option>
            <option value="05:00">05:00 AM </option>
            <option value="06:00">06:00 AM </option>
            <option value="07:00">07:00 AM </option>
            <option value="08:00">08:00 AM </option>
            <option value="09:00">09:00 AM </option>
            <option value="10:00">10:00 AM </option>
            <option value="11:00">11:00 AM </option>
            <option value="12:00">12:00 PM </option>
            <option value="13:00">01:00 PM </option>
            <option value="14:00">02:00 PM </option>
            <option value="15:00">03:00 PM </option>
            <option value="16:00">04:00 PM </option>
            <option value="17:00">05:00 PM </option>
            <option value="18:00">06:00 PM </option>
            <option value="19:00">07:00 PM </option>
            <option value="20:00">08:00 PM </option>
            <option value="21:00">09:00 PM </option>
            <option value="22:00">10:00 PM </option>
            <option value="23:00">11:00 PM </option>
        </select>
                    <span  class="error">Required</span>
                </div>
               <div class="book-buttons">
        <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
        <button type="button" class="next-btn" id="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
    </div>
            </div>
            <div class="form-step" id="step-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Email here" required name="email">
                    <span id="email-error" class="error">Email is required</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" class="form-control" placeholder="Enter Phone here" required name="phone_no">
                    <span id="phone-error" class="error">Phone number is required</span>
                </div>

                {{-- <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Enter Phone here" required>
                    <span id="phone-error" class="error">Phone number is required</span>
                </div> --}}

                {{-- <div class="book-buttons">
                    <button type="button" class="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
                </div> --}}

              <div class="book-buttons">
        <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
        <button type="button" class="next-btn" id="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
    </div>

            </div>

            <div class="form-step" id="step-4">
                {{-- <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter Email here" required name="email">
                    <span id="email-error" class="error">Email is required</span>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" class="form-control" placeholder="Enter Phone here" required name="phone_no">
                    <span id="phone-error" class="error">Phone number is required</span>
                </div> --}}
                <!-- Stripe Card Form -->
                <div class="mb-3">
                    <input type="hidden" name="student_id">
                    {{-- <div class="form-group">
                        <label for="username">
                            <h6>Card Owner</h6>
                        </label>
                        <input type="text" name="username" placeholder="Card Owner Name" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">
                            <h6>Card number</h6>
                        </label>
                        <div class="input-group">
                            <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control card-number" size='20' autocomplete='off' required />
                            <div class=" mt-5 input-group-append">
                                <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>
                                    <span class="hidden-xs">
                                        <h6>Expiration Date</h6>
                                    </span>
                                </label>
                                <div class="input-group">
                                    <input type="number" placeholder="MM" name="card-expiry-month" class="form-control card-expiry-month" required size='2'>
                                    <input type="number" placeholder="YY" name="card-expiry-year" class="form-control card-expiry-year" required size='2'>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-4">
                                <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                </label>
                                <input type="text" autocomplete='off' required class="form-control card-cvc" size='4'>
                            </div>
                        </div>
                    </div> --}}

                    
                    <b>Billing Details</b><hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="" required name="first_name">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="" required name="last_name">
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

                    <div class="form-group">
                        <span style="float: right; font-size: 1em;" class="package_amount">€1</span>
                        <label style="font-weight: bold; font-size: 1.2em;" class="package_name">Single Package</label>

                        
                    </div>

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
                                                <div style="color:red" id="card-errors" role="alert"></div>
                                               
                                                
                    <div class="card-footer">
                        <div class="book-buttons">
                            <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                            <button type="submit" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Pay Now</button>
                        </div>
                        {{-- <button type="submit" style="background:black; width: 100%;" class="subscribe btn btn-primary btn-block shadow-sm book-buttons">Confirm Payment</button> --}}
                    </div>
                </div>
                <!-- End of Stripe Card Form -->
                <!-- <div class="book-buttons">
                    <button type="button" class="previous-btn">Previous</button>
                </div> -->
            </div>

 </div>
 </div>
</div>
      <!-- <div class="row mt-3" id="stripe-card-form" style="display: none;">

         
                            
                            <input type="hidden"  name="student_id">
                            <div class="form-group">
                                <label for="username">
                                    <h6>Card Owner</h6>
                                </label>
                                <input type="text" name="username" placeholder="Card Owner Name" required class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="cardNumber">
                                    <h6>Card number</h6>
                                </label>
                                <div class="input-group">
                                <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control card-number" size='20' autocomplete='off' required />
                                    <div class=" mt-5 input-group-append">
                                        <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>
                                            <span class="hidden-xs">
                                                <h6>Expiration Date</h6>
                                            </span>
                                        </label>
                                        <div class="input-group">
                                        <input type="number" placeholder="MM" name="card-expiry-month" class="form-control card-expiry-month" required size='2'>
                                        <input type="number" placeholder="YY" name="card-expiry-year" class="form-control card-expiry-year" required size='2'>

                                 </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                            <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                        </label>
                                        <input type="text" autocomplete='off' required class="form-control card-cvc" size='4'>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm">Confirm Payment</button></div>
                        </form>
        @if ((Session::has('success-message')))
        <div class="alert alert-success col-md-12">{{
          Session::get('success-message') }}</div>
        @endif @if ((Session::has('fail-message')))
        <div class="alert alert-danger col-md-12">{{
          Session::get('fail-message') }}</div>
        @endif
    </div> -->


        </div>
    </section>

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
        // if (!$form.data('cc-on-file')) {
        //   e.preventDefault();
        //   Stripe.setPublishableKey('pk_test_51Owfu5HDyUEvV9bCayz668CJCAwcNZjlHeXi36IFKL5b8bfuJTaaH0IbjQ91u9SXsXQQiOvjwryzDji77CTYycY900ZTXAEwYK');

        //   // Capture the expiration month input
        //   var expMonth = $('.card-expiry-month').val();

        //   Stripe.createToken({
        //       number: $('.card-number').val(),
        //       cvc: $('.card-cvc').val(),
        //       // Pass the expiration month
        //       exp_month: expMonth,
        //       exp_year: $('.card-expiry-year').val()
        //   }, stripeResponseHandler);

          
        // }
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
    document.addEventListener('DOMContentLoaded', function () {
        // var paymentMethodSelect = document.getElementById('payment_method');
        // var stripeCardForm = document.getElementById('stripe-card-form');

        // paymentMethodSelect.addEventListener('change', function () {
        //     var selectedOption = paymentMethodSelect.value;

        //     if (selectedOption === 'credit_card') {
        //         stripeCardForm.style.display = 'block';
        //     } else {
        //         stripeCardForm.style.display = 'none';
        //     }
        // });

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


    function stripeTokenHandler(token){
        
        /* token contains id, last4, and card type */
        consultancyForm.find('input[type=text]').empty();
        consultancyForm.append("<input type='hidden' name='stripeToken' value='" + token.id + "'/>");
        consultancyForm.get(0).submit();
        
    }

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
<script>

document.addEventListener('DOMContentLoaded', function () {
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

    const steps = document.querySelectorAll('.form-step');
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.previous-btn');
    const progressBar = document.getElementById('book-progressbar').children;
    let currentStep = 0;
   
   

    function showStep(step) {
        steps.forEach((stepElement, index) => {
            
            stepElement.classList.toggle('active', index === step);
            progressBar[index].classList.toggle('active', index == step);
        });
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
                if(currentStep <= 3){
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

    // const form = document.getElementById('consultancyForm');
    // const step1 = document.getElementById('step1');
    // const step2 = document.getElementById('step2');
    // const step3 = document.getElementById('step3');
    // const step4 = document.getElementById('step4');

    // const nextBtnStep1 = document.getElementById('next-btn-step1');
    // const nextBtnStep2 = document.getElementById('next-btn-step2');

    // const guidanceForm = document.getElementById('guidance_form');
    const guidancePackage = document.getElementById('guidance_package');

    // const emailInput = document.getElementById('email');
    // const phoneInput = document.getElementById('phone');
    // const emailError = document.getElementById('email-error');
    // const phoneError = document.getElementById('phone-error');

    // function validateForm() {
    //     let isValid = true;

    //     if (!emailInput.value) {
    //         emailError.style.display = 'inline';
    //         isValid = false;
    //     } else {
    //         emailError.style.display = 'none';
    //     }

    //     if (!phoneInput.value) {
    //         phoneError.style.display = 'inline';
    //         isValid = false;
    //     } else {
    //         phoneError.style.display = 'none';
    //     }

    //     nextButtons[0].disabled = !isValid;
    // }


    function validateStep1() {

        $(".package_amount").text("€"+$("#guidance_package :selected").val().split('|')[1]);
        $(".package_name").text($("#guidance_package :selected").text())
    }

    // function validateStep3() {
    //     let isValid = true;
    //     if (!emailInput.value) {
    //         emailError.style.display = 'inline';
    //         isValid = false;
    //     } else {
    //         emailError.style.display = 'none';
    //     }

    //     if (!phoneInput.value) {
    //         phoneError.style.display = 'inline';
    //         isValid = false;
    //     } else {
    //         phoneError.style.display = 'none';
    //     }

    //     nextBtnStep2.disabled = !isValid;
    // }

    // guidanceForm.addEventListener('change', validateStep1);
    guidancePackage.addEventListener('change', validateStep1);

    // validateForm();
    
    // emailInput.addEventListener('input', validateForm);
    // phoneInput.addEventListener('input', validateForm);

    // emailInput.addEventListener('input', validateStep3);
    // phoneInput.addEventListener('input', validateStep3);

    // nextBtnStep1.addEventListener('click', function () {
    //     step1.style.display = 'none';
    //     step2.style.display = 'block';
    // });

    // nextBtnStep2.addEventListener('click', function () {
    //     step2.style.display = 'none';
    //     step3.style.display = 'block';
    //     validateStep3(); // Validate step 3 fields
    // });

    // document.querySelectorAll('.previous-btn').forEach(button => {
    //     button.addEventListener('click', function () {
    //         if (step2.style.display === 'block') {
    //             step2.style.display = 'none';
    //             step1.style.display = 'block';
    //         } else if (step3.style.display === 'block') {
    //             step3.style.display = 'none';
    //             step2.style.display = 'block';
    //         }
    //     });
    // });

    // var consultancyForm = $(".require-validation");

    // // consultancyForm.addEventListener('submit', function (e) {
    // consultancyForm.on("submit", function(e) {
    //     e.preventDefault();
        
    //     stripe.createToken(cardNumber).then(function(result) {
    //         if (result.error) {
    //             const errorElement = document.getElementById('card-errors');
    //             errorElement.textContent = result.error.message;

    //             $('.error')
    //             .removeClass('hide')
    //             .find('.alert')
    //             .text(response.error.message);

    //             // $('.fa-spin').css("display","none");

    //         } else {
    //             stripeTokenHandler(result.token);
                
    //         }
    //     });

    //     // alert('Form submitted successfully!');
    // });


    // function stripeTokenHandler(token){
        
    //     /* token contains id, last4, and card type */
    //     $form.find('input[type=text]').empty();
    //     $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    //     $form.get(0).submit();
        
    // }

    
});

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
</section>
