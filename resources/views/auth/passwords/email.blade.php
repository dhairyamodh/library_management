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
              <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}
                <div>
                  <div class="spacer-b30">
                    <div class="tagline"><span>Reset Password </span></div><!-- .tagline -->
                  </div>

                  
                  <div class="section">
                      
                    <label class="field prepend-icon">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="section">
                        
                            <label class="field prepend-icon">
                              <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus class="gui-input {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter email">
                              <span class="field-icon"><i class="fa fa-user"></i></span>
                              
                            </label>
                            @if ($errors->has('email'))
                              <div style="color: #f43819"><small>{{ $errors->first('email') }}</small></div>
                                          
                                      @endif
                          </div><!-- end section -->
                        

                          <div class="form-footer">
                            <button type="submit" class="button btn-primary">send password reset link</button>
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
