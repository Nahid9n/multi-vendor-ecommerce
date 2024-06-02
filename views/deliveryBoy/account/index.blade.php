@extends('deliveryBoy.layout.app')
@section('title','Manage Account')
@section('body')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('delivery-boy.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">DeliveryBoy</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{asset($deliveryBoy->deliveryBoy->image ?? '')}}" alt="Profile" class="rounded-circle">
                        <h2>{{auth()->user()->name}}</h2>
                        <h3>{{str_replace('_',' ',ucfirst($deliveryBoy->role))}}</h3>
                        <div class="social-links mt-2">
                            <a target="_blank" href="{{$deliveryBoy->deliveryBoy->twitter ?? ''}}" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a target="_blank" href="{{$deliveryBoy->deliveryBoy->facebook ?? ''}}" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a target="_blank" href="{{$deliveryBoy->deliveryBoy->website ?? ''}}" class="instagram"><i class="bi bi-wordpress"></i></a>
                            <a target="_blank" href="{{$deliveryBoy->deliveryBoy->linkedIn ?? ''}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                        </ul>
                        <div class="pt-2">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-8 col-md-8">{{auth()->user()->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Present Address</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->present_address}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Job</div>
                                    <div class="col-lg-8 col-md-8">{{str_replace('_',' ',ucfirst($deliveryBoy->role))}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Phone</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->mobile}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Email</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->email}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">Blood</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->blood}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">gender</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->gender}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">experience</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->experience}} year</div>
                                </div>
                                <h5 class="card-title">Social Details</h5>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">facebook</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->facebook}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">twitter </div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->twitter }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">linkedIn </div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->linkedIn }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 label">website</div>
                                    <div class="col-lg-8 col-md-8">{{$deliveryBoy->deliveryBoy->website}}</div>
                                </div>
                                <h5 class="card-title">Payment Details</h5>
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 label">payment method</div>
                                    <div class="col-lg-7 col-md-8">{{$deliveryBoy->deliveryBoy->payment_method}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label">account holder name </div>
                                    <div class="col-lg-7 col-md-8">{{$deliveryBoy->deliveryBoy->account_holder_name }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label">account number </div>
                                    <div class="col-lg-7 col-md-8">{{$deliveryBoy->deliveryBoy->account_number }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-md-4 label">branch</div>
                                    <div class="col-lg-7 col-md-8">{{$deliveryBoy->deliveryBoy->branch}}</div>
                                </div>
                                <h5 class="card-title">About</h5>
                                <p class="small fst-italic" style="text-align: justify">{{$deliveryBoy->deliveryBoy->biography}}</p>

                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                <form method="post" action="{{ route('delivery-boy.account.update' ,$deliveryBoy->deliveryBoy->id) }}" name="enq" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="form-group col-md-12 my-2">
                                            <label class="my-2">Display Name</label>
                                            <input class="form-control square" name="name" type="text" value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label class="my-2">Image</label>
                                            <input class="form-control square" name="image" type="file">
                                            <img width="100" class="" height="100" src="{{asset($deliveryBoy->deliveryBoy->image)}}" alt="">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Phone</label>
                                            <input class="form-control square" name="mobile" type="number" value="{{ $deliveryBoy->deliveryBoy->mobile }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Designation</label>
                                            <input class="form-control square" name="designation" type="text" value="{{ $deliveryBoy->deliveryBoy->designation }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Blood</label>
                                            <input class="form-control square" name="blood" type="text" value="{{ $deliveryBoy->deliveryBoy->blood }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Date of Birth</label>
                                            <input class="form-control square" name="date" type="date" value="{{ $deliveryBoy->deliveryBoy->date }}">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label class="my-2">Present Address</label>
                                            <input class="form-control square" name="present_address" type="text" value="{{ $deliveryBoy->deliveryBoy->present_address }}">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label class="my-2">Permanent Address</label>
                                            <input class="form-control square" name="permanentAddress" type="text" value="{{ $deliveryBoy->deliveryBoy->permanentAddress }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Gender</label>
                                            <select class="form-select square" name="gender">
                                                <option value="">Select</option>
                                                <option value="Male" {{$deliveryBoy->deliveryBoy->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{$deliveryBoy->deliveryBoy->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Short Description</label>
                                            <textarea class="form-control square" name="short_description" id="" cols="30" rows="5">{{ $deliveryBoy->deliveryBoy->short_description }}</textarea>
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label class="my-2">Biography</label>
                                            <textarea class="form-control" name="biography" id="" cols="30" rows="5">{{ $deliveryBoy->deliveryBoy->biography }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Experience</label>
                                            <input class="form-control square" name="experience" type="text" value="{{ $deliveryBoy->deliveryBoy->experience }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Facebook </label>
                                            <input class="form-control square" name="facebook" type="text" value="{{ $deliveryBoy->deliveryBoy->facebook  }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Twitter</label>
                                            <input class="form-control square" name="twitter" type="text" value="{{ $deliveryBoy->deliveryBoy->twitter }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">LinkedIn</label>
                                            <input class="form-control square" name="linkedIn" type="text" value="{{ $deliveryBoy->deliveryBoy->linkedIn }}">
                                        </div>
                                        <div class="form-group col-md-6 my-2">
                                            <label class="my-2">Website</label>
                                            <input class="form-control square" name="website" type="text" value="{{ $deliveryBoy->deliveryBoy->website }}">
                                        </div>
                                        <div class="col-md-12 my-5">
                                            <button type="submit" class="btn btn-success px-5 submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
