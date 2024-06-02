@extends('admin.master')
@section('title','Profile Verify ')
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Seller Verify Profile</h3>
                    <a href="{{route('seller.index')}}" class="btn btn-primary text-bold text-center">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-info">
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th> Name </th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td>{{$user->email}}</td>
                            </tr>
                            <tr>
                                <th> Shop Name </th>
                                <td>{{$seller->shop_name}}</td>
                            </tr>
                            <tr>
                                <th> Address </th>
                                <td>{{$seller->address}}</td>
                            </tr>
                            @php
                                function displayValue($value) {
                                        if (is_array($value)) {
                                            if (empty($value)) {
                                                return '';
                                            } else {
                                                $result = '';
                                                foreach ($value as $item) {
                                                    $result .= displayValue($item);
                                                }
                                                $result .= '';
                                                return $result;
                                            }
                                        }
                                        return ucfirst($value);
                                    }
                                    @endphp
                            @foreach ($verify_profile as $key=>$value)
                            <tr>
                                <th> {{ str_replace("_"," ",ucfirst($key)) }}</th>
                                <td>
                                    <img src="{{asset('/')}}uploads/profile_verify/{{displayValue($value)}}" alt="" class="img-fluid">
                                    <p>{{displayValue($value)}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

