@extends('admin.master')
@section('title','Product Type page')
@section('body')
    <div class="row row-deck mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Edit ProductType</h3>
                    <a href="{{route('product-type.index')}}" class="btn btn-primary my-1 mx-2 text-center">Add ProductType</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('product-type.update',$product_type->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">ProductType Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="name"  value="{{$product_type->name}}" name="name" placeholder="Enter your Product Type name" type="text">
                                <b><span class="text-danger">{{ $errors->first('name') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="" class="col-md-3 form-label">Product Image </label>
                            <div class="col-md-9 test_class">
                                <div class="input-group singleFile" data-bs-toggle="modal" id="image"
                                     data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                    </div>
                                    <div class="form-control imageFile-amount" id="imageFileAmount">Choose file</div>
                                </div>
                                <input type="hidden" id="imageItemId" name="image" readonly>
                                <div class="row d-flex singleRemove" id="imageData">
                                    <div class="position-relative d-flex" id="imageContainer">
                                        <div class="imgs m-1">
                                            <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{$image->id ?? ''}}" style="float: left">&times;</span>
                                            <img width="100" height="100" class="img" src="{{asset($product_type->image)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control " name="status">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option  value="1" {{$product_type->status == 1 ?'selected':''}}>Active</option>
                                    <option value="0" {{$product_type->status == 0 ?'selected':''}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">Product Type Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productTypes as $productType)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset($productType->image)}}" class="img-fluid" width="60" height="40" alt=""></td>
                                    <td>{{$productType->name}}</td>
                                    <td>{{$productType->status == 1 ? 'active':'Inactive'}}</td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="{{route('product-type.edit',$productType->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('product-type.destroy',$productType->id)}}" method="post">
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


