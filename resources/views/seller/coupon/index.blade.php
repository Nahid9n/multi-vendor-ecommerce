@extends('seller.Layout.master')
@section('title', 'All Coupon ')
@section('body')
<div class="row mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header border-bottom justify-content-between">
                <h3 class="card-title">Coupon Table</h3>
                <a href="{{route('seller-coupon.create')}}" class="btn btn-primary my-1 mx-2 text-center">+ADD</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table table-bordered text-nowrap border-bottom">
                        <thead>
                        <tr>

                            <th class="border-bottom-0">SL No</th>
                            <th class="border-bottom-0">Type</th>
                            <th class="border-bottom-0">Date</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Action</th>


                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $id=0;
                            @endphp
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ ++$id }}</td>
                                    <td>{{ $coupon->coupon_type=='product' ? "Product Base": "Card Base"}}</td>
                                    <td>{{ $coupon->date_range }}</td>
                                    <td>{{ $coupon->status ==1 ? "Active": "Inactive" }}</td>
                                    <td class="justify-content-center d-flex text-center">
                                        <a href="{{route('seller-coupon.edit',$coupon->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('seller-coupon.delete',$coupon->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

