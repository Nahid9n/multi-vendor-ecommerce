@extends('admin.master')
@section('body')
    <div class="row mt-5">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">                    

                    <div class="card-header border-bottom justify-content-between">
                        <h3 class="card-title text-bold">Auction Product Table</h3>
                        <a href="{{ route('auction.product.create') }}" class="btn btn-success my-1 float-end text-center">Create New Auction Product</a>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="editable-file-datatable"
                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Type</th>
                                        <th>Status</th>
                                        <th>Start date</th>
                                        <th>End Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $id=0;
                                    @endphp
                                    @foreach ($auction_products as $item)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $item->product->name ?? "N/A" }}</td>
                                            <td>{{ $item->type->type_name ?? "N/A" }}</td>
                                            <td>{{ $item->status ==1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>{{ $item->start_date }}</td>
                                            <td>{{ $item->end_date }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('auction.product.show',$item->id) }}" class="btn btn-info btn-sm me-1"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('auction.product.edit',$item->id) }}" class="btn btn-warning btn-sm me-1"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('auction.product.delete',$item->id) }}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger me-1" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash"></i></button>
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
