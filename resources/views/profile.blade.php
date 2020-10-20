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
                        <label class="file"><i class="fa fa-pencil"></i>
                            <input type="file" size="60" id="avatar_img" user_id="{{Auth::user()->id}}" token="{{ csrf_token() }}">
                            </label> 
                            <div style="display: flex;justify-content: center;align-items: center;">
                            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                <img id="avatar" src="{{ (Auth::user()->avatar != "") ? Auth::user()->avatar  : 'images/profile.png'}}" style="width:100%;height:350px; object-fit:cover;"
                                    class="img-responsive">
                        </div>
                    </div>
                    <div class="content-box less-pading text-center">
                        <h4 class="nomargin title">{{Auth::user()->name}}</h4>
                        <h5 class="text-orange-2 subtitle">{{Auth::user()->email}}</h5>
                        <!-- <p>(888) 123-4567</p> -->
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="text-box padding-3 border">

                    <div class="smart-forms smart-container wrap-3">
                        <div style="display: flex; justify-content:space-between; align-items:flex-end;">
                        <h3>Edit Profile</h3>
                        <h5 style="padding:8px; border-radius:10px; background:#fd602c; color:#fff"><span>ID: </span>{{ Auth::user()->unique_id }}</h5>
                    </div>
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form method="post" action="/save-profile/{{Auth::user()->id}}" id="account">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-body">
                                <div class="frm-row">
                               
                                <div class="section colm colm6">
                                    <label for="names" class="field-label">Your names</label>
                                        <label class="field prepend-icon">
                                            <input type="text" name="name" id="firstname" class="gui-input @if ($errors->has('name')) is-invalid @endif"
                                                placeholder="First name..." value="{{Auth::user()->name}}">
                                            <span class="field-icon"><i class="fa fa-user"></i></span>
                                        </label>
                                        @if ($errors->has('name'))
                                            <div style="color: #f43819"><small>{{ $errors->first('name') }}</small></div>
                                        @endif
                                    </div><!-- end section -->
                                    <div class="section colm colm6">
                                        <label for="mobile" class="field-label">Mobile phone </label>
                                        <label class="field prepend-icon">
                                            <input type="tel" name="phone" id="mobile" class="gui-input @if ($errors->has('phone')) is-invalid @endif"
                                                placeholder="Enter mobile number (optional)" value="{{Auth::user()->phone}}">
                                            <span class="field-icon"><i class="fa fa-phone-square"></i></span>
                                        </label>
                                        
                                        @if ($errors->has('phone'))
                                            <div style="color: #f43819"><small>{{ $errors->first('phone') }}</small></div>
                                        @endif
                                    </div>
                                </div>

                                <div class="frm-row">
                                    <div class="section colm colm6">
                                        <label for="email" class="field-label">Your email address</label>
                                        <label class="field prepend-icon">
                                            <input type="email" name="email" id="email" class="gui-input @if ($errors->has('email')) is-invalid @endif"
                                                placeholder="example@domain.com..." value="{{Auth::user()->email}}">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                        @if ($errors->has('email'))
                                            <div style="color: #f43819"><small>{{ $errors->first('email') }}</small></div>
                                        @endif
                                    </div>

                                    <div class="section colm colm6">
                                        <label for="email" class="field-label">Your seconadry email address</label>
                                        <label class="field prepend-icon">
                                            <input type="email" name="secondary_email" id="email" class="gui-input @if ($errors->has('secondary_email')) is-invalid @endif"
                                                placeholder="Enter email (optional)" value="{{Auth::user()->secondary_email}}">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                        @if ($errors->has('secondary_email'))
                                            <div style="color: #f43819"><small>{{ $errors->first('secondary_email') }}</small></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="section">
                                    <label for="mobile" class="field-label">Address</label>
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="sendermessage" name="address"
                                            placeholder="Enter address (optional)">{{Auth::user()->address}}</textarea>
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
<script>
    $(document).ready(()=>{
        $('body').on('change', "#avatar_img", function() {
                var id = $(this).attr('user_id');
                var token = $(this).attr('token');
                var error_images = '';
                var name = document.getElementById("avatar_img").files[0].name;
                var form_data = new FormData();
                var ext = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(ext, ['jpg', 'png', 'jpeg', 'gif']) == -1) {
                    error_images += "Invalid Image File";
                }
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("avatar_img").files[0]);
                var f = document.getElementById("avatar_img").files[0];
                var fsize = f.size || f.fileSize;
                if (fsize > 2000000) {
                    error_images += '<p>' + i + ' File Size is very big</p>';
                } else {
                    form_data.append("file", document.getElementById('avatar_img').files[0]);
                }
                if (error_images == '') {
                    form_data.append('_token', token);
                    $.ajax({
                        url: "/change-avatar/"+id,
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function() {
                            $('.lds-ring').css('display','block');
                        },
                        success: function(data) {
                            $('.lds-ring').css('display','none');
                            location.reload(true);
                        }
                    });
                } else {
                    console.log(error_images)
                    return false;
                }
            });
        })
</script>
@endsection
