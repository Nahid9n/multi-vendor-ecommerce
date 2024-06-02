@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Auction Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('auction.product.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="">Product Name<span class="text-danger">*</span></label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="product_id" class="form-control"
                                    data-placeholder="Choose one">

                                    @forelse ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Product --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">

                                <label class="">Product Types<span class="text-danger">*</span></label>
                            </div>
                            <div class="form-group col-md-9">
                                <select name="type_id" class="form-control" id="">
                                    @forelse ($product_types as $product_type)
                                        <option value="{{ $product_type->id }}">{{ $product_type->type_name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO ProductType --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Code<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('code') }}" name="code" id="code"
                                    placeholder="Product Code" type="text" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="discount" name="discount"
                                    placeholder="Enter Discount" type="number" value="{{ old('discount') }}"/>
                            </div>
                        </div>


                         <div class="row mb-4">
                            <label for="start_date" class="col-md-3 form-label">Start Date<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="start_date" name="start_date"
                                    type="date" value="{{ old('stat_date') }}"/>
                            </div>
                        </div>
                         <div class="row mb-4">
                            <label for="end_date" class="col-md-3 form-label">End Date<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="end_date" name="end_date"
                                    type="date" value="{{ old('end_date') }}"/>
                            </div>
                        </div>
                         <div class="row mb-4">
                            <label for="bit" class="col-md-3 form-label">Bit Starting Amount<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="bit" name="bit_amount"
                                    type="number" value="{{ old('bit_amount') }}" placeholder="Enter Bit Amount"/>
                            </div>
                        </div>
                          <div class="row mb-4">
                            <label for="bit" class="col-md-3 form-label">Total Bit<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" id="bit" name="total_bit"
                                    type="number" value="{{ old('total_bit') }}" placeholder="Enter Total Bit"/>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status<span class="text-danger">*</span></label>
                            <div class="col-md-9 pt-3">
                                <label for=""><input type="radio" value="1" checked name="status"><span>
                                        Published </span></label>
                                <label for=""><input type="radio" value="0" checked name="status"><span>
                                        Unpublished </span></label>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
