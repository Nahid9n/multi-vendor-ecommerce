@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')


<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-3 mb-lg-0">
                        <div class="card-header">
                            <h5 class="mb-0">Billing Address</h5>
                        </div>
                        <div class="card-body">
                            <div class="example">
                                <form class="form-horizontal" method="post" action="{{ route('billings-store', auth()->user()->id) }}">
                                    <div class="form-group">
                                        @csrf
                                        @method('PUT')
                                        <label for="" class="form-label">Address One</label>
                                        <input type="text" class="form-control" name="address_one" value="{{ $billings->address_one }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Address Two</label>
                                        <input type="text" class="form-control" name="address_two" value="{{ $billings->address_two }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ $billings->city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="{{ $billings->state }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">ZIP</label>
                                        <input type="text" class="form-control" name="zip" value="{{ $billings->zip }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $billings->country }}">
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Shipping Address</h5>
                        </div>
                        <div class="card-body">
                            <div class="example">
                                <form class="form-horizontal" method="post" action="{{ route('shipping-store', auth()->user()->id) }}">
                                    <div class="form-group">
                                        @csrf
                                        @method('PUT')
                                        <label for="" class="form-label">Address One</label>
                                        <input type="text" class="form-control" name="address_one" value="{{ $shippings->address_one }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Address Two</label>
                                        <input type="text" class="form-control" name="address_two" value="{{ $shippings->address_two }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ $shippings->city }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">State</label>
                                        <input type="text" class="form-control" name="state" value="{{ $shippings->state }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">ZIP</label>
                                        <input type="text" class="form-control" name="zip" value="{{ $shippings->zip }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $shippings->country }}">
                                    </div>

                                    <button type="submit" class="btn btn-sm btn-primary">save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection