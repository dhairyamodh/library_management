<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice - Library Self Checkout</title>
    {{--
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 100%;
        }

        .invoice {
            background: #fff;
            padding: 20px
        }

        .invoice-company {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
        }

        .invoice-company div {
            color: #fd602c;
        }

        .hr {
            height: 1px;
            background-color: #ddd;
            border: none;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin: 0 -20px;
            background-color: #f0f3f4;
            padding: 20px
        }

        /* .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%
        } */

        .invoice-from,
        .invoice-to {
            padding-right: 20px
        }

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #2d353c;
            color: #fff;
            font-size: 28px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 300
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: .6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px
        }

        .invoice-note {
            color: #999;
            margin-top: 80px;
            font-size: 85%
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px
        }

        .btn.btn-white,
        .btn.btn-white.disabled,
        .btn.btn-white.disabled:focus,
        .btn.btn-white.disabled:hover,
        .btn.btn-white[disabled],
        .btn.btn-white[disabled]:focus,
        .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }

        .table thead {
            background: #fd602c;
        }

        .table thead th {
            white-space: nowrap;
            color: #fff;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company  f-w-600">
                    <div>
                        Library Self Checkout
                    </div>

                </div>
                <hr class="hr">
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">


                    <div class="invoice-to">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <b>{{ $assignBook['name'] }}</b><br>
                            @if (!empty($assignBook['address']))
                                {{ $assignBook['address'] }}
                                <br>
                            @endif
                            Email: {{ $assignBook['email'] }}<br>
                            @if (!empty($assignBook['phone']))
                                Phone: {{ $assignBook['phone'] }}
                            @endif
                            ID: {{ $assignBook['id'] }}
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Invoice</small>
                        <div class="m-t-5">{{ date('M j, Y') }}</div>
                        <div class="invoice-detail">
                            #{{ $assignBook['invoice_id'] }}
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Book Name</th>
                                    <th class="text-center" width="20%">INR No </th>
                                    <th class="text-center" width="20%">RFID </th>
                                    <th class="text-center" width="15%">Assign Date </th>
                                    <th class="text-center" width="15%">Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $j=0;
                                @endphp
                                @foreach ($assignBook['books'] as $item)
                                    <tr>
                                        <td>{{ ++$j }}</td>
                                        <td>{{ $item['book_name'] }}</td>
                                        <td class="text-center">{{ $item['book_inr_no'] }}</td>
                                        <td class="text-center">{{ $item['book_rfid'] }}</td>
                                        <td class="text-center">{{ $item['assign_date'] }}</td>
                                        <td class="text-center">{{ $item['return_date'] }}</td>

                                    </tr>
                                @endforeach
                                {{-- @for ($i = 0; $i < 1; $i++)

                                @endfor --}}

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <!-- <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    <span class="text-inverse">$4,500.00</span>
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus text-muted"></i>
                                </div>
                                <div class="sub-price">
                                    <small>PAYPAL FEE (5.4%)</small>
                                    <span class="text-inverse">$108.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">$4508.00</span>
                        </div>
                    </div> -->
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->
                <!-- <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
                    * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                </div> -->
                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <!-- <p class="text-center m-b-5 f-w-600">
                        THANK YOU FOR YOUR BUSINESS
                    </p> -->
                    <p class="text-center">
                        <span class="m-r-10">Library Self Checkout</span>
                        <!-- <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span> -->
                    </p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
    </div>
</body>

</html>
