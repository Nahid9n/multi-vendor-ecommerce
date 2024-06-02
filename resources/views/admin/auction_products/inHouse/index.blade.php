@extends('admin.master')
@section('body')
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">InHouse Product  Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive export-table">
                            <table id="editable-file-datatable"
                                class="table editable-table table-nowrap table-bordered table-edit wp-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Auction Product Name</th>
                                        <th>Code</th>
                                        <th>Status</th>
                                        <th>Regular Price</th>
                                        <th>Selling Price</th>
                                        <th>Stock Amount</th>
                                        <th>Discount</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($auction_products as $id => $item)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->status ? 'Published' : 'Unpublished' }}</td>
                                            <td>{{ $item->regular_price }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->stock_amount }}</td>
                                            <td>{{ $item->discount }}</td>
                                            <td>
                                                <a href="{{ route('auction.product.show',$item->id) }}">show</a>
                                                <a href="{{ route('auction.product.edit',$item->id) }}">Edit</a>
                                                <form action="{{ route('auction.product.delete',$item->id) }}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit">Delete</button>
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
