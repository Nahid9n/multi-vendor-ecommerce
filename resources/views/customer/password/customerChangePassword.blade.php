@extends('customer.layout')
@section('title', 'Customer Order')
@section('content')


<div class="col-md-8">
    <div class="tab-content dashboard-content">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user-password-change' , auth()->user()->id) }}" name="enq">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="form-group col-md-12">
                                <label>Current Password</label>
                                <input class="form-control square" name="password" type="password" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label>New Password</label>
                                <input class="form-control square" name="npassword" type="password">
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