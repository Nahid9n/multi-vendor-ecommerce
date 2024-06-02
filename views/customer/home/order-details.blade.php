@extends('website.layout.app')
@section('title','Dashboard')
@section('body')

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

<div class="page-header breadcrumb-wrap">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('customer.dashboard') }}">Home</a></li>                    
                    <li class="breadcrumb-item"><a href="{{ route('customer.orders') }}">Order</a></li>                    
                    <li class="breadcrumb-item active" aria-current="page">Details</li>                    
                </ol>
            </nav>
        </div>
    </div>

<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h3 class="card-title">Order Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table  border text-nowrap text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration  }}</td>
                                                <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                                <td class="product_name">{{ $order->product_name }}</td>
                                                <td>{{ $order->product_color }}</td>
                                                <td>{{ $order->product_size }}</td>
                                                <td class="product_price">{{ $order->product_price }}</td>
                                                <td>{{ $order->product_qty }}</td>
                                                <td>
                                                    @php
                                                        if($order->order->order_status == 0){
                                                            echo 'Pending';
                                                        }elseif($order->order->order_status == 1){
                                                            echo 'Cancel';                                                        
                                                        }elseif($order->order->order_status == 2){
                                                            echo 'Accept';                                                        
                                                        }elseif($order->order->order_status == 3){
                                                            echo 'Delivered';
                                                        }elseif($order->order->order_status == 4){
                                                            echo 'Confirmded';
                                                        }
                                                    @endphp
                                                </td>                                                
                                                                                                
                                            </tr>
                                            @endforeach
                                            
                                            

                                            <tr>
                                                <th colspan="7">
                                                    <p><b style="font-weight: 700;">Total:</b> <span>{{ $order->order->total_price }}</span></p>
                                                </th>
                                                <th colspan="7">  
                                                    
                                                    <!--
                                                        0 = pending
                                                        1 = canceled
                                                        2 = confirmed
                                                        3 = delivered
                                                        4 = Returned
                                                    -->

                                                    @if($order->order->order_status == 3)
                                                        <button class="btn btn-sm">Returns</button>
                                                    @endif

                                                    @if($order->order->order_status == 0)
                                                    <button class="btn btn-sm" onclick="return confirm_delete('{{ $order->order->id }}')" >Cancel</button>
                                                    @endif
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection