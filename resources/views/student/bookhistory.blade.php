@extends('layouts.master')

@section('title')
    Library Management | Book History
@endsection


@section('links')
@endsection


@section('content')
  <!-- end header inner -->
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Book History</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> Book History</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  
  <section class="sec-padding" style="padding-bottom: 0">
    <div class="container">
      
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
              </tr>
            </thead>
            <tbody>
              @php
                  $i=0;
              @endphp
              @if (count($books) > 0)
              @foreach ($books as $row)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->book_name }}</td>
                    <td>{{ $row->book_inr_no }}</td>
                    <td>{{ $row->book_rfid }}</td>
                    <td>{{ $row->assign_date }}</td>
                    <td>{{ $row->return_date }}</td>
                  </tr>
              @endforeach
              @else
              <tr>
                <td colspan="7">No Data Available</td>
              </tr>
              @endif
              
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

@endsection
