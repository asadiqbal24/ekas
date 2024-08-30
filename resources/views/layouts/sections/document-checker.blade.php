<section class="oks-signup-form" id="book-consult-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="oks-section-content">
                    <h2>Document Checker</h2>
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
                        <li>Documents<span></span></li>
                        <li>Payment<span></span></li>
                    </ul>
                </div>
                <div class="oks-book-consultent-wrap">
                    <form id="get_user_data_form" method="POST" enctype="multipart/form-data">
                        @csrf
                       <input type="hidden" readonly name="user_id" value="{{auth()->user()->id}}">
                        <!-- Step 1: Personal Info -->
                        <div class="form-step active" id="step-1">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name here" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email here" required>
                                <span id="email-error" class="error">Email is required</span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Phone here" required>
                                <span id="phone-error" class="error">Phone number is required</span>
                            </div>

                            <div class="book-buttons">
                                <button type="button" class="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
                            </div>
                        </div>

                        <!-- Step 2: Documents -->
                        <div class="form-step" id="step-2">
                            <div class="form-group">
                                <label for="updated_cv">Updated CV</label>
                                <input type="file" name="updated_cv" id="updated_cv" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="visa_application_form">Visa Application Form</label>
                                <input type="file" name="visa_application_form" id="visa_application_form" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="passport">Passport</label>
                                <input type="file" name="passport" id="passport" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="masters_degree">Masters Degree</label>
                                <input type="file" name="masters_degree" id="masters_degree" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="masters_degree_transcript">Masters Degree Transcript</label>
                                <input type="file" name="masters_degree_transcript" id="masters_degree_transcript" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="bachelors_degree">Bachelors Degree</label>
                                <input type="file" name="bachelors_degree" id="bachelors_degree" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="bachelors_degree_transcript">Bachelors Degree Transcript</label>
                                <input type="file" name="bachelors_degree_transcript" id="bachelors_degree_transcript" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="metric_gcse_diploma">Metric/GCSE Diploma</label>
                                <input type="file" name="metric_gcse_diploma" id="metric_gcse_diploma" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="higher_secondary_a_level_diploma">Higher Secondary / A-Level Diploma</label>
                                <input type="file" name="higher_secondary_a_level_diploma" id="higher_secondary_a_level_diploma" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="english_language_test">English Language Test (IELTS, TOEFL, PET or Other)</label>
                                <input type="file" name="english_language_test" id="english_language_test" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="recommendation_letter">Recommendation Letter</label>
                                <input type="file" name="recommendation_letter" id="recommendation_letter" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="letter_of_acceptance">Letter of Acceptance</label>
                                <input type="file" name="letter_of_acceptance" id="letter_of_acceptance" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="proof_of_financial_support">Proof of Financial Support</label>
                                <input type="file" name="proof_of_financial_support" id="proof_of_financial_support" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="hec_attestations_or_equivalency">HEC Attestations or Equivalency</label>
                                <input type="file" name="hec_attestations_or_equivalency" id="hec_attestations_or_equivalency" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="any_other_document">Any Other Document</label>
                                <input type="file" name="any_other_document" id="any_other_document" class="form-control-file" accept=".pdf,.doc,.docx">
                            </div>
                            <div class="form-group">
                                <label for="customer_message">Additional Details</label>
                                <textarea name="customer_message" id="customer_message" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="book-buttons">
                                <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                <button type="button" class="next-btn" id="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Next</button>
                            </div>
                        </div>


                        <!-- Step 3: Payment -->
                        <div class="form-step" id="step-3">
                            <div class="mb-3">
                                <div class="form-group">
                                    <span style="float: right; font-size: 1em;"> <input type="hidden" name="amount" value="15" readonly> €15</span><label style="font-weight: bold; font-size: 1.2em;">Document Review</label>
                                    <p style="font-size: 0.8em; margin-top: 10px;">
                                        Submit your documents for a comprehensive review by our experienced counsellors. You will receive detailed feedback on your submissions within one week, ensuring that your documents meet all necessary requirements and standards.
                                    </p>

                                </div>

                                <b>Billing Details</b>
                                <hr>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" required class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" required class="form-control" placeholder="">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" required class="form-control" placeholder="">
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Town City</label>
                                            <input type="text" name="city" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">PostCode</label>
                                            <input type="text" name="postcode" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country/City</label>
                                            <input type="text" name="country" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="billing_email" required class="form-control" placeholder="">
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
                                        <input type="text" required class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Expiry date</label>
                                        <div id="card-expiry" required class="form-control"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">CVV Code</label>
                                        <div id="card-cvc" required class="form-control"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="card-errors" role="alert"></div>

                            <div class="form-group">
                                <div class="book-buttons">
                                    <button type="button" class="previous-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: left;">Previous</button>
                                    <button type="submit" class="next-btn" id="next-btn" style="width: calc(50% - 5px); box-sizing: border-box; float: right; margin-right: 0px;">Pay Now</button>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
        const stripe = Stripe('pk_test_51PZx7wRqr2H0WfyWfc3GT3t0wK7FMvO36jHusWZYO4nXVBdfcYvRBhhFyBV5KozrlS38R3t2vZMBHmVXbOiY1HZ9005BZEaZLD'); // Replace with your Stripe publishable key
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

        const form = document.getElementById('get_user_data_form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(cardNumber).then(function(result) {
                if (result.error) {
                    const errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            const form = document.getElementById('get_user_data_form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
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

        nextButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
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

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const modal = document.getElementById('submission-message');
            modal.style.display = 'block';

            modal.querySelector('.close').onclick = function() {
                modal.style.display = 'none';
            };

            window.onclick = function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
        });

        const emailError = document.getElementById('email-error');
        const phoneError = document.getElementById('phone-error');

        validateForm();

        emailInput.addEventListener('input', validateForm);
        phoneInput.addEventListener('input', validateForm);
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