@extends('layouts.master')

@section('title')
    Library Management | Home
@endsection


@section('links')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<style>
  .search .results {
    position: absolute;
    top: 42px;
    left: 0;
    right: 0;
    z-index: 10;
    padding: 0;
    margin: 0;
    overflow-x: hidden;
    overflow-y: auto;
    min-height: auto;
    max-height: 200px;
    border-width: 1px;
    border-style: solid;
    border-color: #e4e4e4;
    background-color: #fdfdfd;
   
    -webkit-box-shadow:  24px 20px 65px -34px rgba(0,0,0,0.68);
    -moz-box-shadow:  24px 20px 65px -34px rgba(0,0,0,0.68);
    -ms-box-shadow:  24px 20px 65px -34px rgba(0,0,0,0.68);
    -o-box-shadow:  24px 20px 65px -34px rgba(0,0,0,0.68);
    box-shadow:  24px 20px 65px -34px rgba(0,0,0,0.68);
}


.search .results li:first-child { margin-top: -1px }


.search .results li:last-child { margin-bottom: -1px }

.search .results li {
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
          <div class="text-box padding-3"  style="padding-left: 0; padding-right:0">
            <div class="smart-forms smart-container wrap-3">

              <div class="frm-row">
                <div class="section colm colm6">
                  <div class="search">
                    <label for="names" class="field-label">Student ID</label>
                    <label class="field prepend-icon">
                      <input id="user_id" type="text" name="user_id" class="gui-input" placeholder="Enter Student ID">
                      <span class="field-icon"><i class="fa fa-user"></i></span>
                      <div id="student_data"></div>
                    </label>
                  </div><!-- end section -->
              </div>
                  <div class="section colm colm6">
                    <label for="names" class="field-label">Book ID</label>
                      
                    <label class="field prepend-icon">
                      <input id="email" type="email" name="email" required class="gui-input" placeholder="Enter Book ID">
                      <span class="field-icon"><i class="fa fa-user"></i></span>
                    </label>
                  </div><!-- end section -->
              </div>

                  </div><!-- end .form-body section -->


      </div>
    </div>
  </section>
      <!--end item-->


 <section class="sec-padding" style="padding-top: 0">
    <div class="container">
      <div class="row">
        <div class="domain-pricing-table-holder">
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
                <td colspan="7">No data available</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- end section -->
  

             
@endsection
@section('scripts')

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
      $('.results').html('');
      $('#user_id').val($(this).children().text());
      $.ajax({
        url:"{{ route('getStudentBook') }}",
        method:'GET',
        data:{uniqid:uniqid},
        success:function(data){
          $('tbody').html(data);
        },
      })
    })
  })
</script>

@endsection
