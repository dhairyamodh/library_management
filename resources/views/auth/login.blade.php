@extends('layouts.master')

@section('title')
    Library Management | Login
@endsection


@section('link')
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
              <h3>Login Form</h3>
            </div>
            <div class="col-md-6 text-right">
              <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> <a href="index.html">Pages</a> <i> /
                </i> Login Form</div>
            </div>
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
            <div class="text-box padding-3 border">
              <div class="smart-forms smart-container wrap-3">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                  <div>
                    <div class="spacer-b30">
                      <div class="tagline"><span>Sign in With </span></div><!-- .tagline -->
                    </div>

                    <div class="section " style="display: flex; justify-content:center;">
                      <a href="{{ url('/login/facebook') }}" class="button social-btn btn-social facebook span-left"> <span><i
                            class="fa fa-facebook"></i></span><span class="hide-text">Facebook</span> </a>
                      <a href="{{ url('/login/twitter') }}" class="button social-btn btn-social twitter span-left"> <span><i
                            class="fa fa-twitter"></i></span> <span class="hide-text">Twitter</span> </a>
                      <a href="/login/google" class="button social-btn btn-social googleplus span-left"> <span><i
                            class="fa fa-google"></i></span><span class="hide-text">Google</span></a>
                            <a href="#" class="button social-btn btn-social apple span-left"> <span><i
                              class="fa fa-apple"></i></span><span class="hide-text">Apple</span></a>
                    </div><!-- end section -->

                    <div class="spacer-t30 spacer-b30">
                      <div class="tagline"><span> OR Login </span></div><!-- .tagline -->
                    </div>

                    <div class="section">
                        
                      <label class="field prepend-icon">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="gui-input {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter email">
                        <span class="field-icon"><i class="fa fa-user"></i></span>
                        
                      </label>
                      @if ($errors->has('email'))
                        <div style="color: #f43819"><small>{{ $errors->first('email') }}</small></div>
                                    </span>
                                @endif
                    </div><!-- end section -->
                    

                    
                        <div class="section">
                            <label class="field prepend-icon">
                              <input id="password" type="password" name="password" required class="gui-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Enter password">
                              <span class="field-icon"><i class="fa fa-lock"></i></span>
                              
                            </label>
                            @if ($errors->has('password'))
                              <div style="color: #f43819"><small>{{ $errors->first('password') }}</small></div>
                                </span>
                            @endif
                          </div><!-- end section -->
                    
                    <div class="section">
                        <div class="row">
                          <div class="col-md-6">
                            <label class="switch block">
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                              <span class="switch-label" for="remember" data-on="YES" data-off="NO"></span>
                              <span> Keep me logged in ?</span>
                            </label>
                          </div>
                          <div class="col-md-6 " style="display:flex;justify-content: flex-end;">
                            <a href="{{ route('password.request') }}" class="float-right">Forgot Password?</a>
                          </div>
                        </div>
  
                      </div><!-- end section -->
                    

                    </div><!-- end .form-body section -->

                  <div class="form-footer">
                    <button type="submit" class="button btn-primary">Sign in</button>
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