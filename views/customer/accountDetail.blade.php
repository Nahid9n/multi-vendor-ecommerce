@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')


<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5>Account Details</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('update-customer-info' , auth()->user()->id) }}" name="enq" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-12 text-center">
                                    <img style=" max-width: 300px; width: 100%; height: auto;" src="{{ asset($customer->image) }}" alt="">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Image</label>
                                <input class="form-control square" name="image" type="file">
                                <input name="old_image" value="{{ $customer->image }}" type="hidden">
                            </div>

                            <div class="form-group col-md-6">
                                <label>First Name</label>
                                <input class="form-control square" name="first_name" type="text" value="{{ $customer->firstName }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Last Name</label>
                                <input class="form-control square" name="last_name" value="{{ $customer->lastName }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Display Name</label>
                                <input class="form-control square" name="dname" type="text" value="{{ auth()->user()->name }}">
                            </div>                            

                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input class="form-control square" name="phone" type="number" value="{{ $customer->phone }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Company</label>
                                <input class="form-control square" name="company" type="text" value="{{ $customer->company }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>Address</label>
                                <input class="form-control square" name="street_address" type="text" value="{{ $customer->street_address }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Gender</label>
                                <select class="form-control square" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male" {{$customer->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$customer->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>State</label>
                                <input class="form-control square" name="state" type="text" value="{{ $customer->state }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Post</label>
                                <input class="form-control square" name="post" type="text" value="{{ $customer->post }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <input class="form-control square" name="country" type="text" value="{{ $customer->country }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>SSN</label>
                                <input class="form-control square" name="ssn" type="text" value="{{ $customer->ssn }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input class="form-control square" name="city" type="text" value="{{ $customer->city }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email Address</label>
                                <input disabled class="form-control square" name="email" type="email" value="{{ auth()->user()->email }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Date of Birth</label>
                                <input class="form-control square" name="dob" type="date" value="{{ $customer->date_of_birth }}">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-fill-out submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection