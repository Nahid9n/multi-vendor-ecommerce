@extends('admin.master')
@section('title','Manage Website Details Page')
@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Website Details Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Website Details</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom py-5">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <h3 class="fw-bold text-center">Website Details Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">Logo</th>
                                <th class="border-bottom-0">email</th>
                                <th class="border-bottom-0">mobile</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($websiteSettings as $websiteSetting)
                                <tr class="text-center">
                                    <td><img width="120" height="100" src="{{asset($websiteSetting->logo)}}" alt="no logo"></td>
                                    <td>{{$websiteSetting->email}}</td>
                                    <td>{{$websiteSetting->mobile}}</td>
                                    <td>{{$websiteSetting->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td class="text-center">
                                        <a href="{{route('website-settings.show',$websiteSetting->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-eye"></i></a>
                                        <a href="{{route('website-settings.edit',$websiteSetting->id)}}" class="btn btn-primary mb-1"><i class="fa fa-regular fa-edit"></i></a>
{{--                                        <form action="{{ route('website-setting.destroy', $websiteSetting->id) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" onclick="return confirm('are you sure to delete ?')" class="btn btn-danger"><i class="fa fa-regular fa-trash"></i></button>--}}
{{--                                        </form>--}}
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

