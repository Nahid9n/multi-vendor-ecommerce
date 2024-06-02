<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class SellerDigitalProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id',auth()->user()->id)
                    ->where('product_type','digital_product')->orderBy('id','DESC')->get();
        return view("seller.digital_product.index",compact("products"));
    }

    public function create()
    {
        $parent_categories= Category::where('type','digital')->where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        return view("seller.digital_product.create",compact(
            "parent_categories","brands"
        ));
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'              => 'required|string:255|unique:products,name,except,id',
            'category_id'       => 'required|exists:categories,id',
            'brand_id'          => 'required|exists:brands,id',
            'bar_code'          => 'required|string:255|unique:products,bar_code,except,id',
            'shipping_cost'     => 'required|numeric',
            'product_price'     => 'required',


        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }
        try{
            DB::beginTransaction();
            $category_id =$request->category_id;
            $category = Category::where('id',$category_id)->first();
            $product_type = $request->product_type;

            $filePath = null;
            if (isset($request->file)) {
                if ($request->file){
                    $file = Upload::find($request->file);
                    $filePath = $file->file;
                }
            }
            $product_image = null;
            if (isset($request->product_image)) {
                if ($request->product_image){
                    $image = Upload::find($request->product_image);
                    $product_image = $image->file;
                }
            }
            $other_images = null;
            if(isset($request->images)){
                if ($request->images){
                    $other_images = json_encode(explode(",",$request->images));
                }
            }
            Product::create([
                    "category_id"       =>$request->category_id,
                    "brand_id"          =>$request->brand_id,
                    "category_type"      =>$category->type,
                    "name"              =>$request->name,
                    "slug"              =>str_replace(" ", "_", strtolower($request->name)),
                    "bar_code"          =>$request->bar_code,
                    "short_description" =>$request->short_description,
                    "long_description"  =>$request->long_description,
                    "featured_status"   =>$request->featured_status,
                    "shipping_cost"     =>$request->shipping_cost,
                    "refund"            =>$request->refund,
                    "tags"              =>$request->tags,
                    "product_price"     =>$request->product_price,
                    "product_select"    =>$request->product_select,
                    "product_type"      =>$product_type,
                    "file"              =>$filePath,
                    "product_image"     =>$product_image,
                    "other_image"       =>$other_images,
                    "user_id"           =>auth()->user()->id,
                    "role"              =>'seller',
            ]);
                DB::commit();
                Toastr::success('Successfully Added.');
                return redirect()->route('digital-product.index');

        }catch(Exception $e){
            DB::rollback();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function show($productsId)
    {
        try{
            $product = Product::find($productsId);
            $other_images = [];
            if(isset($product->other_image)){
                $images = json_decode($product->other_image);
                foreach ($images as $image){
                    $img = Upload::find($image);
                    array_push($other_images,$img->file);
                }
            }
            $file = Upload::where('file',$product->file)->first();
            return view("seller.digital_product.show",compact("product","other_images",'file'));
            }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($productId)
    {
        try{
            $product = Product::find($productId);
            $parent_categories= Category::where('type','digital')->where('status',1)->get();
            $brands = Brand::where('status',1)->get();
            $images = json_decode($product->other_image);
            $otherImages = array();
            if(isset($images)){
                foreach ($images as $image){
                    $img = Upload::find($image);
                    array_push($otherImages,$img->file);
                }
            }
            $file = Upload::where('file',$product->file)->first();
            return view("seller.digital_product.edit",compact(
                "product","brands",'parent_categories','otherImages','file'
            ));
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function update(Request $request,$productId)
    {
        try{
            $validate = Validator::make($request->all(), [
                'name'              => 'required|string:255|unique:products,name,'.$productId,
                'category_id'       => 'required|exists:categories,id',
                'product_price'     => 'required',
                'brand_id'          => 'required|exists:brands,id',
                'bar_code'          => 'required|string:255|unique:products,bar_code,'.$productId,
                'shipping_cost'     => 'required',

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $category_id =$request->category_id;
            $category = Category::where('id',$category_id)->first();
            $product_type = $request->product_type;
            $product = Product::find($productId);

            $product->update([
                    "category_id"       =>$request->category_id,
                    "brand_id"          =>$request->brand_id,
                    "category_type"     =>$category->type,
                    "name"              =>$request->name,
                    "slug"              =>str_replace(" ", "_", strtolower($request->name)),
                    "bar_code"          =>$request->bar_code,
                    "short_description" =>$request->short_description,
                    "long_description"  =>$request->long_description,
                    "featured_status"   =>$request->featured_status,
                    "shipping_cost"     =>$request->shipping_cost,
                    "refund"            =>$request->refund,
                    "tags"              =>$request->tags,
                    "product_price"     =>$request->product_price,
                    "product_select"    =>$request->product_select,
                    "product_type"      =>$product_type,


                ]);

                if(isset($product)){
                    if (isset($request->file)) {
                        if ($request->file){
                            $file = Upload::find($request->file);
                            $filePath = $file->file;
                            $product->update([
                                'file' =>$filePath
                            ]);

                        }
                    }

                    if (isset($request->product_image)) {
                        if ($request->product_image){
                            $image = Upload::find($request->product_image);
                            $product_image = $image->file;
                            $product->update([
                                'product_image' =>$product_image
                            ]);
                        }
                    }
                    if(isset($request->images)){
                        if ($request->images){
                            $other_images = json_encode(explode(",",$request->images));
                             $product->update([
                                'other_image' =>$other_images
                            ]);
                        }
                    }
                }
                Toastr::success('Successfully Updated.');
            return redirect()->route('digital-product.index');
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function delete($productId)
    {
        $product= Product::find($productId);
        $product->delete();
        Toastr::success("Successfully Deleted.");
        return back();
    }

    /* --------------------------
        Digital Product End
    -----------------------------------*/
    public function sellerDigitalProductOrder()
    {
        $orders= Order::orderBy('id','desc')->where('role','seller')
        ->where('product_type','digital_product')->paginate(10);
        return view('seller.digital_product.order.order_index',compact('orders'));

    }
    public function sellerProductOrderConfirm(Request $request,$id)
    {
        $update = Order::where('role','seller')
            ->where('product_type','digital_product')->find($id);
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
    public function sellerDigitalProductView($id)
    {
        $order= Order::where('role','seller')
        ->where('product_type','digital_product')->find($id);
        return view('seller.digital_product.order.view_order',compact('order'));
    }
    public function sellerDigitalProductOrderDetail($order_id)
    {
        $order= OrdersDetails::where('role','seller')
        ->where('product_type','digital_product')->find($order_id);
        return view('seller.digital_product.order.order_details',compact('order'));
    }

}
