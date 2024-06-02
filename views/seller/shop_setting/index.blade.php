@extends('seller.Layout.master')
@section('title', 'Shop Setting')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Shop Setting</h3>
                    <a href="{{route('seller.shop-setting.edit',$shop_setting->id)}}" class="btn btn-primary my-1 mx-2 text-center">Edit Details</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-2">
                            <div class="row justify-content-center my-2">
                                <div class="col-md-6">
                                    @if ($shop_setting->logo != '')
                                        <img src="{{asset($shop_setting->logo)}}" class="img-fluid mx-2" height="200" width="200">
                                    @else
                                        <img src="{{ url('/uploads/avatars/shop.png') }}" class="img-fluid mx-2" height="200" width="200">
                                    @endif

                                    <h3 class="text-dark fw-bold">{{$shop_setting->shop_setting->shop_name}}</h3>
                                    {{-- <h5 class="text-dark"><span class="fw-bold">Email : </span>{{$shop_setting->shop_setting->email}}</h5> --}}
                                    <h5 class="text-dark"><span class="fw-bold">Address : </span>{{$shop_setting->shop_setting->address}}</h5>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

