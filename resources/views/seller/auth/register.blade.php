<!doctype html>
<html lang="en" dir="ltr"> <!-- This "custom-app.blade.php" master page is used only for "custom" page content present in "views/livewire" Ex: login, 404 -->

<!-- Mirrored from laravel8.spruko.com/noa/login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:11:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Noa - Laravel Bootstrap 5 Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="laravel admin template, bootstrap admin template, admin dashboard template, admin dashboard, admin template, admin, bootstrap 5, laravel admin, laravel admin dashboard template, laravel ui template, laravel admin panel, admin panel, laravel admin dashboard, laravel template, admin ui dashboard">

        <!-- TITLE -->
		<title>Registration</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

        <!-- BOOTSTRAP CSS -->
        <link id="style" href="{{asset('admin')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="{{asset('admin')}}/assets/css/style.css" rel="stylesheet" />
        <link href="{{asset('admin')}}/assets/css/skin-modes.css" rel="stylesheet" />



        <!--- FONT-ICONS CSS -->
        <link href="{{asset('admin')}}/assets/plugins/icons/icons.css" rel="stylesheet" />

        <!-- INTERNAL Switcher css -->
        <link href="{{asset('admin')}}/assets/switcher/css/switcher.css" rel="stylesheet">
        <link href="{{asset('admin')}}/assets/switcher/demo.css" rel="stylesheet">

    </head>


        <body class="ltr login-img">

			<!-- PAGE -->
			<div class="page">
				<div>
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto text-center">
						<a href="index.html" class="text-center">
							<img src="assets/images/brand/logo.png" class="header-brand-img" alt="">
						</a>
					</div>
					<div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h3 class="card-title">Create Registration Form</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('seller.registration') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf


                                            <div class="row mb-4">
                                                <label for="first_name" class="col-md-3 form-label">First Name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" value="{{ old('first_name') }}" name="first_name" id="first_name"
                                                        placeholder="First Name" type="first_name" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="last_name" class="col-md-3 form-label">Last Name</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" value="{{ old('last_name') }}" name="last_name" id="first_name"
                                                        placeholder="Last Name" type="text" />
                                                </div>
                                            </div>



                                            <div class="row mb-4">
                                                <label for="email" class="col-md-3 form-label">Email</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" value="{{ old('email') }}" name="email" id="email"
                                                        placeholder="x@gmail.com" type="email" />

                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="password" class="col-md-3 form-label">Password </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="password" name="password" placeholder="password"
                                                        type="password" value="{{ old('password') }}"  />
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label for="dob" class="col-md-3 form-label">Date of Birth </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="dob" name="dob" type="date"
                                                        value="{{ old('dob') }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="gender" class="col-md-3 form-label">Gender </label>
                                                <div class="col-md-9">
                                                    <select name="gender" id="gender" class="form-control">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="phone" class="col-md-3 form-label">Phone Number </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="phone" name="phone" type="phone"
                                                        value="{{ old('phone') }}" placeholder="+088" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="join_date" class="col-md-3 form-label">Join Date </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="join_date" name="join_date" type="date"
                                                        value="{{ old('join_date') }}" />
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="salary" class="col-md-3 form-label">Shop Name </label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="salary" name="shop_name" type="text"
                                                        value="{{ old('shop_name') }}" placeholder="Shop Name" />
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <label for="imgInp" class="col-md-3 form-label">Image</label>
                                                <div class="col-md-9">
                                                    <input type="file" name="image" class="dropify" data-height="200" />

                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="address" class="col-md-3 form-label"> Address</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                                </div>
                                            </div>


                                            <div class="row mb-4">
                                                <label class="col-md-3 form-label"> Status</label>
                                                <div class="col-md-9 pt-3">
                                                    <select name="status" id="" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary rounded-0 float-end" type="submit">Submit</button>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>

						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->


        <!-- JQUERY JS -->
        <script src="{{asset('admin')}}/assets/plugins/jquery/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('admin')}}/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="{{asset('admin')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{asset('admin')}}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

        <!-- STICKY JS -->
        <script src="{{asset('admin')}}/assets/js/sticky.js"></script>



        <!-- COLOR THEME JS -->
        <script src="{{asset('admin')}}/assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="{{asset('admin')}}/assets/js/custom.js"></script>

        <!-- SWITCHER JS -->
        <script src="{{asset('admin')}}/assets/switcher/js/switcher.js"></script>

    </body>


<!-- Mirrored from laravel8.spruko.com/noa/login by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 May 2023 13:11:49 GMT -->
</html>
