@extends('admin.master')
@section('body')
    <div class="row mt-5">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-header border-bottom justify-content-between">
                        <h3 class="card-title text-bold">Auction Product Type Table</h3>
                        <a href="{{ route('auction.product.type.create') }}" class="btn btn-success my-1 float-end text-center">Create New Auction Product Type</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="editable-file-datatable"
                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id =0;
                                    @endphp
                                    @foreach ($product_types as $type)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $type->type_name }}</td>
                                            <td>{{ $type->description }}</td>
                                            <td>
                                                <form action="{{ route('auction.product.type.updateStatus',$type->id) }}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <select name="status" class="form-control" id="">
                                                        <option value="1" {{ $type->status ==1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0"  {{ $type->status ==0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </form>
                                            </td>

                                            <td class="d-flex">
                                                <a href="{{ route('auction.product.type.show',$type->id) }}" class="btn btn-info btn-sm me-1"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('auction.product.type.edit',$type->id) }}" class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('auction.product.type.delete',$type->id) }}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm me-1" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash"></i></button>
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
    </div>
@endsection
