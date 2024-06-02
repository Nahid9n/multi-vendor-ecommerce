@extends('admin.master')
@section('title','manage feature')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">feature Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage feature</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">System</h3>
            <hr>
            @foreach($featuresSystem as $key=>$feature)
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center">{{ucfirst(str_replace('_', ' ', $feature->name))}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchSystem.{{$key}}" value="1" onchange="this.form.submit()" name="status" {{$feature->status == 1 ? 'checked':''}}  type="checkbox"/>
                                <label for="uncheckedDangerSwitchSystem.{{$key}}" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Business Related</h3>
            <hr>
            @foreach($featuresBusiness as $key=>$feature)
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center">{{ucfirst(str_replace('_', ' ', $feature->name))}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchBusiness.{{$key}}" value="1" onchange="this.form.submit()" name="status" {{$feature->status == 1 ? 'checked':''}}  type="checkbox"/>
                                <label for="uncheckedDangerSwitchBusiness.{{$key}}" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Payment Related</h3>
            <hr>
            @foreach($featuresPayment as $key=>$feature)
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center">{{ucfirst(str_replace('_', ' ', $feature->name))}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchPayment.{{$key}}" value="1" onchange="this.form.submit()" name="status" {{$feature->status == 1 ? 'checked':''}}  type="checkbox"/>
                                <label for="uncheckedDangerSwitchPayment.{{$key}}" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row row-sm">
            <h3 class="text-center">Social Media Login</h3>
            <hr>
            @foreach($featuresSocial as $key=>$feature)
            <div class="col-md-4">
                <div class="card border">
                    <div class="card-header border">
                        <h4 class="text-center">{{ucfirst(str_replace('_', ' ', $feature->name))}}</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="main-toggle-group">
                                <input class="toggle" id="uncheckedDangerSwitchSocial.{{$key}}" value="1" onchange="this.form.submit()" name="status" {{$feature->status == 1 ? 'checked':''}}  type="checkbox"/>
                                <label for="uncheckedDangerSwitchSocial.{{$key}}" class="label-danger"></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    <!-- End Row -->

@endsection

