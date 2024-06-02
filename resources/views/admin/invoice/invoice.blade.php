@extends('admin.master')
@section('title','Invoice Page')
@section('body')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }
        .invoice-container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .invoice-details {
            margin: 20px 0;
        }
        .invoice-details h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .invoice-table th {
            background: #f5f5f5;
        }
        .invoice-summary {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .invoice-summary table {
            width: 300px;
            border-collapse: collapse;
        }
        .invoice-summary th, .invoice-summary td {
            border: none;
            padding: 10px;
            text-align: left;
        }
        .invoice-summary th {
            background: #f5f5f5;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
    <style>
        .status_change {
            border: 1px solid #dee2e6;
            padding: 10px 6px;
            margin-bottom: 13px;
        }

        .form-group select {
            background: #fff;
            border: 1px solid #e2e9e1;
            height: 45px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 20px;
            font-size: 13px;
            color: #1a1a1a;
            width: 100%;
        }

        .modal-body{
            margin-top: 0;
        }

        .modal-body button{
            width: initial;
        }

        .modal-body button{
            border-radius: 7px;
        }

        #error_msg{
            display: none;
            font-weight: bold;
        }

        li.breadcrumb-item{
            float: left;
        }

    </style>
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('sales.order')}}">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div id="invoicePrint" class="invoice-container">
        <div class="invoice-header">
            <div>
                <h1>Invoice</h1>
                <p>Invoice #: {{$order->order_code}}</p>
                <p>Date: {{date('d M-Y')}}</p>
            </div>
            <div>
                <h2>
                    <img src="{{asset($website_setting->logo)}}" alt=""  width="200" style="height: auto">
                </h2>
                <p>{{$website_setting->address}}</p>
                <p>Email: {{$website_setting->email}}</p>
            </div>
        </div>
        <div class="invoice-details">
            <h2>Billing To:</h2>
            <p>{{$order->user->name}}</p>
            <p>{{$order->phone}}</p>
            <p>{{$order->delivery_address}}</p>
            <p>Email: {{$order->user->email}}</p>
        </div>

        <table class="invoice-table">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Shop</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>

            @php($sum = 0)
            @php($tax = 0)
            @foreach($order->orderDetails as $orderDetail)
                <tr>
                    <td class="text-start">
                        <div class="row">
                            <div class="col-2">
                                <img class="mx-2" width="50" height="50" src="{{asset($orderDetail->product->product_image)}}" alt="">
                            </div>
                            <div class="text-muted col-10">
                                <div class="text-muted">
                                    <p class="font-w600 fw-bold mb-1">{{$orderDetail->product_name}}</p>
                                </div>
                                <div class="text-muted ">
                                    @if(isset($orderDetail->product_color))
                                        <span class="fw-bold">Color : </span><span>{{$orderDetail->product_color}}</span><br>
                                    @endif
                                    @if(isset($orderDetail->product_size))
                                        <span class="fw-bold">Size : </span><span>{{$orderDetail->product_size}}</span>
                                        <br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">{{$orderDetail->user->role == 'admin' ? $orderDetail->user->name : $orderDetail->user->seller->shop_name}}</td>
                    <td class="text-end"> {{$currency->symbol ?? ''}} {{$orderDetail->product_price}}</td>
                    <td class="text-center">{{$orderDetail->product_qty}}</td>
                    <td class="text-center">{{$currency->symbol ?? ''}} {{$orderDetail->product_price * $orderDetail->product_qty }} </td>
                    <td hidden>{{$sum = $sum + ($orderDetail->product_price * $orderDetail->product_qty) }}</td>
                    <td hidden>{{$tax = $tax + ($orderDetail->tax_total) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="invoice-summary">
            <table>
                <tr>
                    <th>Subtotal:</th>
                    <td class="text-end">{{$currency->symbol ?? ''}} {{$sum}}</td>
                </tr>
                <tr>
                    <th>Shipping:</th>
                    <td class="text-end"> {{$currency->symbol ?? ''}} {{$order->total_shipping}}</td>
                </tr>
                <tr>
                    <th>Tax (5%):</th>
                    <td class="text-end">{{$currency->symbol ?? ''}} {{$tax}}</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td class="text-end">{{$currency->symbol ?? ''}} {{$sum+$order->total_shipping+$tax}}</td>
                </tr>
            </table>
        </div>

        <div class="invoice-footer">
            <p>Thank you for your orders!</p>
            <p>If you have any questions about this invoice, please contact us at {{$website_setting->email}}</p>
            <div class="text-end">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm" style="background-color: #7e47a9" onclick="javascript:printDiv('invoicePrint')"><i class="fa fa-print"></i></a>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        function printDiv(invoicePrint) {
            var divContent = document.getElementById('invoicePrint').innerHTML;

            // Create a new window or tab
            var printWindow = window.open('height=600,width=800');

            // Write the content to the new window or tab
            printWindow.document.write('<html><style>\n' +
                '        body {\n' +
                '            font-family: Arial, sans-serif;\n' +
                '            margin: 0;\n' +
                '            padding: 0;\n' +
                '            background: #f5f5f5;\n' +
                '        }\n' +
                '        .invoice-container {\n' +
                '            max-width: 950px;\n' +
                '            margin: 20px auto;\n' +
                '            background: #fff;\n' +
                '            padding: 20px;\n' +
                '            border-radius: 10px;\n' +
                '            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);\n' +
                '        }\n' +
                '        .invoice-header {\n' +
                '            display: flex;\n' +
                '            justify-content: space-between;\n' +
                '            align-items: center;\n' +
                '        }\n' +
                '        .invoice-header h1 {\n' +
                '            margin: 0;\n' +
                '            font-size: 24px;\n' +
                '        }\n' +
                '        .invoice-details {\n' +
                '            margin: 20px 0;\n' +
                '        }\n' +
                '        .invoice-details h2 {\n' +
                '            margin: 0 0 10px;\n' +
                '            font-size: 20px;\n' +
                '        }\n' +
                '        .invoice-details p {\n' +
                '            margin: 5px 0;\n' +
                '        }\n' +
                '        .invoice-table {\n' +
                '            width: 100%;\n' +
                '            border-collapse: collapse;\n' +
                '            margin: 20px 0;\n' +
                '        }\n' +
                '        .invoice-table th, .invoice-table td {\n' +
                '            border: 1px solid #ddd;\n' +
                '            padding: 10px;\n' +
                '            text-align: left;\n' +
                '        }\n' +
                '        .invoice-table th {\n' +
                '            background: #f5f5f5;\n' +
                '        }\n' +
                '        .invoice-summary {\n' +
                '            display: flex;\n' +
                '            justify-content: flex-end;\n' +
                '            margin-top: 20px;\n' +
                '        }\n' +
                '        .invoice-summary table {\n' +
                '            width: 300px;\n' +
                '            border-collapse: collapse;\n' +
                '        }\n' +
                '        .invoice-summary th, .invoice-summary td {\n' +
                '            border: none;\n' +
                '            padding: 10px;\n' +
                '            text-align: left;\n' +
                '        }\n' +
                '        .invoice-summary th {\n' +
                '            background: #f5f5f5;\n' +
                '        }\n' +
                '        .invoice-footer {\n' +
                '            text-align: center;\n' +
                '            margin-top: 20px;\n' +
                '            font-size: 14px;\n' +
                '            color: #777;\n' +
                '        }\n' +
                '    </style>\n' +
                '    <style>\n' +
                '        .status_change {\n' +
                '            border: 1px solid #dee2e6;\n' +
                '            padding: 10px 6px;\n' +
                '            margin-bottom: 13px;\n' +
                '        }\n' +
                '\n' +
                '        .form-group select {\n' +
                '            background: #fff;\n' +
                '            border: 1px solid #e2e9e1;\n' +
                '            height: 45px;\n' +
                '            -webkit-box-shadow: none;\n' +
                '            box-shadow: none;\n' +
                '            padding-left: 20px;\n' +
                '            font-size: 13px;\n' +
                '            color: #1a1a1a;\n' +
                '            width: 100%;\n' +
                '        }\n' +
                '\n' +
                '        .modal-body{\n' +
                '            margin-top: 0;\n' +
                '        }\n' +
                '\n' +
                '        .modal-body button{\n' +
                '            width: initial;\n' +
                '        }\n' +
                '\n' +
                '        .modal-body button{\n' +
                '            border-radius: 7px;\n' +
                '        }\n' +
                '\n' +
                '        #error_msg{\n' +
                '            display: none;\n' +
                '            font-weight: bold;\n' +
                '        }\n' +
                '\n' +
                '        li.breadcrumb-item{\n' +
                '            float: left;\n' +
                '        }\n' +
                '\n' +
                '    </style><head>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContent);
            printWindow.document.write('</body></html>');

            // Print the content
            printWindow.document.close();
            printWindow.onload = function() {
                printWindow.print();
            };
        }
    </script>
@endpush
