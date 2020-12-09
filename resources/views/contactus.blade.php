@extends('layouts.master')

@section('title')
    Library Management | Contact Us
@endsection


@section('links')
@endsection


@section('content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> Contact Us</div>
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

                <div class="col-md-8">
                    <div class="smart-forms bmargin">

                        <form class="parsley-examples" method="post" action="javascript:void()" id="contact_form"
                            token="{{ csrf_token() }}">
                            <div>
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="name" id="sendername" class="gui-input"
                                            placeholder="Enter name">
                                        <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="email" name="email" id="emailaddress" class="gui-input"
                                            placeholder="Email address">
                                        <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section colm colm6">
                                    <label class="field prepend-icon">
                                        <input type="tel" name="mobile" id="telephone" class="gui-input"
                                            placeholder="Telephone">
                                        <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                                </div>
                                <!-- end section -->

                                <div class="section">
                                    <label class="field prepend-icon">
                                        <textarea class="gui-textarea" id="sendermessage" name="message"
                                            placeholder="Enter message"></textarea>
                                        <span class="field-icon"><i class="fa fa-comments"></i></span></label>
                                </div>
                                <!-- end section -->

                                <!-- <div class="section">
                                                                                <div class="smart-widget sm-left sml-120">
                                                                                    <label class="field">
                                                                                        <input type="text" name="captcha" id="captcha" class="gui-input sfcode"
                                                                                            maxlength="6" placeholder="Enter CAPTCHA">
                                                                                    </label>
                                                                                    <label class="button captcode">
                                                                                        <img src="php/captcha/captcha.php?<?php echo time(); ?>"
                                                                                            id="captchax" alt="captcha">
                                                                                        <span class="refresh-captcha"><i class="fa fa-refresh"></i></span>
                                                                                    </label>
                                                                                </div>
                                                                            </div> -->

                                <div class="result"></div>
                                <!-- end .result  section -->

                            </div>
                            <!-- end .form-body section -->
                            <div class="form-footer">
                                <button type="submit" data-btntext-sending="Sending..."
                                    class="button btn-primary">Submit</button>
                                <button type="reset" class="button"> Cancel </button>
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                    <!-- end .smart-forms section -->
                </div>


                <div class="col-md-4">
                    <br />
                    <h4>Address Info</h4>
                    No.28 - 63739 street lorem ipsum City, Country <br />
                    Telephone: +1 1234-567-89000<br />
                    FAX: +1 0123-4567-8900<br />
                    <br />
                    E-mail: <a href="mailto:email@example.com">email@example.com</a><br />
                    Website: <a href="index.html">www.example.com</a>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#contact_form').submit(function(e) {
            e.preventDefault();
            var form_data = new FormData($(this)[0]);
            form_data.append('_token', $(this).attr('token'));
            console.log(form_data);
            $.ajax({
                url: "{{ route('send_contact') }}",
                method: "POST",
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function(response, status, jqXHR) {
                    if (response.status == 'success') {
                        swal({
                            title: response.title,
                            text: response.msg,
                            icon: response.status
                        })
                        $(this).trigger("reset");
                    } else {
                        swal({
                            title: response.title,
                            text: response.msg,
                            icon: response.status
                        })
                    }

                },
                error: function(jqXHR, status, err) {
                    swal({
                        title: 'Error',
                        text: err,
                        icon: status
                    })
                }
            })
        });

    </script>
@endsection
