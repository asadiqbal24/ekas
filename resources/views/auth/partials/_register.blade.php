<section class="oks-signup-form-sect">
    <div class="oks-signup-form-wrap">
        <div class="sign-up-progressbar">
            <p>Create An Account - <span class="sign-num">Step <span id="step-number">1</span> of
                    3</span><span class="sing-term-opt">Accept Terms & Condition</span></p>
            <ul id="progressbar">
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <form action="{{ route('register') }}" method="POST" id="registerForm">
            @csrf
            <div class="oks-sign-first-form" id="form-1">
                <div class="sign-up-heading">
                    <!-- <h3>Register</h3> -->
                </div>

                <div class="form-group">
                    <label for="email">Email <sup class="text-danger">*</sup> </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password <sup class="text-danger">*</sup></label>
                    <div class="login-input">
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="show-password">
                        <div class="show-pass-eye-btn-div">
                            <i class="fa-solid fa-eye show-pass-eye-btn" style="cursor: pointer"></i>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password <sup class="text-danger">*</sup></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="show-password">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="sign-up-button-div">
                    <button type="button" id="oks-first-btn" class="first-form-button next" disabled>Next</button>
                </div>
            </div>

            <!-- First form end -->
            <div class="oks-sign-up-second-form" id="form-2">
                <div class="sign-up-heading">
                    <h3>Enter Your Personal Information</h3>
                </div>
                <div class="form-group">
                    <label for="fname">First Name <sup class="text-danger">*</sup></label>
                    <input type="text" name="fname" id="fname" value="{{ old('fname') }}">
                    @error('fname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lname">Last name <sup class="text-danger">*</sup></label>
                    <input type="text" name="lname" id="lname" value="{{ old('lname') }}">
                    @error('lname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="dob">Date of birth <sup class="text-danger">*</sup></label>
                    <input type="date" name="dob" id="dob" placeholder="" value="{{ old('dob') }}">
                    @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Gender <sup class="text-danger">*</sup></label>
                    <div class="oks-gender">
                        <label for="male" class="gender">Male
                            <input type="radio" id="male" name="gender" class="gender_value" value="Male">
                        </label>
                        <label for="female" class="gender">Female
                            <input type="radio" id="female" name="gender" value="Female">
                        </label>
                        <label for="other" class="gender">Other
                            <input type="radio" id="other" name="gender" value="Other">
                        </label>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="academic">Current Study <sup class="text-danger">*</sup></label>
                    <select name="academic" id="academic">
                        <option value="Bachelors">Bachelors</option>
                        <option value="Masters">Masters</option>
                        <option value="PhD">PhD</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('academic')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lookingfor">Looking For <sup class="text-danger">*</sup></label>
                    <div class="oks-study-checkbox" id="lookingfor">
                        <label><input type="radio" name="lookingfor" value="Bachelors">Bachelors</label>
                        <label><input type="radio" name="lookingfor" value="Masters">Masters</label>
                        <label><input type="radio" name="lookingfor" value="PhD">PhD</label>
                        <label><input type="radio" name="lookingfor" value="Other">Other</label>
                    </div>
                    @error('lookingfor')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="sign-up-button-div">
                    <button type="button" id="oks-second-prev" class="first-form-button next">Prev</button>
                    <button type="button" id="oks-second-btn" class="first-form-button next" disabled>Next</button>
                </div>
            </div>

            <div class="oks-sign-up-third-form" id="form-3">
                <div class="sign-up-heading">
                    <h3>Enter Your Contact Information</h3>
                </div>
                <div class="form-group">
                    <label for="number">Mobile Number <sup class="text-danger">*</sup></label>
                    <input type="text" name="number" id="number" value="{{ old('number') }}">
                    @error('number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address <sup class="text-danger">*</sup></label>
                    <input type="text" name="address" id="address" value="{{ old('address') }}">
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postalcode">Post Code <sup class="text-danger">*</sup></label>
                    <input type="text" name="postalcode" id="postalcode" value="{{ old('postalcode') }}">
                    @error('postalcode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">City <sup class="text-danger">*</sup></label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}">
                    @error('city')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Select a Country <sup class="text-danger">*</sup></label>
                    <select name="country" id="country">
                         <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                        </option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                            Republic of T <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory
                        </option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chhe">Chhe</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands
                        </option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                        </option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's
                            Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic
                        </option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
                            Yugoslav Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of
                        </option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied
                        </option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines
                        </option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The
                            South Sandwich Islands</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying
                            Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                    @error('country')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="sign-up-button-div">
                    <button type="button" id="oks-third-prev" class="first-form-button next">Prev</button>
                    <button type="button" id="oks-third-btn" class="first-form-button next" disabled>Next</button>
                </div>
            </div>
            <div class="oks-sign-up-fourth-form">
                <div class="sign-up-heading terms-and-condition">
                    <h3>Terms and Conditions for ekas</h3>
                    <div class="terms-and-condition-content">
                        <h4>Introduction</h4>
                        <p>Welcome to ekas ("we," "our," or "us"). These Terms and Conditions govern your
                            use of our website and the services provided therein. By accessing our website
                            and utilising our services, you agree to comply with and be bound by these
                            terms.</p>
                        <h4>User Accounts</h4>
                        <strong>Account Creation</strong>
                        <p>Users have the option to create an ekas account. By creating an ekas account,
                            users agree to provide accurate and up-to-date information. The account
                            credentials are the responsibility of the user.</p>
                        <strong>Account Termination</strong>
                        <p>ekas reserves the right to terminate or suspend user accounts at our discretion,
                            without prior notice, if we believe there is a violation of these Terms and
                            Conditions.</p>
                        <h4> User-Generated Content</h4>
                        <strong>Ownership</strong>
                        <p>Users retain ownership of the content (text, images, etc.) they create or upload
                            on ekas. However, by submitting content, users grant ekas a worldwide,
                            non-exclusive, royalty-free license to use, reproduce, modify, and distribute
                            the content for the purpose of providing our services.</p>
                        <strong>Prohibited Content</strong>
                        <p>Users are prohibited from uploading or creating content that violates applicable
                            laws, infringes on intellectual property rights, or is otherwise offensive or
                            harmful.</p>
                        <h4>Online Services and Purchases</h4>
                        <strong>Purchase of Services</strong>
                        <p>Users may purchase services through ekas's website. Payment details and
                            transactions are processed securely. By making a purchase, users agree to the
                            terms and conditions of the specific service.</p>
                        <strong>Subscription Plans</strong>
                        <p>Subscription plans may be offered, and users opting for such plans agree to the
                            terms outlined in the respective subscription agreement.</p>
                        <h4>Intellectual Property</h4>
                        <strong>Ownership of Content:</strong>
                        <p>All content on ekas's website, including but not limited to logos, visual
                            designs, trademarks, and other proprietary materials, is the exclusive property
                            of ekas and protected by intellectual property laws.</p>
                        <h4>Feedback and Suggestions</h4>
                        <strong>User Feedback</strong>
                        <p>ekas welcomes user feedback and suggestions. By providing feedback, users
                            acknowledge that ekas may implement such suggestions without any obligation to
                            compensate or credit the user</p>
                        <h4>Contacting ekas</h4>
                        <strong>Communication Channels</strong>
                        <p>Users can contact ekas through email, phone, and/or the contact form on the ekas
                            website. ekas aims to respond to inquiries promptly, but response times may
                            vary.</p>
                        <h4>Subscription Plans</h4>
                        <strong>Subscription Terms</strong>
                        <p>Subscription plans may have specific terms and conditions outlined in the ekas
                            subscription agreement. Users are responsible for reviewing and understanding
                            these terms before subscribing.</p>
                        <strong>Cancellation</strong>
                        <p>Users may cancel their ekas subscription according to the terms specified in the
                            subscription agreement. Refund policies, if any, will be detailed in the
                            agreement.</p>
                        <h4> Data Collection and Usage</h4>
                        <strong>Student Information</strong>
                        <p>ekas may collect personal information from students, including but not limited to
                            names, contact details, academic history, and other relevant data necessary for
                            the provision of our services.</p>
                        <strong>Data Processing</strong>
                        <p>ekas processes this data for the purpose of delivering our services, including
                            visa and admission processing, providing manuals, and assisting with course
                            selection.</p>
                        <strong>Data Security</strong>
                        <p>ekas employs industry-standard security measures to protect the confidentiality
                            and integrity of user data. However, ekas cannot guarantee absolute security.
                        </p>
                        <h4> Compliance with GDPR</h4>
                        <strong>EU Data Protection Regulation</strong>
                        <p>ekas complies with the General Data Protection Regulation (GDPR) applicable to
                            the European Union. Our data processing practices align with GDPR principles.
                        </p>
                        <strong>Data Subject Rights:</strong>
                        <p>Students have the right to access, rectify, and erase their personal data.
                            Requests can be made in writing to ekas's contact information.</p>
                        <h4>Cookies and Tracking Technologies</h4>
                        <strong>Cookie Usage</strong>
                        <p>ekas uses cookies and similar technologies to enhance user experience. By using
                            ekas's website, users consent to the use of cookies as outlined in our Cookie
                            Policy.</p>
                        <h4>Third-Party Links</h4>
                        <strong>External Websites</strong>
                        <p>ekas's website may contain links to third-party websites. ekas is not responsible
                            for the content or privacy practices of these sites. Please review their terms
                            and policies.</p>
                        <h4>Limitation of Liability</h4>
                        <strong> No Warranty</strong>
                        <p>ekas provides services on an "as-is" and "as-available" basis. ekas does not
                            warrant the accuracy, completeness, or reliability of its services.</p>
                        <strong>Limitation of Liability</strong>
                        <p>In no event shall ekas be liable for any indirect, incidental, special,
                            consequential, or punitive damages arising out of or in connection with its
                            services</p>
                        <h4>Changes to Terms and Conditions</h4>
                        <p>ekas reserves the right to modify these Terms and Conditions at any time. Changes
                            will be effective immediately upon posting on the ekas website. Users' continued
                            use of ekas's services constitutes acceptance of the modified terms.</p>
                        <h4> Contact Information</h4>
                        <p>For any inquiries regarding these Terms and Conditions or ekas's privacy
                            practices, please contact us at ekas's provided contact information.</p>
                        <p><strong>Please note</strong> that this is a general template and should be
                            customised to fit your specific business model, services, and legal
                            requirements. Consultation with a legal professional is strongly recommended to
                            ensure compliance with all applicable laws and regulations.</p>
                        <h4>Third-party marketing</h4>
                        <p>You can indicate whether you want your information to be made available to third
                            parties for marketing purposes. Note that, due to European law, a third party
                            can receive your personal information if requested, even if you've answered
                            'No'. If this occurs, contact the third-party provider with any questions.</p>
                    </div>
                </div>
                <div class="form-group sign-up-checkbox">
                    <label>
                        <input type="checkbox" name="terms_agreed" id="" value="yes"> I
                        have read and
                        understand the Terms and Conditions for applying to university studies in Austria.
                    </label>
                    @error('terms_agreed')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="sign-up-button-div">
                    <button id="oks-fourth-btn" class="first-form-button">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const form1 = document.getElementById('form-1');
    const form2 = document.getElementById('form-2');
    const form3 = document.getElementById('form-3');

    const nextButton1 = document.getElementById('oks-first-btn');
    const nextButton2 = document.getElementById('oks-second-btn');
    const nextButton3 = document.getElementById('oks-third-btn');

    function checkForm1() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;
        nextButton1.disabled = !(email && password && passwordConfirmation);
    }

    function checkForm2() {
        const fname = document.getElementById('fname').value;
        const lname = document.getElementById('lname').value;
        const dob = document.getElementById('dob').value;
        const gender = document.querySelector('input[name="gender"]:checked');
        const academic = document.getElementById('academic').value;
        const lookingfor = document.querySelectorAll('input[name="lookingfor"]:checked');
       // const lookingfor = document.querySelectorAll('input[name="lookingfor[]"]:checked');
        nextButton2.disabled = !(fname && lname && dob && gender && academic && lookingfor);
        //nextButton2.disabled = !(fname && lname && dob && gender && academic && lookingfor.length > 0);
    }

    function checkForm3() {
        const number = document.getElementById('number').value;
        const address = document.getElementById('address').value;
        const postalcode = document.getElementById('postalcode').value;
        const city = document.getElementById('city').value;
        const country = document.getElementById('country').value;
        nextButton3.disabled = !(number && address && postalcode && city && country);
    }

    form1.addEventListener('input', checkForm1);
    form2.addEventListener('input', checkForm2);
    form3.addEventListener('input', checkForm3);

    checkForm1();
    checkForm2();
    checkForm3();
});
    </script>
    <style>
        /* Add this CSS to your existing stylesheet */
button:disabled {
    background-color: #cccccc; /* Light gray background */
    color: #666666; /* Dark gray text */
    cursor: not-allowed; /* Not-allowed cursor */
}

    </style>
</section>
