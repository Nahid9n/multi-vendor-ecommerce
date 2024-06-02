<table class="table table-striped mini-cart-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartContent as $item)
        <tr>
            <td class="mini-cart-thumb">
                <a href="{{ route('product.details', $item->id) }}">
                    <img src="{{ asset($item->image) }}" alt="No Image" />
                </a>
            </td>
            <td class="mini-cart-product">
                <h5><a href="{{ route('product.details', $item->id) }}">{{ ucfirst($item->name) }}</a></h5>
            </td>
            <td class="mini-cart-price">
                 {{ number_format($item->price) }}
            </td>
            <td class="mini-cart-quantity">
                {{ $item->qty }}
            </td>
            <td class="mini-cart-remove">
                <form action="{{ route('cart.delete', ['rowId' => $item->id]) }}" method="POST" onsubmit="return confirm('Are you sure to remove this item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa text-danger fa-remove"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="minicart-total fix">
    <span class="pull-left">Total:</span>
    <span class="pull-right">TK <span class="top_cart_price">{{ $prices ?? 0 }}</span></span>
</div>
<div class="mini-cart-checkout">
    <a href="{{ route('cart.index') }}" class="btn-common view-cart">VIEW CART</a>
    <a href="{{ route('cart.checkout') }}" class="btn-common checkout mt-10">CHECK OUT</a>
</div>
