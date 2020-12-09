@extends('layouts.master')

@section('title')
    Library Management | Book History
@endsection


@section('links')
    <style>
        .btn-primary {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background-color: #fd602c;
            border: 0;
            height: 42px;
            width: auto;
            /* line-height: 1; */
            font-size: 15px;
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            -webkit-user-drag: none;
            text-shadow: 0 1px rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease-in-out;
            text-decoration: none;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            text-decoration: none;
            background-color: #d34f23;
        }

        .btn-success {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background-color: #26769b;
            border: 0;
            height: 42px;
            width: auto;
            font-size: 15px;
            padding: 10px 20px;
            cursor: pointer;
            text-align: center;
            vertical-align: top;
            display: inline-block;
            -webkit-user-drag: none;
            text-shadow: 0 1px rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease-in-out;
        }

        .btn-success:hover,
        .btn-success:focus {
            background-color: #1f6788;
        }

        .modal-content {
            border-radius: 1px;
        }

    </style>
@endsection


@section('content')
    <!-- end header inner -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Share Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="parsley-examples" method="post" action="javascript:void()" id="share-invoice"
                        token="{{ csrf_token() }}">
                        <div class="smart-forms smart-container wrap-3">
                            <div class="frm-row">
                                <div class="section" style="padding: 0 20px">
                                    <label for="names" class="field-label">Email address</label>
                                    <label class="field prepend-icon">
                                        <input type="email" name="email" required id="email" class="gui-input"
                                            placeholder="Enter email address to share invoice ">
                                        <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                    </label>
                                    <input type="hidden" name="invoice_id" value="{{ request()->id }}">
                                </div>
                            </div>
                        </div><!-- end section -->
                </div>
                <div class="modal-footer">
                    <button type="reset" class="button" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Invoice #{{ request()->id }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> Invoice #{{ request()->id }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section-->

    <section class="sec-padding" style="padding-bottom: 0">
        <div class="container">

            <div class="row">
                <div class="domain-pricing-table-holder table_responsive"
                    style="padding: 10px;background-color:transparent;">
                    <table class="table-style-2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Book Name</th>
                                <th>Book INR No</th>
                                <th>Book RFID</th>
                                <th>Assign Date</th>
                                <th>Return Date</th>
                                <th></th>
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
                                        <td><a href='/book_invoices/invoice-{{ $row->invoice_id }}.pdf'
                                                title="Download Invoice" download class="button btn-primary"><i
                                                    class="fa fa-download" aria-hidden="true"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                title="Share Invoice" class="button btn-success"><i class="fa fa-share-alt"
                                                    aria-hidden="true"></i></a>
                                        </td>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#share-invoice').submit(function(e) {
            e.preventDefault();
            var form_data = new FormData($(this)[0]);
            form_data.append('_token', $(this).attr('token'));
            console.log(form_data);
            $.ajax({
                url: "{{ route('shareInvoice') }}",
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
                        $('#exampleModal').modal('hide');
                        $('#email').val('');
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
