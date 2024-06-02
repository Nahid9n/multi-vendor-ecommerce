@extends('admin.master')
@section('title','Size page')
@section('body')
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Add New Size</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('sizes.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Size Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Enter your Size name" type="text" required>
                                <b><span class="text-danger">{{$errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="code" class="col-md-3 form-label">Size Code <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{old('code')}}" id="code" name="code" placeholder="Enter Size Short Code" type="text" required>
                                <b><span class="text-danger">{{$errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control " name="status" >
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option selected value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="justify-content-between border-buttom card-header">
                            <h3 class="card-title text-bold">Size Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Code</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sizes as $size)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$size->name}}</td>
                                    <td>{{$size->code}}</td>
                                    <td>{{$size->status == 1 ? 'active':'Inactive'}}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="{{route('sizes.edit',$size->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('sizes.destroy',$size->id)}}" method="post">
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





