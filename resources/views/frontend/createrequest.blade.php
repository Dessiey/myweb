@include('layouts.main')
<br><br>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
     
        <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          
            <h2>Conference</h2>
          <ol>
            <li><a href="">MYWEB</a></li>
            <li>Conference</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
    
            <div class="section-title">
                <h2>publications / Achievements </h2>
                <p>Jimma University to Become First Institution in Ethiopia to Carry Out Molecular Entomology
                    <a
                        href="https://www.pmi.gov/jimma-university-to-become-first-institution-in-ethiopia-to-carry-out-molecular-entomology/">
                        Read more on US President's Malaria initiative PMI
                    </a>
                </p>
            </div>
            <div class="faq-list">
                <ul>
                    @for ($i = 0; $i < count($publications); $i++)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box iconbox-orange ">
                          <div class="member-img">
                            Research Graphical results   <img src="logo/sokoru.jpg" class="img-fluid" alt="">
                           
                        </div>
                         
                        </div>
                      </div>  
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                class="collapse" data-bs-target="#faq-list-{{ $i }}"
                                class="collapsed">
                                {{ !empty($publications[$i]['title']) ? $publications[$i]['title'] : '' }}
                                <i class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{ $i }}" class="collapse" data-bs-parent=".faq-list">
                                <p><i>
                                        <small>
                                            {{ !empty($publications[$i]['abstract']) ? $publications[$i]['abstract'] : '' }}
    
                                            <u> <a href="{{ !empty($publications[$i]['paperlink']) ? $publications[$i]['paperlink'] : '' }} 
                                " target="_blank">
                                                    click here to read more </u> </small></i>
                                    </a>
                                </p>
                            </div>
                        </li>
                    @endfor
    
    
    
                </ul>
            </div>
    
        </div>
    </section>
     
<!------ Include the above in your HEAD tag ---------->
<section>
    <br>
    <br>
    <div class="row justify-content-center">

    <div class="col-md-7">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('message'))
                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong>
                            <h5>{{ $message }}</h5>
                        </div>
                    @endif

                    <form action="{{ route('storeapprequest') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <div class="input-group text-center">
                        <h4> <b> Application Form</b> </h4>
                        </div>
                        <small><i> Please fill the required details, Keep your application number and Pay Application Fee Using CBE Birr  </i> </small>
                        <hr>
                        <div class="input-group text-center">
                           <b> Applicant Information</b>
                        </div>
                        <div class="form-group {{ $errors->has('fullName') ? 'has-error' : '' }}">
                            <label for="fullName">{{ trans('cruds.user.fields.name') }}*</label>
                            <input type="text" id="fullName" name="fullName" placeholder="Full Name"
                                class="form-control"
                                value="{{ old('fullName', isset($application) ? $application->fullName : '') }}"
                                required>
                            @if ($errors->has('fullName'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('fullName') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="usertype">Gender</label>
                            <select name="gender" required>
                                <option value="" selected>...Select Gender...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city">{{ trans('cruds.user.fields.city') }}*</label>
                            <input type="text" id="city" name="city" placeholder="Current City" class="form-control"
                                value="{{ old('city', isset($application) ? $application->city : '') }}" required>
                            @if ($errors->has('city'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('city') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.city_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
                            <label for="region">{{ trans('cruds.user.fields.region') }}*</label>
                            <input type="text" id="region" name="region" placeholder="State or Region"
                                class="form-control"
                                value="{{ old('region', isset($application) ? $application->region : '') }}"
                                required>
                            @if ($errors->has('region'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('region') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.region_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('postcode') ? 'has-error' : '' }}">
                            <label for="postcode">{{ trans('cruds.user.fields.postcode') }}*</label>
                            <input type="text" id="postcode" name="postcode" placeholder="postcode"
                                class="form-control"
                                value="{{ old('postcode', isset($application) ? $application->postcode : '') }}"
                                required>
                            @if ($errors->has('postcode'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('postcode') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.postcode_helper') }}
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select id="country" name="country">
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option selected value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>

                            </select>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                            <input type="email" id="email" name="email" placeholder="Your Email" class="form-control"
                                value="{{ old('email', isset($application) ? $application->email : '') }}" required>
                            @if ($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('phoneNumber') ? 'has-error' : '' }}">
                            <label for="phoneNumber">{{ trans('cruds.user.fields.phoneNumber') }}*</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" placeholder="Phone Number"
                                class="form-control"
                                value="{{ old('phoneNumber', isset($application) ? $application->phoneNumber : '') }}"
                                required>
                            @if ($errors->has('phoneNumber'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('phoneNumber') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.phoneNumber_helper') }}
                            </p>
                        </div>
                        <div class="input-group text-center">
                           <b> Qualification Document Details</b>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('doctype') ? 'has-error' : '' }}">
                            <label for="doctype">{{ trans('cruds.user.fields.doctype') }}*</label>
                            <input type="text" id="doctype" name="doctype" placeholder="Document type or title"
                                class="form-control"
                                value="{{ old('doctype', isset($application) ? $application->doctype : '') }}"
                                required>
                            @if ($errors->has('doctype'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('doctype') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.doctype_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('admtype') ? 'has-error' : '' }}">
                            <label for="admtype">{{ trans('cruds.user.fields.admtype') }}*</label>
                            <input type="text" id="admtype" name="admtype" placeholder="Admisstion Type"
                                class="form-control"
                                value="{{ old('admtype', isset($application) ? $application->doctype : '') }}"
                                required>
                            @if ($errors->has('admtype'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('admtype') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.admtype_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('insname') ? 'has-error' : '' }}">
                            <label for="insname">{{ trans('cruds.user.fields.insname') }}*</label>
                            <input type="text" id="insname" name="insname" placeholder="Institution Name"
                                class="form-control"
                                value="{{ old('insname', isset($application) ? $application->insname : '') }}"
                                required>
                            @if ($errors->has('insname'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('insname') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.insname_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('insregion') ? 'has-error' : '' }}">
                            <label for="insregion">{{ trans('cruds.user.fields.insregion') }}*</label>
                            <input type="text" id="insregion" name="insregion" placeholder="Institution region/city"
                                class="form-control"
                                value="{{ old('insregion', isset($application) ? $application->insregion : '') }}"
                                required>
                            @if ($errors->has('insregion'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('insregion') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.insregion_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('stuid') ? 'has-error' : '' }}">
                            <label for="stuid">{{ trans('cruds.user.fields.stuid') }}*</label>
                            <input type="text" id="stuid" name="stuid" placeholder="Student ID" class="form-control"
                                value="{{ old('stuid', isset($application) ? $application->stuid : '') }}" required>
                            @if ($errors->has('stuid'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('stuid') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.stuid_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('filstudy') ? 'has-error' : '' }}">
                            <label for="filstudy">{{ trans('cruds.user.fields.filstudy') }}*</label>
                            <input type="text" id="filstudy" name="filstudy" placeholder="about you certified, (BSc. in Computer Science)  "
                                class="form-control"
                                value="{{ old('filstudy', isset($application) ? $application->filstudy : '') }}"
                                required>
                            @if ($errors->has('filstudy'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('filstudy') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.filstudy_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('cgpa') ? 'has-error' : '' }}">
                            <label for="cgpa">{{ trans('cruds.certificate.fields.cgpa') }} (if document has)</label>
                            <input type="number" id="cgpa" name="cgpa" placeholder="Cumulative GPA"
                                class="form-control" value="{{ old('cgpa', isset($application) ? $application->cgpa : '') }}"
                                required min="2" max="4">
                            @if ($errors->has('cgpa'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('cgpa') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.certificate.fields.cgpa_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('enryear') ? 'has-error' : '' }}">
                            <label for="enryear">{{ trans('cruds.user.fields.enryear') }}*</label>
                            <input type="date" name="entday"> - to - <input type="date" name="graday"> G.C

                            @if ($errors->has('entday'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('entday') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.entday_helper') }}
                            </p>
                        </div>
                        @csrf
                        <div class="form-group {{ $errors->has('scannedcopy') ? 'has-error' : '' }}">
                            <label for="scannedcopy">{{ trans('cruds.user.fields.scannedcopy') }}*</label>
                            <input type="file" name="scannedcopy" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            @if ($errors->has('scannedcopy'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('scannedcopy') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.scannedcopy_helper') }}
                            </p>
                        </div>

                        <div class="form-group">
                            <div class="form-check checkbox">
                                <input type="checkbox" name="checkagree" required value="checked" id="checkagree" /> I
                                have read and agree to the Terms and Conditions
                            </div>
                        </div>
                        <div class="form-group text-center">
                           
                            <hr>
                            <div class="col-6">
                                <button type="submit"
                                    class="btn btn-primary">{{ trans('cruds.user.fields.signup') }}</button>
                            </div>
                            

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
                    {{-- <div class="container">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    @if ($message = Session::get('message'))
                                        <div class="alert alert-info alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Success!</strong>
                                            <h5>{{ $message }}</h5>
                                        </div>
                                    @endif
                                    <center>
                                        <h3>Request Application Form </h3>
                                    </center>
                                    <i> Please fill the required details and Pay Application Fee Using CBE Birr </i>

                                    <form action="{{ route('storeapprequest') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <td colspan="1">
                                            <div class="well form-horizontal">

                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"> </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span class="input-group">
                                                                    <i class="glyphicon glyphicon">Applicant
                                                                        Information</i></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"> Full Name</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-user"></i></span><input
                                                                    id="fullName" name="fullName"
                                                                    placeholder="Full Name" class="form-control"
                                                                    required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Gender</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group">
                                                                <select name="gender">
                                                                    <option value="" selected>...Select Gender...
                                                                    </option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group">
                                                                <label class="">Current Address</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">City</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-home"></i></span><input
                                                                    id="city" name="city" placeholder="City"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">State/Region</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-home"></i></span><input
                                                                    id="region" name="region" placeholder="State/Region"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Postal Code</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-home"></i></span><input
                                                                    id="postcode" name="postcode"
                                                                    placeholder="Postal Code" class="form-control"
                                                                    required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Country</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"
                                                                    style="max-width: 100%;"><i
                                                                        class="glyphicon glyphicon-list"></i></span>
                                                                <select id="country" name="country">
                                                                    <option value="Afganistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American Samoa">American Samoa
                                                                    </option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antigua & Barbuda">Antigua & Barbuda
                                                                    </option>
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
                                                                    <option value="Bonaire">Bonaire</option>
                                                                    <option value="Bosnia & Herzegovina">Bosnia &
                                                                        Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Ter">British
                                                                        Indian Ocean Ter</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Canary Islands">Canary Islands
                                                                    </option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands
                                                                    </option>
                                                                    <option value="Central African Republic">Central
                                                                        African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Channel Islands">Channel Islands
                                                                    </option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island
                                                                    </option>
                                                                    <option value="Cocos Island">Cocos Island</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaco">Curacao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic
                                                                    </option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican
                                                                        Republic</option>
                                                                    <option value="East Timor">East Timor</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea
                                                                    </option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option selected value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands">Falkland Islands
                                                                    </option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia
                                                                    </option>
                                                                    <option value="French Southern Ter">French Southern
                                                                        Ter</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Great Britain">Great Britain</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Hawaii">Hawaii</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="Korea North">Korea North</option>
                                                                    <option value="Korea Sout">Korea South</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macau">Macau</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands
                                                                    </option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Midway Islands">Midway Islands
                                                                    </option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Nambia">Nambia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherland Antilles">Netherland
                                                                        Antilles</option>
                                                                    <option value="Netherlands">Netherlands (Holland,
                                                                        Europe)</option>
                                                                    <option value="Nevis">Nevis</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island
                                                                    </option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau Island">Palau Island</option>
                                                                    <option value="Palestine">Palestine</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea
                                                                    </option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Phillipines">Philippines</option>
                                                                    <option value="Pitcairn Island">Pitcairn Island
                                                                    </option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Republic of Montenegro">Republic of
                                                                        Montenegro</option>
                                                                    <option value="Republic of Serbia">Republic of
                                                                        Serbia</option>
                                                                    <option value="Reunion">Reunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                                    <option value="St Eustatius">St Eustatius</option>
                                                                    <option value="St Helena">St Helena</option>
                                                                    <option value="St Kitts-Nevis">St Kitts-Nevis
                                                                    </option>
                                                                    <option value="St Lucia">St Lucia</option>
                                                                    <option value="St Maarten">St Maarten</option>
                                                                    <option value="St Pierre & Miquelon">St Pierre &
                                                                        Miquelon</option>
                                                                    <option value="St Vincent & Grenadines">St Vincent &
                                                                        Grenadines</option>
                                                                    <option value="Saipan">Saipan</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="Samoa American">Samoa American
                                                                    </option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome & Principe">Sao Tome &
                                                                        Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands
                                                                    </option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Tahiti">Tahiti</option>
                                                                    <option value="Taiwan">Taiwan</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad & Tobago">Trinidad & Tobago
                                                                    </option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Turks & Caicos Is">Turks & Caicos Is
                                                                    </option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="United Kingdom">United Kingdom
                                                                    </option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Erimates">United Arab
                                                                        Emirates</option>
                                                                    <option value="United States of America">United
                                                                        States of America</option>
                                                                    <option value="Uraguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Vatican City State">Vatican City
                                                                        State</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Virgin Islands (Brit)">Virgin Islands
                                                                        (Brit)</option>
                                                                    <option value="Virgin Islands (USA)">Virgin Islands
                                                                        (USA)</option>
                                                                    <option value="Wake Island">Wake Island</option>
                                                                    <option value="Wallis & Futana Is">Wallis & Futana
                                                                        Is</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zaire">Zaire</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-envelope"></i></span><input
                                                                    id="email" name="email" placeholder="Email"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-earphone"></i></span><input
                                                                    id="phoneNumber" name="phoneNumber"
                                                                    placeholder="Phone Number" class="form-control"
                                                                    required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Enter Captcha</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <span>{!! captcha_img() !!}</span>

                                                            <input id="captcha" type="text" class="form-control"
                                                                placeholder="Enter Captcha" name="captcha">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </td>

                                        <td colspan="1">
                                            <div class="well form-horizontal">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group">
                                                                Qualification Document Details
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"> Document Type/Title
                                                        </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-document"></i></span><input
                                                                    id="doctype" name="doctype"
                                                                    placeholder="documment type" class="form-control"
                                                                    required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Admisstion Type</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon "></i></span><input
                                                                    id="admtype" name="admtype"
                                                                    placeholder="Admission type" class="form-control"
                                                                    required="true" value="" type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Institution Name</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon"></i></span><input
                                                                    id="insname" name="insname"
                                                                    placeholder="Institiution name"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Institute Address</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon-home"></i></span>
                                                                <input id="insregion" name="insregion"
                                                                    placeholder="Region & City" class="form-control"
                                                                    required="true" value="" type="text">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Student ID</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon"></i></span><input
                                                                    id="stuid" name="stuid" placeholder="Student ID"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Field of study/ course/
                                                            certificate /letter </label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group"><span
                                                                    class="input-group-addon"><i
                                                                        class="glyphicon glyphicon"></i></span><input
                                                                    id="filstudy" name="filstudy"
                                                                    placeholder="about you certified"
                                                                    class="form-control" required="true" value=""
                                                                    type="text"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Enrollement Year</label>
                                                        <div class="col-md-8 inputGroupContainer">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"
                                                                    style="max-width: 100%;"><i
                                                                        class="glyphicon glyphicon-list"></i></span>
                                                                <input type="date" name="entday"> - to - <input
                                                                    type="date" name="graday"> G.C

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <br>
                                                        <label class="col-md-4 control-label">Upload Scanned
                                                            Copy</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="scannedcopy"
                                                                class="custom-file-input" id="customFile" required>
                                                            <label class="custom-file-label" for="customFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <input type="checkbox" name="checkagree" required
                                                            value="checked" id="checkagree" /> I have read and agree to
                                                        the Terms and Conditions
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label"></label>
                                                        <button type="submit" class="btn btn-primary btn-sm">Submit My
                                                            Application</button>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div> --}}
                    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
                    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

                   
