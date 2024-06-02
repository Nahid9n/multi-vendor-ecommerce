@extends('admin.master')
<style>
    .card-header a i,
    .card-header a span {
        font-size: 18px;
    }
</style>

@section('body')
    <div class="role">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h3 class="m-0 font-weight-bold text-primary">Role Table</h3>
                        <a class="btn btn-primary" href="{{ route('role.create') }}"><span>+</span> <i
                                class="fa fa-user"></i></a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table  border text-nowrap text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $roleId => $role)
                                        <tr>
                                            <td> {{ ++$roleId }} </td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-success">{{ $role->status ? 'active' : 'inactive' }}</td>
                                            <td>
                                                <form action="">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('assign.role', $role->id) }}"><i
                                                            class="fa fa-plus"></i></a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
