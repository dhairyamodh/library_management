@extends('layouts.master')

@section('title')
    Library Management | Register
@endsection


@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />
@endsection


@section('content')

<section class="sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="team-holder2 bmargin">
                    <div class="img-holder">

                        <img src="https://cdn.pixabay.com/photo/2018/08/28/12/41/avatar-3637425_960_720.png"
                            alt="" class="img-responsive">
                    </div>
                    <div class="content-box less-pading text-center">
                        <h5 class="nomargin title">{{Auth::user()->name}}</h5>
                        <h6 class="text-orange-2 nopadding">{{Auth::user()->email}}</h6>
                        <br>
                        <!-- <p>(888) 123-4567</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="text-box padding-3 border">

                    <div class="smart-forms smart-container wrap-3">

                        <h3>Edit Profile</h3>

                        <form method="post" action="/" id="account">
                            <div class="form-body">

                                <label for="names" class="field-label">Your names</label>
                               

                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="text" name="firstname" id="firstname" class="gui-input"
                                                placeholder="First name..." value="{{Auth::user()->name}}">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                <div class="frm-row">
                                    <div class="section colm colm6">
                                        <label for="email" class="field-label">Your email address</label>
                                        <label class="field prepend-icon">
                                            <input type="email" name="email" id="email" class="gui-input"
                                                placeholder="example@domain.com..." value="{{Auth::user()->email}}">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                    </div>

                                    <div class="section colm colm6">
                                        <label for="mobile" class="field-label">Mobile phone </label>
                                        <label class="field prepend-icon">
                                            <input type="tel" name="mobile" id="mobile" class="gui-input"
                                                placeholder="+256">
                                            <span class="field-icon"><i class="fa fa-phone-square"></i></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="section">
                                    <label for="mobile" class="field-label">Address</label>
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="sendermessage" name="sendermessage"
                                            placeholder="Enter address"></textarea>
                                        <span class="field-icon"><i class="fa fa-map-marker"></i></span>
                                    </label>
                                </div>

                            </div><!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" class="button btn-primary">Save Changes</button>
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
