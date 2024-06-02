@extends('admin.master')
@section('title')
    <?php echo $type->name?> page
@endsection,
@section('body')
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="border-bottom m-3">
                    <div class="row">
                        <div class="card-header border-bottom justify-content-between">
                            <h3 class="card-title text-bold">{{ucfirst($type->name)}} Product Type Table</h3>
                            <a href="{{route('product.create')}}" class="btn btn-primary my-1 text-center">+Add Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-bordered text-nowrap border-bottom">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Category </th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Stoke Amount</th>
                                <th class="border-bottom-0">Status </th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td><img src="{{asset($product->product_image)}}" alt="" height="40" width="60"/></td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td class="d-flex text-center justify-content-center">
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-success me-1">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-success me-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger me-1" onclick="return confirm('Are you sure to delete this');">
                                                <i class="fa fa-trash"></i>
                                            </button>
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

@endsection


