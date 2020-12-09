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
            line-height: 1;
            font-size: 15px;
            padding: 0 20px;
            cursor: pointer;
            margin-right: 10px;
            text-align: center;
            vertical-align: top;
            display: inline-block;
            -webkit-user-drag: none;
            text-shadow: 0 1px rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #d34f23;
        }

        .btn-success {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            background-color: #349b26;
            border: 0;
            height: 42px;
            width: auto;
            line-height: 1;
            font-size: 15px;
            padding: 0 20px;
            cursor: pointer;
            margin-right: 10px;
            text-align: center;
            vertical-align: top;
            display: inline-block;
            -webkit-user-drag: none;
            text-shadow: 0 1px rgba(255, 255, 255, 0.2);
            transition: all 0.5s ease-in-out;
        }

        .btn-success:hover {
            background-color: #29791e;
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
                <div class="domain-pricing-table-holder table_responsive"
                    style="padding: 10px;background-color:transparent;">
                    <table class="table-style-2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Invoice ID</th>
                                <th>Created At</th>
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
                                        <td>{{ $row->invoice_id }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td><button type="button"
                                                onclick="window.location='/view-invoice/{{ $row->invoice_id }}';"
                                                class="button btn-primary">View More</button>
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

@endsection
