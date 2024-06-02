@extends('admin.master')
@section('title', 'Create Auction Product ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Auction Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Auction Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Acution Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Auction Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('auction.product.type.update',$product_type->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Type</label>
                            <div class="col-md-9">
                                <input class="form-control" name="auction_product_type" id="code"
                                    placeholder="Auction Product Type" type="text" value="{{ $product_type->type_name }}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $product_type->description }}" name="description"
                                    placeholder="Description" type="text" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Status</label>
                            <div class="col-md-9">
                               <select name="status" class="form-control" id="">
                                <option value="1" {{ $product_type->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0"  {{ $product_type->status == 0 ? "selected" : '' }}>Inactive</option>
                               </select>
                            </div>
                        </div>

                        <button class="btn btn-primary rounded-0 float-end" type="submit">Upate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
