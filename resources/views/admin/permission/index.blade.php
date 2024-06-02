@extends('admin.master')

@section('body')
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">All Permissin Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="editable-file-datatable"
                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $id => $permission)
                                        <tr data-id="1">
                                            <td data-field="id">{{ ++$id }}</td>
                                            <td data-field="name">{{ ucfirst($permission->name) }}</td>
                                              <td data-field="slug">{{ $permission->slug }}</td>
                                            <td data-field="status">{{ $permission->status ? "active" : "inactive" }}</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
