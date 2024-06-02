@extends('admin.master')
@section('title','manage Currency')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Currency Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Currency</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Currency Table</h3>
                    <a href="{{route('currency.create')}}" class="btn btn-success my-1 float-end text-center">Add New Currency</a>
                </div>
                <div class="card-body">
{{--                    <p class="alert alert-success text-center" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">{{session('message')}}</p>--}}
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Symbol</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Exchange rate(1 USD = ?)</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currencies as $key=>$currency)
                                <tr class="text-center">
                                    <td>{{$currency->name}}</td>
                                    <td>{{$currency->symbol ?? '$' }}</td>
                                    <td>{{$currency->code}}</td>
                                    <td>{{$currency->exchange_rate}}</td>
                                    <td>
                                        <form action="{{route('currency.status',$currency->id)}}" method="POST">
                                            @csrf
                                            <span>{{$currency->status == 1 ? 'Active':'Inactive'}}</span>
                                            <div class="material-switch ">
                                                <input class="" id="uncheckedDangerSwitch.{{$key}}" value="1" onchange="this.form.submit()" name="status" {{$currency->status == 1 ? 'checked':''}}  type="checkbox"/>
                                                <label for="uncheckedDangerSwitch.{{$key}}" class="label-danger"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
{{--                                        <a href="{{route('currency.show',$currency->id)}}" class="btn btn-primary mb-1 mx-1"><i class="fa fa-regular fa-eye"></i></a>--}}
                                        <a href="{{route('currency.edit',$currency->id)}}" class="btn btn-primary mb-1 mx-1"><i class="fa fa-regular fa-edit"></i></a>
                                        <form action="{{ route('currency.destroy', $currency->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-regular fa-trash"></i></button>
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
    <!-- End Row -->

@endsection

