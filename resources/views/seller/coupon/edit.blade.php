@extends('seller.Layout.master')
@section('title', 'Add Coupon Page')
@section('body')
    <style>
        #product-tab {
            display: none
        }

        #totalOrder-tab {
            display: none
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-lg-12 shadow">
            <div class="card mt-5">
                <div class="card-header justify-content-between border-bottom">
                    <h3 class="text-bold">Edit Coupon Form</h3>
                    <a href="{{ route('seller-coupon.index') }}" class="btn text-white px-5 btn-primary">All Coupon</a>
                </div>
                <div class="card-body ">
                    @if ($coupon->coupon_type == 'product')
                        <div class="row mb-5">
                            <h4 class="col-md-8 offset-md-2 text-center">Coupon Information Update</h4>
                            <div class="col-md-8 offset-md-2">

                                <select name="coupon_type" class="form-control">
                                    <option disabled value="product"
                                        @if ($coupon->coupon_type == 'product') @selected(true) @endif>For Products
                                    </option>
                                </select>
                            </div>
                        </div>
                        <form action="{{ route('seller-coupon.update', $coupon->id) }}" method="POST"
                            enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('put')

                            <h4>Edit Product Coupon</h4>
                            <hr class="mt-3">
                            <input type="hidden" name="coupon_type" value="product" readonly>
                            <div class="row mb-4">
                                <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $coupon->coupon_code }}" name="coupon_code"
                                        id="coupon_code" placeholder="Coupon Number" required type="text">
                                    <b></b><span class="text-danger">{{ $errors->first('coupon_code') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Product <span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 select2-show-search form-select"
                                        data-placeholder="Select Product" name="product_id" required>
                                        <option class="form-control" label="Choose one" disabled selected>Select Product
                                        </option>
                                        @forelse($products as $product)
                                            <option value="{{ $product->id }}"
                                                @if ($product->id == $coupon->product_id) @selected(true) @endif>
                                                {{ $product->name }}</option>
                                        @empty
                                            <option class="text-center text-danger"> --No Product--</option>
                                        @endforelse
                                    </select>
                                    <b><span class="text-danger">{{ $errors->first('product') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="date" class="col-md-3 form-label">Date<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input class="form-control" value="{{ $coupon->date_range }}" type="text"
                                        name="daterange" id="date" required>
                                    <b></b><span class="text-danger">{{ $errors->first('daterange') }}</span></b>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="discount" class="col-md-3 form-label">Discount<span
                                        class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input class="form-control" value="{{ $coupon->discount }}" name="discount"
                                        id="discount" placeholder="discount" required type="number">
                                    <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                                </div>
                                <div class="col-md-3">
                                    <select name="discount_status" id="" class="form-control">
                                        <option value="0" {{ $coupon->discount_status == 0 ? 'selected' : '' }}>Amount
                                        </option>
                                        <option value="1" {{ $coupon->discount_status == 1 ? 'selected' : '' }}>
                                            Percent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4 d-flex form-group">
                                <div class="col-md-3">
                                    <label class="form-label" for="type">Publication Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control select2 form-select" name="status"
                                        data-placeholder="Choose one">
                                        <option class="form-control" label="Choose one" disabled selected></option>
                                        <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="radio" class="col-md-3 form-label"></label>
                                <div class="col-md-9">
                                    <button class="btn btn-primary float-end" type="submit">Submit</button>
                                </div>
                            </div>
                </div>
                </form>
                @endif
                @if ($coupon->coupon_type == 'total_order')
                    <div class="row mb-5">
                        <h4 class="col-md-8 offset-md-2 text-center">Coupon Information Update</h4>
                        <div class="col-md-8 offset-md-2">
                            <select name="coupon_type" class="form-control">
                                <option disabled value="total_order"
                                    @if ($coupon->coupon_type == 'total_order') @selected(true) @endif>For Total Orders
                                </option>
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('seller-coupon.update', $coupon->id) }}" method="POST"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('put')
                        <h4>Edit Total Orders Coupon</h4>
                        <hr class="mt-3">
                        <input type="hidden" name="coupon_type" value="total_order" readonly>

                        <div class="row mb-4">
                            <label for="coupon_code" class="col-md-3 form-label">Coupon Code <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $coupon->coupon_code }}" name="coupon_code"
                                    id="coupon_code" placeholder="Coupon Number" required type="text">
                                <b></b><span class="text-danger">{{ $errors->first('coupon_code') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="min_shopping" class="col-md-3 form-label">Minimum Shopping<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="{{ $coupon->min_shopping }}"
                                    name="min_shopping" id="min_shopping" placeholder="Minimum Shopping" required>
                                <b></b><span class="text-danger">{{ $errors->first('min_shopping') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="discount" class="col-md-3 form-label">Discount<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input class="form-control" value="{{ $coupon->discount }}" name="discount"
                                    id="discount" placeholder="discount" required type="number">
                                <b></b><span class="text-danger">{{ $errors->first('discount') }}</span></b>
                            </div>
                            <div class="col-md-3">
                                <select name="discount_status" id="" class="form-control">
                                    <option value="0" {{ $coupon->discount_status == 0 ? 'selected' : '' }}>
                                        Amount</option>
                                    <option value="1" {{ $coupon->discount_status == 1 ? 'selected' : '' }}>
                                        Percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="min_shopping" class="col-md-3 form-label">Maximum Discount Amount<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="{{ $coupon->max_discount_amount }}"
                                    name="max_discount_amount" id="min_shopping" placeholder="Maximum Discount Amount"
                                    required>
                                <b></b><span class="text-danger">{{ $errors->first('max_discount_amount') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="date" class="col-md-3 form-label">Date<span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $coupon->date_range }}" type="text"
                                    name="daterange" id="date" required>
                                <b></b><span class="text-danger">{{ $errors->first('daterange') }}</span></b>
                            </div>
                        </div>
                        <div class="row mb-4 d-flex form-group">
                            <div class="col-md-3">
                                <label class="form-label" for="type">Publication Status</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2 form-select" name="status"
                                    data-placeholder="Choose one">
                                    <option class="form-control" label="Choose one" disabled selected></option>
                                    <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ $coupon->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="radio" class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                <button class="btn btn-primary float-end" type="submit">Submit</button>
                            </div>
                        </div>
            </div>

            </form>

            </form>
            @endif
        </div>
    </div>
    </div>
    </div>

@endsection

@push('js')
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });


        function coupon(e) {

            if (e.value == 'blank') {
                $('.coupon-item').hide();
                $('#blank-tab').show();
            }

            if (e.value == 'product') {
                $('.coupon-item').hide();
                $('#product-tab').show();
            }

            if (e.value == 'total_order') {
                $('.coupon-item').hide();
                $('#totalOrder-tab').show();
            }
        }
    </script>
@endpush
