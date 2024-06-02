@extends('admin.master')
@section('title', 'Edit Seller ')
@section('body')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Seller Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Seller</a></li>
                <li class="breadcrumb-item active" aria-current="page">update Seller</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Create Seller Form</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('seller.update',$seller->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <div class="row mb-4">
                            <label for="first_name" class="col-md-3 form-label">First Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $seller->first_name }}" name="first_name" id="first_name"
                                    placeholder="First Name" type="first_name" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="last_name" class="col-md-3 form-label">Last Name</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $seller->last_name }}" name="last_name" id="first_name"
                                    placeholder="Last Name" type="text" />
                            </div>
                        </div>



                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" value="{{ $seller->email }}" name="email" id="email"
                                    placeholder="x@gmail.com" type="email" />

                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">Password </label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" name="password" placeholder="password"
                                    type="password" value="123456"  />
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="dob" class="col-md-3 form-label">Date of Birth </label>
                            <div class="col-md-9">
                                <input class="form-control" id="dob" name="dob" type="date"
                                    value="{{ $seller->DOB }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="gender" class="col-md-3 form-label">Gender </label>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male" {{ $seller->gender === 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{ $seller->gender === 'Female' ? 'selected' : ''}}>Female</option>
                                    <option value="Other" {{ $seller->gender === 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="phone" class="col-md-3 form-label">Phone Number </label>
                            <div class="col-md-9">
                                <input class="form-control" id="phone" name="phone" type="phone"
                                    value="{{ $seller->phone }}" placeholder="+088" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="join_date" class="col-md-3 form-label">Join Date </label>
                            <div class="col-md-9">
                                <input class="form-control" id="join_date" name="join_date" type="date"
                                    value="{{ $seller->join_date }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="shop_name" class="col-md-3 form-label">Shop Name </label>
                            <div class="col-md-9">
                                <input class="form-control" id="shop_name" name="shop_name" type="text"
                                    value="{{ $seller->shop_name }}" placeholder="ShopName" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="dropify" data-height="200"/>
                                <img src="{{ url('uploads/sellers/',$seller->image) }}" alt="No Image">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label"> Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="address" id="address" placeholder="Address">{{ $seller->address }}</textarea>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label class="col-md-3 form-label"> Status</label>
                            <div class="col-md-9 pt-3">
                                <select name="status" id="" class="form-control">
                                    <option value="1" {{ $seller->status == '1' ? 'selected' : ' ' }}>Active</option>
                                    <option value="0" {{ $seller->status == '0' ? 'selected' : ' ' }}>Inactive</option>
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
