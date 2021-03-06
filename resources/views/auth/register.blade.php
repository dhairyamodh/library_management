@extends('layouts.master')

@section('title')
    Library Management | Register
@endsection


@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
@endsection


@section('content')
    <section>
        <div class="header-inner two">
            <div class="inner text-center">
                <!-- <h4 class="title text-white uppercase">We Are Hasta</h4>
                        <h5 class="text-white uppercase">Get Many More Features</h5> -->
            </div>
            <div class="overlay bg-opacity-5"></div>
            <img src="http://placehold.it/1920x800" alt="" class="img-responsive" />
        </div>
    </section>
    <!-- end header inner -->
    <div class="clearfix"></div>
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>REGISTER</h3>
                    </div>
                    {{-- <div class="col-md-6 text-right">
                        <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> <a href="index.html">Pages</a>
                            <i> /
                            </i> Registration
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-centered">
                    <div class="text-box padding-2 border">

                        <div class="smart-forms smart-container wrap-3">

                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-body">

                                    <label for="names" class="field-label">Your names</label>

                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                                autofocus class="gui-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                placeholder="First name...">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                        @if ($errors->has('name'))
                                            <div style="color: #f43819"><small>{{ $errors->first('name') }}</small></div>
                                        @endif
                                    </div><!-- end section -->

                                    <!-- <div class="section">
                                              <label for="username" class="field-label">Choose your username </label>
                                              <div class="smart-widget sm-right smr-120">
                                                <label class="field prepend-icon">
                                                  <input type="text" name="username" id="username" class="gui-input" placeholder="john-doe">
                                                  <span class="field-icon"><i class="fa fa-user"></i></span>
                                                </label>
                                                <label for="username" class="button">.envato.com</label>
                                              </div>
                                            </div> -->
                                    <div class="section">
                                        <label for="email" class="field-label">Your email address</label>
                                        <label class="field prepend-icon">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                                class="gui-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                placeholder="example@domain.com...">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                        @if ($errors->has('email'))
                                            <div style="color: #f43819"><small>{{ $errors->first('email') }}</small></div>
                                        @endif
                                    </div>

                                    <div class="">
                                        <div class="section">
                                            <label for="password" class="field-label">Create a password</label>
                                            <label class="field prepend-icon">
                                                <input id="password" type="password" name="password" required
                                                    class="gui-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    placeholder="Enter password">
                                                <span class="field-icon"><i class="fa fa-lock"></i></span>
                                            </label>
                                            @if ($errors->has('password'))
                                                <div style="color: #f43819"><small>{{ $errors->first('password') }}</small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="confirmPassword" class="field-label">Confirm your password</label>
                                        <label class="field prepend-icon">
                                            <input id="password-confirm" type="password" name="password_confirmation"
                                                required class="gui-input" placeholder="Re-type password">
                                            <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>
                                        </label>
                                    </div>

                                    <!-- <label for="birthday" class="field-label">Your birthday</label>
                                            <div class="frm-row">
                                              <div class="section colm colm4">
                                                <label for="month" class="field select">
                                                  <select id="month" name="month">
                                                    <option value="01">01 - Jan</option>
                                                    <option value="02">02 - Feb</option>
                                                    <option value="03">03 - Mar</option>
                                                    <option value="04">04 - Apr</option>
                                                    <option value="05">05 - May</option>
                                                    <option value="06">06 - Jun</option>
                                                    <option value="07">07 - Jul</option>
                                                    <option value="08">08 - Aug</option>
                                                    <option value="09">09 - Sep</option>
                                                    <option value="10">10 - Oct</option>
                                                    <option value="11">11 - Nov</option>
                                                    <option value="12">12 - Dec</option>
                                                  </select>
                                                  <i class="arrow double"></i>
                                                </label>
                                              </div> -->

                                    <!-- <div class="section colm colm4">
                                                <label for="day" class="field">
                                                  <input type="text" name="day" id="day" class="gui-input" placeholder="Day...">
                                                </label>
                                              </div>
                        
                                              <div class="section colm colm4">
                                                <label for="year" class="field">
                                                  <input type="text" name="year" id="year" class="gui-input" placeholder="Year...">
                                                </label>
                                              </div> -->


                                    <!-- <div class="section">
                                              <label for="gender" class="field-label">Gender </label>
                                              <label class="field select">
                                                <select id="gender" name="gender">
                                                  <option value="">I am...</option>
                                                  <option value="male">Male</option>
                                                  <option value="female">Female</option>
                                                  <option value="other">Other</option>
                                                </select>
                                                <i class="arrow double"></i>
                                              </label>
                                            </div> -->



                                    <!-- <div class="section">
                                              <label for="verify" class="field-label">Prove you're not a robot </label>
                                              <div class="smart-widget sm-left sml-80">
                                                <label class="field prepend-icon">
                                                  <input type="text" name="verify" id="verify" class="gui-input" placeholder="Enter captcha">
                                                  <span class="field-icon"><i class="fa fa-shield"></i></span>
                                                </label>
                                                <label for="verify" class="button">4 + 12</label>
                                              </div>
                                            </div> -->

                                    <!-- <div class="section">
                                              <label class="option">
                                                <input type="checkbox" name="check1">
                                                <span class="checkbox"></span>
                                                Agree to our <a href="#" class="smart-link"> terms of service </a>
                                              </label>
                                            </div> -->

                                </div><!-- end .form-body section -->
                                <div class="form-footer">
                                    <button type="submit" class="button btn-primary">Create Account</button>
                                </div><!-- end .form-footer section -->
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <!--end item-->

        </div>
    </section>



@endsection
@section('scripts')

@endsection
