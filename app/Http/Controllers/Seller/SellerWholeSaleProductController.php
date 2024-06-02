<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductType;
use App\Models\SellerColor;
use App\Models\SellerImage;
use App\Models\SellerSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\WholeSaleOrder;
use App\Models\WholeSaleProduct;
use App\Models\WholeSaleProductType;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellerWholeSaleProductController extends Controller
{
    public function sellerWholesaleProductOrder()
    {
        $orders= Order::orderBy('id','desc')->where('role','seller')
        ->where('product_type','wholesale_product')->paginate(10);
        return view('seller.whole_sale_product.order.order_index',compact('orders'));

    }
    public function sellerWholesaleProductOrderConfirm(Request $request,$id)
    {
        $update = Order::find($id);
        if($update->payment_status == 0){

            $update->update([
                'payment_status'    =>1
            ]);
            Toastr::success('Successfully Approved');
            return redirect()->back();

        }elseif($update->payment_status == 1){
            $update->update([
                'payment_status'    =>0
            ]);
             Toastr::success('Successfully Cancel');
            return redirect()->back();
        }
    }
    public function sellerWholesaleProductView($id)
    {
        $order= Order::find($id);
        return view('seller.whole_sale_product.order.view_order',compact('order'));
    }
    public function sellerWholesaleProductOrderDetail($order_id)
    {
        $order= OrdersDetails::find($order_id);
        return view('seller.whole_sale_product.order.order_details',compact('order'));
    }
    public function index()
    {
        $products = Product::with([
            "category","subCategory","brand","unit","type",
            ])->orderBy('id','desc')->get();
        return view("seller.whole_sale_product.index",compact("products"));
    }
    public function create()
    {
        $categories     = Category::where('type','physical')->get();
        $subCategories  = SubCategory::all();
        $brands         = Brand::all();
        $units          = Unit::all();
        $sizes          = Size::all();
        $colors         = Color::all();
        $productTypes   = ProductType::all();
        return view("seller.whole_sale_product.create",compact(
            "categories","subCategories","brands","units","sizes","productTypes","colors"
        ));
    }
    public function store(Request $request)
    {
            $validate = Validator::make($request->all(), [
                'name'              => 'required|string:255|unique:seller_products,name,except,id',
                'category_id'       => 'required|exists:categories,id',
                'sub_category_id'   => 'required|exists:sub_categories,id',
                'brand_id'          => 'required|exists:brands,id',
                'unit_id'           => 'required|exists:units,id',
                'colors'            => 'required',
                'sizes'             => 'required',
                'regular_price'     => 'required',
                'selling_price'     => 'required',
                'type_id'           => 'required|exists:product_types,id',
                'code'              => 'required|string:255|unique:products,code,except,id',
                'image'             => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $imageName = null;
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/sellers/product_image'),$imageName);
            }

            $product = Product::create([
                "user_id"               =>1,
                "type_id"               =>$request->type_id,
                "category_id"           =>$request->category_id,
                "sub_category_id"       =>$request->sub_category_id,
                "brand_id"              =>$request->brand_id,
                "unit_id"               =>$request->unit_id,
                "name"                  =>$request->name,
                "slug"                  =>str_replace(" ", "_", strtolower($request->name)),
                "code"                  =>$request->code,
                "regular_price"         =>$request->regular_price,
                "selling_price"         =>$request->selling_price,
                "short_description"     =>$request->short_description,
                "long_description"      =>$request->long_description,
                "shipping_cost"         =>$request->shipping_cost,
                "tags"                  =>$request->tags,
                "estimate_shipping_time" =>$request->estimate_shipping_time,
                "refund"                =>$request->refund,
                "cash_on"                =>$request->cash_on,
                "status"                =>$request->status,
                "image"                 =>$imageName,

            ]);
             if($product){

                 $colors = explode(",", $request->colors);
                foreach($colors as $color){
                    ProductColor::create([
                        'user_id'       =>1,
                        'product_id'    =>$product->id,
                        'color'         =>$color,
                    ]);
                }
                $sizes = explode(",", $request->sizes);
                foreach($sizes as $size){
                    ProductSize::create([
                        'user_id'       =>1,
                        'product_id'    =>$product->id,
                        'size'          =>$size,
                    ]);
                }
                $imageName = null;
                if($request->hasFile('images')){
                    foreach($request->images as $image) {
                        $imageName = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('uploads/seller/other_product_image/'), $imageName);

                        ProductImage::create([
                            'user_id'       =>1,
                            'product_id'    => $product->id,
                            'other_image'   => $imageName,
                        ]);
                    }

                }
            }
            Toastr::success('Successfully Added.');
            return redirect()->route('seller-whole-sale-product.index');

    }
    public function show($productId)
    {
        $product         = Product::find($productId);
        $product_colors  = ProductColor::where('product_id',$productId)->get();
        $product_sizes   = ProductSize::where('product_id',$productId)->get();
        $product_images  = ProductImage::where('product_id',$productId)->get();
        return view("seller.digital_product.show",compact(
            "product","product_colors","product_sizes","product_images"
        ));
    }
    public function edit($productId)
    {
        $product        = Product::find($productId);
        $product_colors = ProductColor::where('product_id',$product->id)->get();
        $product_sizes  = ProductSize::where('product_id',$productId)->get();
        $product_images = ProductImage::where('product_id',$productId)->get();
        $categories     = Category::all();
        $subCategories  = SubCategory::all();
        $brands         = Brand::all();
        $units          = Unit::all();
        $productTypes   = ProductType::all();
        return view("seller.digital_product.edit",compact(
            "product","categories","subCategories","brands","units","product_sizes","productTypes","product_colors","product_images"
        ));
    }
    public function update(Request $request,$productId)
    {
        // try{

            $validate = Validator::make($request->all(), [
                'name'              => 'required|string:255|unique:seller_products,name,'.$productId,
                'category_id'       => 'required|exists:categories,id',
                'sub_category_id'   => 'required|exists:sub_categories,id',
                'brand_id'          => 'required|exists:brands,id',
                'unit_id'           => 'required|exists:units,id',
                'colors'            => 'required',
                'sizes'             => 'required',
                'regular_price'     => 'required',
                'selling_price'     => 'required',
                'type_id'           => 'required|exists:product_types,id',
                'code'              => 'required|string:255|unique:products,code,'.$productId,
                'image'             => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $imageName = null;
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/sellers/product_image'),$imageName);
            }

            $product = Product::find($productId);
            $product->create([
                "user_id"               =>1,
                "type_id"               =>$request->type_id,
                "category_id"           =>$request->category_id,
                "sub_category_id"       =>$request->sub_category_id,
                "brand_id"              =>$request->brand_id,
                "unit_id"               =>$request->unit_id,
                "name"                  =>$request->name,
                "slug"                  =>str_replace(" ", "_", strtolower($request->name)),
                "code"                  =>$request->code,
                "regular_price"         =>$request->regular_price,
                "selling_price"         =>$request->selling_price,
                "short_description"     =>$request->short_description,
                "long_description"      =>$request->long_description,
                "shipping_cost"         =>$request->shipping_cost,
                "tags"                  =>$request->tags,
                "estimate_shipping_time" =>$request->estimate_shipping_time,
                "refund"                =>$request->refund,
                "cash_on"                =>$request->cash_on,
                "status"                =>$request->status,
                "image"                 =>$imageName,

            ]);
             if($product){

                 $colors = explode(",", $request->colors);

                foreach($colors as $color){
                   $product= ProductColor::where('product_id',$productId)->first();
                   $product->update([
                        'user_id'       =>1,
                        'product_id'    =>$product->id,
                        'color'         =>$color,
                    ]);
                }
                $sizes = explode(",", $request->sizes);
                foreach($sizes as $size){
                    $product= ProductSize::where('product_id',$productId)->first();
                    $product->update([
                        'user_id'       =>1,
                        'product_id'    =>$product->id,
                        'size'          =>$size,
                    ]);
                }
                $imageName = null;
                if($request->hasFile('images')){
                    foreach($request->images as $image) {
                        $imageName = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('uploads/seller/other_product_image/'), $imageName);

                        $product= ProductImage::where('product_id',$productId)->first();
                        $product->update([
                            'user_id'       =>1,
                            'product_id'    => $product->id,
                            'other_image'   => $imageName,
                        ]);
                    }

                }
            }
            Toastr::success('Successfully Updated.');
            return redirect()->route('seller-whole-sale-product.index');

            // } catch (Exception $e) {
            //     toastr()->error($e->getMessage());
            //     return redirect()->back();
            //  }
    }
    public function delete($productId)
    {
        $product = Product::find($productId);
        $product->delete();
        Toastr::success("Successfully Deleted.");
        return redirect()->back();
    }
}
