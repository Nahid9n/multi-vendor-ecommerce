<?php

namespace App\Http\Controllers\website;

use App\Models\BlogComment;
use App\Models\CouponCollect;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Pages;
use App\Models\ProductReview;
use App\Models\Seller;
use App\Models\SellerShopSetting;
use App\Models\Upload;
use Exception;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\ProductImage;
use App\Models\ProductStock;
use Illuminate\Http\Request;
use App\Models\SellerProduct;
use App\Models\ProductQueries;
use App\Models\ProductVariant;
use App\Models\StartConversation;
use Illuminate\Support\Facades\DB;
use App\Models\ProductQueriesReply;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Coupon;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\ProductQuestionAndAnswer;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{

    private $per_page = 12;

    public function index(){
        try {
            $categories = Category::where('status',1)->latest()->take(13)->get();
            $products = Product::where('status',1)->latest()->get();

            return view('website.home.index',[
                'products'=>$products,
                'categories'=>$categories,
                'seller_products'=>Product::where('status',1)->get(),

            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
/*    public function category(){
        try {
            $colors = Color::where('status',1)->get();
            $sizes = Size::where('status',1)->get();
            $brands = Brand::where('status',1)->get();
            return view('website.category.index',[
                'categories'=>Category::where('status',1)->latest()->paginate(18),
                'colors'    => $colors,
                'sizes'     => $sizes,
                'brands'    => $brands,
            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }*/
    public function getAllCategories(){
        $colors = Color::where('status',1)->get();
        $sizes = Size::where('status',1)->get();
        $categories = Category::where('status',1)->latest()->paginate(18);
        return view('website.allCategories',compact('categories','sizes','colors'));
    }

    public function product(){
        try {
            $products = Product::where('status',1)->latest()->get();
            return view('website.product.index',[
                'products'=>$products,
                'categories'=>Category::where('status',1)->latest()->get(),
            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }
    public function getAllProduct(){
        $products = Product::where('status', 1)->latest()->paginate(12);
        $categories = Category::where('status',1)->latest()->get();
        $colors = Color::where('status',1)->latest()->get();
        $brands = Brand::where('status',1)->latest()->get();
        $records = count($products);
        return view('website.product.allProducts', compact('products', 'records','categories','colors','brands'));
    }

    public function productByCategory($slug){
        try {
            $category = Category::where('name',$slug)->first();
            $sizes = Size::where('status',1)->latest()->get();
            $colors = color::where('status',1)->latest()->get();
            return view('website.category.product',[
                'products'=>Product::where('category_id',$category->id)->where('status',1)->latest()->paginate(12),
                'categories'=>Category::where('status',1)->latest()->get(),
                'sizes'     =>$sizes,
                'colors'    =>$colors,
                'slug'    =>$slug,
            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }

    public function productDetails($slug){
        try {
            $product = Product::where('slug',$slug)->where('status',1)->first();
            $images = json_decode($product->other_image);
            if(isset($images)){
                $otherImages = Upload::whereIn('id', $images)->get();
            }
            else{
                $otherImages = null;
            }

            if ($product->user_id != 1){
                $seller = Seller::where('user_id',$product->user_id)->first();
                $sellerShop = SellerShopSetting::where('seller_id',$seller->id)->first();
            }
            else{
                $seller = '';
                $sellerShop = '';
            }

            if (auth()->user()){
                $review = ProductReview::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first();
                $reviews = ProductReview::whereNotIn('user_id',[auth()->user()->id])->where('product_id',$product->id)->get();
                $orders = Order::where('user_id',auth()->user()->id)->where('order_status',1)->get();
                $orderIds = array();
                foreach ($orders as $order){
                    array_push($orderIds,$order->id);
                }
                $ProductReview = OrdersDetails::whereIn('order_id',$orderIds)->where('product_id',$product->id)->first();
            }
            else{
                $ProductReview = null;
                $review = null;
                $reviews = ProductReview::where('product_id',$product->id)->latest()->get();
            }
            $queries = ProductQueries::where('product_id',$product->id)->get();
            $reviewCounts =   ProductReview::where('product_id',$product->id)->where('status',1)->get();
            $review1 = array();
            $review2 = array();
            $review3 = array();
            $review4 = array();
            $review5 = array();
            $starTotal = 0;
            $reviewcount = 0;
            if (count($reviewCounts) != 0 ){
                $starTotal = 0;
                foreach ($reviewCounts as $review){
                    if ($review->rating == 1){
                        array_push($review1,$review->rating);
                    }
                    elseif ($review->rating == 2){
                        array_push($review2,$review->rating);
                    }
                    elseif ($review->rating == 3){
                        array_push($review3,$review->rating);
                    }
                    elseif ($review->rating == 4){
                        array_push($review4,$review->rating);
                    }
                    elseif ($review->rating == 5){
                        array_push($review5,$review->rating);
                    }
                    $starTotal = $starTotal + $review->rating;
                }
                $reviewcount = $starTotal / count($reviewCounts);
            }
            $related_products = Product::where('category_id',$product->category_id)->whereNotIn('id',[$product->id])->latest()->take(4)->get();
            $pages = Pages::where('status',1)->latest()->get();
            return view('website.product.product-details',[
                'categories'=>Category::where('status',1)->latest()->get(),
                'product'=>$product,
                'seller_products'=> $product,
                'ProductReview'=> $ProductReview,
                'review'=> $review,
                'reviews'=> $reviews,
                'review1'=> $review1,
                'review2'=> $review2,
                'review3'=> $review3,
                'review4'=> $review4,
                'review5'=> $review5,
                'reviewcount'=> $reviewcount,
                'reviewCounts'=> $reviewCounts,
                'queries'=> $queries,
                'seller'=> $seller,
                'sellerShop'=> $sellerShop,
                'relatedProducts'=>$related_products,
                'pages'=>$pages,
            ]);


        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }


    }
    public function rules($slug){
        try {
            $rule = Pages::where('slug',$slug)->first();
            return view('website.product.rules',compact('rule'));
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }
    public function brand(){
        try {
            return view('website.brand.index',[
                'brands'=>Brand::where('status',1)->latest()->paginate(18),
                'categories'=>Category::where('status',1)->latest()->get(),
            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }

    public function coupons(){
//        try {
        if (auth()->check()){
            $userCoupons = CouponCollect::where('user_id',auth()->user()->id)->get();
            $couponIds = array();
            foreach ($userCoupons as $coupon){
                array_push($couponIds,$coupon->coupon_id);
            }
            $coupons = Coupon::whereNotIn('id',$couponIds)->where('status',1)->latest()->paginate(12);
            return view('website.coupons', compact('coupons'));
        }
        else{
            $coupons = Coupon::where('status',1)->latest()->paginate(12);
            return view('website.coupons', compact('coupons'));
        }

//        }catch (Exception $e){
//            Toastr::error($e->getMessage());
//            return back();
//        }

    }

    public function blog(){
        try {
            $blogs = Blog::where('status',1)->latest()->paginate(16);
            $blogs_categories = BlogCategory::all();
            return view('website.blog', compact('blogs', 'blogs_categories'));
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }

    public function blogDetails($slug){
        try {
            $blogDetails = Blog::where('slug', $slug)->first();
            $blogs = Blog::where('category_id',$blogDetails->category_id)->whereNotIn('id',[$blogDetails->id])->where('status',1)->get();
            $blogs_categories = BlogCategory::all();
            $blogComments = BlogComment::where('blog_id',$blogDetails->id)->latest()->get();
            return view('website.blogDetails', compact('blogDetails', 'blogs_categories','blogs','blogComments'));
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function productByBrand($name){

        try {
            $brand = Brand::where('name',$name)->first();

            return view('website.brand.product',[
                'products'=>Product::where('brand_id',$brand->id)->where('status',1)->latest()->paginate(12),
                'categories'=>Category::where('status',1)->latest()->get(),
                'sizes'=>Size::where('status',1)->latest()->get(),
                'colors'=>Color::where('status',1)->latest()->get(),
                'name'=>$name,
            ]);
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }

    public function subscribe(Request $request){
        try{
            $validate = Validator::make($request->all(), [
                "email"              => "required|unique:subscribers,email",
            ],[
                'email.unique'=> "You are already subscribe."
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $subscribe = new Subscriber();
            $subscribe->email = $request->email;
            $subscribe->save();
            toastr()->success("Successfully Subscribe.");
            return back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }


    public function searchData(Request $request){
        try {
            $keyword = trim($request->keyword);
            if($keyword == ''){
                $products = Product::where('status', 1)->paginate($this->per_page);
            }else{
                $products = Product::where('status', 1)->where('name', 'like', '%'.$keyword.'%')->paginate($this->per_page);
            }

            $sizes = Size::all();
            $colors = Color::all();
            return view('website.home.search', compact('products', 'sizes', 'colors'));
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }


    public function searchFilter(Request $request)
    {
        try {
            $all_data = json_decode($request->jsonString);

            $query = Product::query();

            if (!empty($all_data->keyword)) {
                $query->where('name', 'like', '%' . $all_data->keyword . '%');
            }

            if (!empty($all_data->category)) {
                $query->whereIn('category_id', $all_data->category);
            }

            if (!empty($all_data->brand)) {
                $query->whereIn('brand_id', $all_data->brand);
            }

            if (!empty($all_data->maxPriceRange)) {
                $query->whereBetween('product_price', [0, $all_data->maxPriceRange]);
            }
            if (!empty($all_data->color)) {
                $query->whereJsonContains('colors', [$all_data->color]);
            }

            /*if (!empty($all_data->size) || !empty($all_data->color)) {
                $query->whereHas('variants', function ($query) use ($all_data) {
                    $query->where(function ($query) use ($all_data) {
                        if (!empty($all_data->size)) {
                            $query->where('size_id', $all_data->size);
                        }
                        if (!empty($all_data->color)) {
                            $query->Where('color_id', $all_data->color);
                        }
                    });
                });
            }*/

            $perPage = $this->per_page;
            $offset = isset($all_data->offset) ? $all_data->offset : 0;

            $products = $query->skip($offset)->take($perPage)->get();

            if ($products->isEmpty()) {
                return response()->json(0);
            }

            $skip = $offset;

            return isset($all_data->offset)
                ? view('website.home.ajaxFilterSeeMore', compact('products', 'skip'))
                : view('website.home.ajaxFilter', compact('products'));
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function searchOnKeyUp(Request $request){
        // dd($request->all());
    }

    public function variantProductPrice(Request $request){

        $size = $request->input('size');
        $color = $request->input('color');
        $product_id = $request->input('product_id');
        $query = ProductStock::query();
        if($size && $color){
            $query->where('variant', $color .'-'.$size);
        }
        if($size && !$color){
            $query->where('variant', $size);
        }

        if(!$size && $color){
            $query->where('variant', $color);
        }

        $item = $query->where('product_id', $product_id)->first();
        if($item){
            return response()->json(['price' => $item->price, 'variant' => $item->variant, 'variant_id' => $item->id,'qty'=>$item->qty,'image'=>$item->image]);
        }else{
            return response()->json(['price' => 0, 'variant' => 0,'qty'=>0]);
        }
    }


}
