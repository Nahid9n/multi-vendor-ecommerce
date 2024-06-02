@extends('deliveryBoy.layout.app')
@section('title','Password Change')
@section('body')
    <div class="pagetitle">
        <h1>Password Change</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">DeliveryBoy</li>
                <li class="breadcrumb-item active">Password Change</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('delivery-boy.account.update.password',$deliveryBoy->deliveryBoy->user_id) }}" name="enq">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-md-12 my-2">
                                    <label class="my-2">Current Password <span class="text-danger">*</span></label>
                                    <input class="form-control square" name="old_password" type="password" autocomplete="off" placeholder="current password" required>
                                </div>
                                <div class="form-group col-md-12 my-2">
                                    <label class="my-2">New Password <span class="text-danger">*</span></label>
                                    <input class="form-control square" name="new_password" type="password" placeholder="new password" required>
                                </div>
                                <div class="form-group col-md-12 my-2">
                                    <label class="my-2">Confirm New Password <span class="text-danger">*</span></label>
                                    <input class="form-control square" name="confirm_password" type="password" placeholder="confirm new password" required>
                                </div>
                                <div class="col-md-12 my-3">
                                    <button type="submit" onclick="return confirm('are you sure to change password ?')" class="btn btn-success px-5 submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
