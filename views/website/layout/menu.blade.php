<section class="category_tog">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <ul>
                    <li class="dropdown-holder hassubs list-inline-item mr-0"><a href="{{ route('all-categories') }}"><i style="margin-right: 10px;" class="fa fa-bars" ></i>All Category</a>
                        <ul class="all_cat_submenu">
                            @foreach($categories as $category)
                            <li><a href="{{route('product.by.category',$category->name)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('all-product') }}">All Products</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{route('brand')}}">Brand</a></li>
                    <li><a href="{{route('coupons')}}">Coupons</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
