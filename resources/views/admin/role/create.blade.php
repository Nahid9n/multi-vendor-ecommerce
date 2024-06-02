@extends("admin.master")
@section("body")
<div class="create">
    	<div class="row ">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header py-3 d-flex justify-content-between">
                                            <h3 class="m-0 font-weight-bold text-primary">Role create</h3>
                                            <a class="btn btn-primary py-2" href="{{ route('role.index') }}"><i class="fa fa-list"></i></a>
                                        </div>
										<div class="card-body">
											<div id="wizard1">
												<div>
                                                    <form action="{{ route('role.store') }}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="form-label" for="name1">Name :</label>
                                                            <input type="text" name="name" class="form-control" id="name1" placeholder="Enter Name">
                                                        </div>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
</div>
@endsection
