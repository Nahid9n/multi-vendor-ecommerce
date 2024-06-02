@extends('seller.Layout.master')
@section('title','Profile')
@section('body')
    <div class="row mt-5" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12 col-xl-6">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                        @if(auth()->user()->image !=null)
                                            <img  width="80" height="80" src="{{ asset(auth()->user()->image) }}" alt=""
                                                class="m-0 rounded border border-3">
                                        @endif
                                        @if (auth()->user()->image == null)
                                            <img width="80" height="80" src="{{ asset('avatar/avatar.png') }}" alt=""
                                                class="m-0 rounded border border-3">
                                        @endif
                                </div>
                                <div class="ms-4">
                                    <h4> {{ auth()->user()->name }}</h4>
                                    <p class="text-muted mb-2">{{ auth()->user()->email  }}</p>

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
                                    <li><a href="#editProfile" data-bs-toggle="tab">Profile</a></li>
                                    <li><a href="#accountSettings" data-bs-toggle="tab">Account Settings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="editProfile">
                    <div class="card">
                        <div class="card-body border-0">
                            <form class="form-horizontal" action="{{ route('seller.update.profile',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row mb-4">
                                    <p class="mb-4 text-17">Personal Info</p>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label"> Name</label>
                                            <input name="name" type="text" class="form-control" id="" placeholder=" Name" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Email</label>
                                            <input disabled name="email" type="email" class="form-control" id="" placeholder="Email" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Gender</label>
                                            <select name="gender" id="" class="form-control  select2 select2-show-search form-select" data-placeholder="Nothing Selected" >
                                                <option selected disabled>Select Gender</option>
                                                <option value="1" {{ auth()->user()->gender == 1 ? 'selected' : ''}}>Male</option>
                                                <option value="2" {{ auth()->user()->gender == 2 ? 'selected' : ''}}>Female</option>
                                                <option value="3" {{ auth()->user()->gender == 3 ? 'selected' : ''}}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input class="form-control" id="phone" name="phone_number" type="text"
                                            value="{{ auth()->user()->phone_number }}" placeholder="+880" />
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="dob" class="form-label">Date of Birth</label>
                                            <input class="form-control" id="dob" name="date_of_birth" type="date"
                                                value="{{ auth()->user()->date_of_birth }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-12 col-xl-6">
                                        <label for="" class="col-md-3 form-label" >Image </label>
                                        <div class="test_class">
                                            <div class="input-group singleFile" data-bs-toggle="modal" id="dynamicid" data-bs-target="#singleImg" data-type="image" data-multiple="false">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                </div>
                                                <div class="form-control" id="dynamicidFileAmount" >Choose file</div>
                                            </div>
                                            <input type="hidden" id="dynamicidItemId" name="image">
                                            <div class="row d-flex" id="dynamicidData">
                                                <div class="position-relative d-flex" id="imageContainer">
                                                    <div class="imgs m-1">
                                                        <span class="btn btn-danger btn-sm position-absolute rmSingleimg" id="{{auth()->user()->id}}" style="float: left">&times;</span>
                                                        <img width="100" height="100" class="img" src="{{asset(auth()->user()->image)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="accountSettings" >
                    <div class="card ">
                    <div class="card-body float-right">
                        <div class="mb-4 main-content-label">Account</div>
                            <form action="{{ route('seller.change.password',auth()->user()->id) }}" method="post">
                                @csrf
                                @method('put')

                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="old_password" class="form-label">Old Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="old_password" type="password" class="form-control" id="old_password" placeholder="Password" value="{{ old('old_password') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="" class="form-label">New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="new_password" type="password" class="form-control" id="" placeholder="New Password" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="con" class="form-label">Confirm Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input name="confirm_password" type="password" class="form-control" id="" placeholder="Confirm Password" value="">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-info my-1 float-right"  type="submit">Change Password</button>

                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
