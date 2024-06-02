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
                <li class="breadcrumb-item"><a href="javascript:void(0);">Action Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Acution Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Auction Product Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('auction.product.update',$auction_product->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="">Product Name</label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="product_id" class="form-control select2-show-search form-select"
                                    data-placeholder="Choose one">

                                    @forelse ($products as $product)
                                        <option @if ($product->id == $auction_product->product_id)checked

                                        @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO Product --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3 md-3 form-label">
                                <label class="">Product Types</label>

                            </div>
                            <div class="form-group col-md-9">
                                <select name="type_id" class="form-control" id="">
                                    @forelse ($product_types as $product_type)
                                        <option @if ($product_type->id == $auction_product->type_id)checked

                                        @endif value="{{ $product_type->id }}">{{ $product_type->type_name }}</option>
                                    @empty
                                        <option class="text-center bg-danger" value=""> -- NO ProductType --</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Auction Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $auction_product->code }}" name="code" id="code"
                                    placeholder="Product Code" type="text" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount </label>
                            <div class="col-md-9">
                                <input class="form-control" id="discount" name="discount"
                                    placeholder="Enter Discount" type="number" value="{{ $auction_product->discount }}"/>
                            </div>
                        </div>


                         <div class="row mb-4">
                            <label for="start_date" class="col-md-3 form-label">Start Date </label>
                            <div class="col-md-9">
                                <input class="form-control" id="start_date" name="start_date"
                                    type="date" value="{{ $auction_product->start_date }}"/>
                            </div>
                        </div>
                         <div class="row mb-4">
                            <label for="end_date" class="col-md-3 form-label">End Date </label>
                            <div class="col-md-9">
                                <input class="form-control" id="end_date" name="end_date"
                                    type="date" value="{{ $auction_product->end_date }}"/>
                            </div>
                        </div>
                         <div class="row mb-4">
                            <label for="bit" class="col-md-3 form-label">Bit Starting Amount </label>
                            <div class="col-md-9">
                                <input class="form-control" id="bit" name="bit_amount"
                                    type="number" value="{{ $auction_product->bit_starting_amount }}" placeholder="Enter Bit Amount"/>
                            </div>
                        </div>
                          <div class="row mb-4">
                            <label for="bit" class="col-md-3 form-label">Total Bit </label>
                            <div class="col-md-9">
                                <input class="form-control" id="bit" name="total_bit"
                                    type="number" value="{{ $auction_product->total_bids }}" placeholder="Enter Total Bit"/>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="form-group col-md-9">
                                <select name="status" class="form-control" id="">
                                    <option value="1" {{ $auction_product->status == '1' ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $auction_product->status == '0' ? 'selected' : '' }}>UnPublished</option>
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
