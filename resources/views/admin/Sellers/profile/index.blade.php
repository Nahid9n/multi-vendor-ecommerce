@extends('admin.master')
@section('body')

	<!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Profile</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="{{ url('uploads/sellers/',auth('seller')->user()->image) }}" alt="img" class="m-0 p-1 rounded hrem-6">
                                </div>
                                <div class="ms-4">
                                    <h4>{{ auth('seller')->user()->full_name }}</h4>
                                    <p class="text-muted mb-2">{{ auth('seller')->user()->email }}</p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="border-top">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#profileMain" class="active show" data-bs-toggle="tab">Profile</a></li>
                                    <li><a href="#editProfile" data-bs-toggle="tab">Edit Profile</a></li>
                                    <li><a href="#accountSettings" data-bs-toggle="tab">Account Settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="profileMain">
                    <div class="card">
                        <div class="card-body p-0">
                                <div>
                            </div>
                            <div class="border-top"></div>
                            <div class="table-responsive p-5">
                                <h3 class="card-title">Personal Info</h3>
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Full Name :</strong>{{ auth('seller')->user()->full_name }}</td>
                                        </tr>

                                        <tr>
                                            <td><strong>Join Date :</strong>{{ auth('seller')->user()->join_date }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender :</strong>{{ auth('seller')->user()->gender }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth :</strong>{{ auth('seller')->user()->DOB }} </td>
                                        </tr>

                                        <tr>
                                            <td><strong>Address :</strong>{{ auth('seller')->user()->address }} </td>
                                        </tr>


                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                        <tr>
                                            <td><strong>Email :</strong>{{ auth('seller')->user()->email }} </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong>{{ auth('seller')->user()->phone }} </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top"></div>
                                <div class="profile-cover__info ms-4 ms-auto p-0">
                            </div>
                            <div class="border-top"></div>
                            <div class="border-top"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="editProfile">
                    <div class="card">
                        <div class="card-body border-0">
                            <form class="form-horizontal" action="{{ route('seller.update.profile',auth('seller')->user()->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row mb-4">
                                    <p class="mb-4 text-17">Personal Info</p>

                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input name="first_name" type="text" class="form-control" id="firstname" placeholder="First Name" value="{{ $seller->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="lastname" class="form-label">last Name</label>
                                            <input name="last_name" type="text" class="form-control" id="lastname" placeholder="Last Name" value="{{ $seller->last_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ $seller->email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Gender</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male" {{ $seller->gender === 'Male' ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{ $seller->gender === 'Female' ? 'selected' : ''}}>Female</option>
                                                <option value="Other" {{ $seller->gender === 'Other' ? 'selected' : ''}}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input class="form-control" id="phone" name="phone" type="phone"
                                            value="{{ $seller->phone }}" placeholder="+088" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="shop_name" class="form-label">Shop Name</label>
                                            <input class="form-control" id="salary" name="shop_name" type="text"
                                            value="{{$seller->shop_name }}" placeholder="Shop Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input class="form-control" id="dob" name="dob" type="date"
                                                value="{{ $seller->DOB }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" placeholder="Address">{{ $seller->address}}</textarea>
                                        </div>
                                    </div>

                                </div>
                             <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="accountSettings">
                    <div class="card ">
                        <div class="card-body float-right">
                                <div class="mb-4 main-content-label">Account</div>
                               <form action="{{ route('seller.change.password',auth('seller')->user()->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="old_password" type="password" class="form-control" id="old_password" placeholder="password" value="{{ old('old_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="mew_password" class="form-label">New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="mew_password" type="password" class="form-control" id="mew_password" placeholder="password" value="{{ old('mew_password') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="con" class="form-label">Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="mew_password" type="password" class="form-control" id="mew_password" placeholder="password" value="{{ old('mew_password') }}">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-info my-1 float-right" href="#">Change Password</button>
                                <button class="btn btn-outline-danger my-1 float-right" href="#">Deactivate Account</button>
                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- ROW-1 CLOSED -->

@endsection
