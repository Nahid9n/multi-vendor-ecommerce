@foreach($cartContent as $item)
<li>
    <div class="mini-cart-thumb">
        <a href="{{route('product.details',$item->id)}}"><img src="{{asset($item->image)}}" alt="Electric" /></a>
    </div>
    <div class="mini-cart-heading">
        <span>TK {{$item->price}} x {{$item->qty}}</span>
        <h5><a href="#">{{$item->name}}</a></h5>
    </div>
    <div class="mini-cart-remove">
        <a class="removeBtn" href="{{route('cart.delete',['rowId'=>$item->id])}}" onclick="return confirm('are you sure to remove ?')"><i class="fa text-danger fa-remove"></i></a>
    </div>
</li>
@endforeach