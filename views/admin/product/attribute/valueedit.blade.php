@extends('admin.master')
@section('title','Attribute')
@section('body')
    <div class="row row-deck mt-5">
        <div class="text-end my-2">
            <a class="btn btn-success" href="{{route('product_attribute.index')}}">Manage Attribute</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Attribute Value</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('product.attribute.value.update',$attributeValue->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Attribute Name <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control " name="attribute_id" required>
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    @foreach($attributes as $attribute)
                                        <option {{$attribute->name == $attributeValue->attribute->name ? 'selected':''}} value="{{$attribute->id}}">{{$attribute->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="value" class="col-md-3 form-label">Attribute Value <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="value" value="{{$attributeValue->value}}" name="value" placeholder="Enter your attribute value" type="text" required>
                                <b><span class="text-danger">{{$errors->first('value') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="color_code" class="col-md-3 form-label">Color Code </label>
                            <div class="col-md-9">
                                <input class="form-control" id="color_code" value="{{$attributeValue->color_code}}" name="color_code" placeholder="Enter your color code" type="text">
                                <b><span class="text-danger">{{$errors->first('color_code') }}</span></b>
                            </div>
                        </div>
                        <button class="btn btn-primary px-4 float-end" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <!-- /row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="justify-content-between border-buttom card-header">
                            <h3 class="card-title text-bold">Attribute Table</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered table-striped table-hover text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr class="text-center">
                                <th class="border-bottom-0">SL No</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Values</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($attributes as $attribute)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$attribute->name}}</td>
                                    <td class="text-start">
                                        @foreach($attribute->attribute_values as $value)
                                            <div class="row">
                                                    <div class="col-md-9">
                                                        <span class="mx-4 pt-3"><span class="fw-bold">value : </span>{{$value->value}}</span>
                                                        <span class="mx-4 pt-3"><span class="fw-bold">Color code :</span> {{$value->color_code ?? 'N/A'}}</span>
                                                    </div>
                                                    <div class="col-md-3 d-flex justify-content-end">
                                                        <a href="{{route('product.attribute.value.edit',$value->id)}}" class="btn btn-success btn-sm my-2 me-1"><i class="fa fa-edit"></i></a>
                                                        <form action="{{route('product.attribute.value.destroy',$value->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('are you sure to delete ? ')" class="btn btn-sm btn-danger my-2 me-1"><i class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td class="text-center d-flex justify-content-center">
                                        <a href="{{route('product_attribute.edit',$attribute->id)}}" class="btn btn-success my-2 me-1"><i class="fa fa-edit"></i></a>
                                        <form action="{{route('product_attribute.destroy',$attribute->id)}}" method="post">
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
@push('js')
    <script>
        $(document).ready(function(){
            $("#my_color_code").click(function(){
                $(this).addClass('active');
                $("#my_code1").attr("type","color");
                $("#my_code").removeClass('active');
            });
            $("#my_code").click(function(){
                $(this).addClass('active');
                $("#my_code1").attr("type","text");
                $("#my_color_code").removeClass('active');
            });
        });

    </script>
@endpush


