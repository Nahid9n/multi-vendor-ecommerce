@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <div class="row mt-5">
        <div class="col">
            <div class="card">

                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title text-bold">Create Auction-Product Form</h3>
                    <a href="{{route('auction.product.type.create')}}" class="btn btn-success my-1 float-end text-center">Create New Auction-Product</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('auction.product.type.store') }}" method="post">
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Type<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('auction_product_type') }}" name="auction_product_type" id="code"
                                    placeholder="Type Name" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Description<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ old('description') }}" name="description"
                                    placeholder="Description" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Status<span class="text-danger">*</span></label>
                            <div class="col-md-9">
                               <select name="status" class="form-control" id="">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                               </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection
