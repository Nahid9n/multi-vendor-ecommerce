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
            max-width: 800px;
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
<div class="invoice-container">
    <div class="invoice-header">
        <div>
            <h1>Invoice</h1>
            <p>Invoice #: 12345</p>
            <p>Date: May 25, 2024</p>
        </div>
        <div>
            <h2>Company Name</h2>
            <p>123 Business Street</p>
            <p>City, State, ZIP</p>
            <p>Email: contact@company.com</p>
        </div>
    </div>

    <div class="invoice-details">
        <h2>Billing To:</h2>
        <p>Customer Name</p>
        <p>Customer Address</p>
        <p>City, State, ZIP</p>
        <p>Email: customer@example.com</p>
    </div>

    <table class="invoice-table">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Product/Service 1</td>
            <td>2</td>
            <td>$50.00</td>
            <td>$100.00</td>
        </tr>
        <tr>
            <td>Product/Service 2</td>
            <td>1</td>
            <td>$75.00</td>
            <td>$75.00</td>
        </tr>
        </tbody>
    </table>

    <div class="invoice-summary">
        <table>
            <tr>
                <th>Subtotal:</th>
                <td>$175.00</td>
            </tr>
            <tr>
                <th>Tax (10%):</th>
                <td>$17.50</td>
            </tr>
            <tr>
                <th>Total:</th>
                <td>$192.50</td>
            </tr>
        </table>
    </div>

    <div class="invoice-footer">
        <p>Thank you for your business!</p>
        <p>If you have any questions about this invoice, please contact us at contact@company.com</p>
    </div>
</div>
@endsection

