@extends('layouts.master')

@section('title')
    Library Management | Reset Password
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
            <h3>Reset Password Form</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> <a href="index.html">Pages</a> <i> /
              </i> Reset Password Form</div>
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
                  <div class="spacer-b30">
                    <div class="tagline"><span>Reset Password </span></div><!-- .tagline -->
                  </div>
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

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
                            <label class="field prepend-icon">
                                <input id="password-confirm" type="password" class="gui-input {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" required placeholder="Enter confirm password">
                                <span class="field-icon"><i class="fa fa-lock"></i></span>
                                
                            </label>
                            @if ($errors->has('password_confirmation'))
                                <div style="color: #f43819"><small>{{ $errors->first('password_confirmation') }}</small></div>
                                @endif
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
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
