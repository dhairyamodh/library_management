@extends('layouts.admin_login')

@section('title')
    Admin Panel | Login
@endsection


@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
@endsection


@section('content')

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-pattern">

            <div class="card-body p-4">
                
                <div class="text-center w-75 m-auto">
                    <a href="index.html">
                        <span><img src="../images/logo-lg.png" alt="" height="50"></span>
                    </a>
                    <h5 class="text-uppercase text-center font-bold mt-4">ADMIN SIGN IN</h5>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                        @if (session('error'))
                    <div class="alert alert-danger {{ $errors->has('email') ? ' has-error' : '' }}">{{ session('error') }}</div>
                        @endif 
                        <div class="form-group mb-3">
                            <label for="emailaddress">Email address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <a href="{{ route('password.request') }}" class="text-muted float-right"><small>Forgot your password?</small></a>
                            
                            <label for="password">Password</label>
                           
                                <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password" placeholder="Enter your password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox checkbox-success">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-center">
                                <button type="submit" class="btn btn-gradient btn-block">
                                    SIGN IN 
                                </button>
                            
                        </div>
                    </form>
                </div> <!-- end card-body -->
                </div>
                <!-- end card -->

           

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    
          
@endsection
@section('scripts')

@endsection
