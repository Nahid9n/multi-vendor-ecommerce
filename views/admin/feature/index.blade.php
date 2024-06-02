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
                    <div class="card-body text-center main-toggle-group">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class=" text-center col-4 p-2 rounded-5">
                                    <input id="status{{$key}}" class="toggle toggle-secondary my-1 on " value="1" name="status" {{$feature->status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                    <label for="status{{$key}}" class="label-primary"></label>
                                </div>
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
                    <div class="card-body text-center main-toggle-group">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class=" text-center col-4 p-2 rounded-5">
                                    <input id="status{{$key}}" class="toggle toggle-secondary my-1 on " value="1" name="status" {{$feature->status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                    <label for="status{{$key}}" class="label-primary"></label>
                                </div>
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
                    <div class="card-body text-center main-toggle-group">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class=" text-center col-4 p-2 rounded-5">
                                    <input id="status{{$key}}" class="toggle toggle-secondary my-1 on " value="1" name="status" {{$feature->status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                    <label for="status{{$key}}" class="label-primary"></label>
                                </div>
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
                    <div class="card-body text-center main-toggle-group">
                        <form action="{{route('feature.status',$feature->id)}}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class=" text-center col-4 p-2 rounded-5">
                                    <input id="status{{$key}}" class="toggle toggle-secondary my-1 on " value="1" name="status" {{$feature->status == 1 ? 'checked':''}} onclick="this.form.submit()" type="checkbox"/>
                                    <label for="status{{$key}}" class="label-primary"></label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

    </div>
    <!-- End Row -->

@endsection

