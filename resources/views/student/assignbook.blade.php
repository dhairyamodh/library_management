@extends('layouts.master')

@section('title')
    Library Management | Assign Book
@endsection


@section('links')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> --}}
<style>
  .search .results {
    position: absolute;
    top: 42px;
    left: 0;
    right: 0;
    z-index: 10;
    padding: 0;
    margin: 0;
    overflow: auto;
    min-height: auto;
    max-height: 200px;
    border-width: 1px;
    border-style: solid;
    border-color: #e4e4e4;
    background-color: #fdfdfd;
    flex-grow: 1;
}


.search .results li {
  width: 100%;
    display: block;
    position: relative;
    margin: 0 -1px;
    padding: 10px 40px 10px 10px;
    color: #000;
    font-weight: 500;
    border: 1px solid transparent;
    cursor: pointer;
}



.search .results li { border-bottom: 1px solid #eee; }
.search .results li:last-child { border-bottom: none; }

.search .results li span{
  font-weight: 300;
  color: #454545
}
.search .results li:hover span{
  color: #fff
}
.search .results li:hover{
  color: #454545
}
.search .results li i{
  font-weight: 300
}



.search .results li:hover {
    color: #fff;
    background-color: #fd602c;
}

#ui-datepicker-div {
	display: none;
	background-color: #fff;
	box-shadow: 0 0.125rem 0.5rem rgba(0,0,0,0.1);
	margin-top: 0.25rem;
	border-radius: 0.5rem;
	padding: 0.5rem;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active{
  width: 2.7em;
  height: 2.7em;
  border-color:#e4e4e4;
  background: none;
}
.ui-datepicker-calendar thead th {
	padding: 0.25rem 0;
	text-align: center;
	font-size: 1.2rem;
	font-weight: 400;
	color: #78909C;
}
.ui-datepicker-calendar tbody td {
	width: 2.5rem;
	text-align: center;
	padding: 0;
}
.ui-datepicker-calendar tbody td a {
	display: block;
	border-radius: 0.25rem;
	line-height: 2rem;
	transition: 0.3s all;
	color: #546E7A;
	font-size: 1.3rem;
	text-decoration: none;
}
.ui-datepicker-calendar tbody td a:hover {	
  background-color: #fd602c;
  color: #fff;
}
.ui-datepicker-calendar tbody td a.ui-state-active {
	background-color: #fd602c;
	color: white;
}
.ui-datepicker-calendar tbody td a.ui-state-highlight{
  background-color: #e4e4e4;
}
.ui-datepicker-header a.ui-corner-all {
	cursor: pointer;
	position: absolute;
	top: 0;
	width: 2rem;
	height: 2rem;
	margin: 0.5rem;
	border-radius: 0.25rem;
	transition: 0.3s all;
}
.ui-datepicker-header a.ui-corner-all:hover {
	background-color: #ECEFF1;
}
.ui-datepicker-header a.ui-datepicker-prev {	
	left: 0;	
	background: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==");
	background-repeat: no-repeat;
	background-size: 0.5rem;
	background-position: 50%;
	transform: rotate(180deg);
}
.ui-datepicker-header a.ui-datepicker-next {
	right: 0;
	background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMyIgdmlld0JveD0iMCAwIDEzIDEzIj48cGF0aCBmaWxsPSIjNDI0NzcwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik03LjI4OCA2LjI5NkwzLjIwMiAyLjIxYS43MS43MSAwIDAgMSAuMDA3LS45OTljLjI4LS4yOC43MjUtLjI4Ljk5OS0uMDA3TDguODAzIDUuOGEuNjk1LjY5NSAwIDAgMSAuMjAyLjQ5Ni42OTUuNjk1IDAgMCAxLS4yMDIuNDk3bC00LjU5NSA0LjU5NWEuNzA0LjcwNCAwIDAgMS0xLS4wMDcuNzEuNzEgMCAwIDEtLjAwNi0uOTk5bDQuMDg2LTQuMDg2eiIvPjwvc3ZnPg==');
	background-repeat: no-repeat;
	background-size: 10px;
	background-position: 50%;
}
.ui-datepicker-header a>span {
	display: none;
}
.ui-datepicker-title {
	text-align: center;
	line-height: 2rem;
	margin-bottom: 0.25rem;
	font-size: 1.5rem;
	font-weight: 600;
	padding-bottom: 0.25rem;
}
.ui-datepicker-week-col {
	color: #78909C;
	font-weight: 400;
	font-size: 0.75rem;
}


</style>
@endsection


@section('content')
  <!-- end header inner -->
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Assign Books</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> Assign Books</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  
  <section class="sec-padding" style="padding-bottom: 0">
    <div class="container">
      <form class="parsley-examples" method="post" action="javascript:void()" id="addBooks_form" token="{{ csrf_token() }}">
          <div class="text-box padding-3"  style="padding-left: 0; padding-right:0">
            <div class="smart-forms smart-container wrap-3">
              <div class="frm-row">
                <div class="section colm colm6">
                  <div class="search">
                    <label for="names" class="field-label">Student ID</label>
                    <label class="field prepend-icon">
                      <input id="user_id" type="text" name="user_id" class="gui-input" required placeholder="Enter Student ID">
                      <span class="field-icon"><i class="fa fa-user"></i></span>
                      <div id="student_data"></div>
                    </label>
                  </div><!-- end section -->
                  
              </div>
              <div class="section colm colm4">
                <label for="names" class="field-label">&nbsp;</label>
                <button type="button" class="button btn-primary assignbook">Assign Books</button>
              </div>
              </div>
              <div class="frm-row" id="assignbook" style="display: none">
                <h5 class="text-orange-2" style="padding-left: 10px;">Assign Books to Student</h5>
                <hr>
                <div class="section colm colm4">
                  <div class="search">
                  <label for="names" class="field-label">Book ID</label>
                    
                  <label class="field prepend-icon">
                    <input id="book_id" type="text" name="book_id" required class="gui-input" placeholder="Enter Book ID">
                    <span class="field-icon"><i class="fa fa-book"></i></span>
                    <div id="book_data"></div>
                  </label>
                  </div>
                </div><!-- end section -->
                <div class="section colm colm4">
                  <label for="names" class="field-label">Return Date</label>
                  <label class="field prepend-icon">
                    <input class="gui-input date" name="return_date" required id="datepicker" type="text" readonly placeholder="Choose Return Date">
                    <span class="field-icon"><i class="fa fa-calendar"></i></span>
                  </label>
                    
                  
                </div><!-- end section -->
                <div class="section colm colm4">
                  <label for="names" class="field-label">&nbsp;</label>
                  <button type="submit" class="button btn-primary addbook">Add Books</button>
                </div>
              </div>
            </form>

                  </div><!-- end .form-body section -->

      </div>
      <div class="row">
        <div class="domain-pricing-table-holder" style="padding: 10px;background-color:transparent;">
          <table class="table-style-2">
            <thead>
              <tr>
                <th>No.</th>
                <th>Book Name</th>
                <th>Book INR No</th>
                <th>Book RFID</th>
                <th>Book Assign Date</th>
                <th>Book Return Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td colspan="7">No Data Available</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
      <!--end item-->

  <!-- end section -->
  

             
@endsection
@section('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(document).ready(()=>{
    $('#user_id').keyup(function(){
      var val = $(this).val();
      $.ajax({
        url:"{{ route('getStudentData') }}",
        method:'GET',
        data:{user_id:val},
        success:function(data){
            $('#student_data').html(data);
        },
      })
      
    });

    $('body').on('click','.unique_id',function(){
      var uniqid = $(this).attr('id');
      $('#student_data').html('');
      $('#user_id').val($(this).children().text());
      getBookData(uniqid);
    })

    function getBookData(uniqid){
      $.ajax({
        url:"{{ route('getStudentBook') }}",
        method:'GET',
        data:{uniqid:uniqid},
        success:function(data){
          $('tbody').html(data);
        },
      })
    }

    $('.assignbook').click(function(){
      $('#assignbook').css('display','block');
    });
    $( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast",
    minDate: 0
	});
    $('#book_id').keyup(function(){
      var val = $(this).val();
      $.ajax({
        url:"{{ route('getBookData') }}",
        method:'GET',
        data:{book_id:val},
        success:function(data){
            $('#book_data').html(data);
        },
      })
      
    });

    $('body').on('click','.book_id',function(){
      var uniqid = $(this).attr('id');
      $('#book_data').html('');
      $('#book_id').val($(this).children().text());
    });

    $('#addBooks_form').submit(function(e){
      e.preventDefault();
                var form_data = new FormData($(this)[0]);
                form_data.append('_token', $(this).attr('token'));
                console.log(form_data);
                $.ajax({
                        url: "{{ route('addBooks') }}",
                        method: "POST",
                        dataType:"json",
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
                                }).then(() => {
                                  var uniqid = $('#user_id').val();
                                  getBookData(uniqid);
                                  $('#book_id').val('');
                                  $('input[name="return_date"]').val('');
                            })
                            
                                
                            } else{
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
    $('body').on('click','.delete_book',function(){
      var book_id = $(this).attr('book_id');
      $.ajax({
        url:"{{ route('deleteBook') }}",
        method:'GET',
        data:{book_id:book_id},
        success:function(data){
          var uniqid = $('#user_id').val();
          getBookData(uniqid);
        },
      })
    });
    
  })

</script>

@endsection
