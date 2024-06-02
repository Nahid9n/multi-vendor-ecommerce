<?php

namespace App\Http\Controllers\Seller;

use App\Models\ProductStock;
use Exception;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Upload;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OrdersDetails;
use App\Models\AttributeValue;
use App\Models\ProductVariant;
use App\Models\ProductQtyPrice;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Services\ProductStockService;
use Illuminate\Support\Facades\Validator;
use AizPackages\CombinationGenerate\Services\CombinationService;


    class SellerProductController extends Controller
    {
        protected $productStockService;
        protected $productService;

        public function __construct(
            ProductStockService $productStockService,
            ProductService $productService
        ) {
            $this->productService = $productService;
            $this->productStockService = $productStockService;
        }

        public function index()
        {
            if(auth()->user()->status == 1){
                $products = Product::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
                return view("seller.product.index",compact("products"));
            }else{
                Toastr::error('You are not authenticated');
                return back();
            }
        }

        public function create()
        {
            if(auth()->user()->status ==1){
                $parent_categories= Category::where('status',1)->get();
                $brands = Brand::where('status',1)->get();
                $colors = Color::where('status',1)->get();
                $units = Unit::where('status',1)->get();
                return view("seller.product.create",compact(
                    "parent_categories","brands","colors","units"
                ));
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }

        public function store(Request $request)
        {

            if(auth()->user()->status ==1){
                $validate = Validator::make($request->all(), [
                    'name'              => 'required|string:255|unique:products,name,except,id',
                    'category_id'       => 'required|exists:categories,id',
                    'unit_id'           => 'required|exists:units,id',
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
                    $product_image=null;
                    if($request->single_img){
                        $image =$request->single_img;
                        $imageFile = Upload::find($image);
                        $product_image= $imageFile->file;

                    }
                    $attr = $this->productService->store($request->all());
                    $category_id =$request->category_id;
                    $category = Category::where('id',$category_id)->first();
                    $product_type = $request->product_type;
                        $product = Product::create([
                            "category_id"       =>$request->category_id,
                            "unit_id"           =>$request->unit_id,
                            "attributes"        =>$attr['attributes'],
                            "choice_options"    =>$attr['choice_options'],
                            "colors"            =>$attr['colors'],
                            "variant_product"   =>$request->product_select,
                            "brand_id"          =>$request->brand_id,
                            "category_type"     =>$category->type,
                            "product_type"      =>$product_type,
                            "name"              =>$request->name,
                            "slug"              =>str_replace(" ", "-", strtolower($request->name)),
                            "bar_code"          =>$request->bar_code,
                            "short_description" =>$request->short_description,
                            "long_description"  =>$request->long_description,
                            "featured_status"   =>$request->featured_status,
                            "shipping_cost"     =>$request->shipping_cost,
                            "refund"            =>$request->refund,
                            "tags"              =>$request->tags,
                            "product_image"     =>$product_image,
                            "product_price"     =>$request->product_price,
                            "product_stock"     =>$request->product_stock,
                            "product_select"    =>$request->product_select,
                            "other_image"       =>json_encode($request->image),
                            "user_id"           =>auth()->user()->id,
                            "role"              =>'seller',
                        ]);

                        if($request->product_select == 'product_variation'){
                            $this->productStockService->store($request->all(), $product);
                        }else{
                            ProductStock::create([
                                'product_id' => $product->id,
                                'variant' => $request->name,
                                'sku' => $request->bar_code,
                                'price' => $request->product_price,
                                'qty' => $request->product_stock,
                                'image' =>$product_image
                            ]);
                        }

                        DB::commit();
                        Toastr::success('Successfully Added.');
                        return redirect()->route('product.index');

                }catch(Exception $e){
                    DB::rollback();
                    toastr()->error($e->getMessage());
                    return redirect()->back();
                }
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function show($productsId)
        {
            if(auth()->user()->status ==1){
                try{
                    $product = Product::find($productsId);
                    $images = json_decode($product->other_image);
                    $otherImages = array();
                    if (isset($images)){
                        foreach ($images as $image){
                            $img = Upload::find($image);
                            if (isset($img)) {
                                array_push($otherImages, $img->file);
                            }
                        }
                    }
                    $product_stocks = ProductStock::where('product_id',$product->id)->get();
                        return view("seller.product.show",compact("product","product_stocks","otherImages"));
                    }catch(Exception $e){
                    toastr()->error($e->getMessage());
                    return redirect()->back();
                }
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function edit($productId)
        {
            if(auth()->user()->status ==1){
                try{
                    $product = Product::find($productId);
                    $images = json_decode($product->other_image);

                    if(isset($images)){
                        $otherImages = Upload::whereIn('id', $images)->get();
                    }else{
                        $otherImages = null;
                    }
                    $parent_categories= Category::where('type','digital')->where('status',1)->get();
                    $brands = Brand::where('status',1)->get();
                    $colors = Color::where('status',1)->get();
                    $units = Unit::where('status',1)->get();
                    return view("seller.product.edit",compact(
                        "product","brands",'colors','parent_categories','otherImages','units'
                    ));
                }catch(Exception $e){
                    toastr()->error($e->getMessage());
                    return redirect()->back();
                }
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function update(Request $request)
        {
            if(auth()->user()->status ==1){
                $productId = $request->id;
                try{
                    $validate = Validator::make($request->all(), [
                        'name'              => 'required|string:255|unique:products,name,'.$productId,
                        'category_id'       => 'required|exists:categories,id',
                        'unit_id'           => 'required|exists:units,id',
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
                        "unit_id"           =>$request->unit_id,
                        "variant_product"   =>$request->product_select,
                        "brand_id"          =>$request->brand_id,
                        "category_type"      =>$category->type,
                        "product_type"      =>$product_type,
                        "name"              =>$request->name,
                        "slug"              =>str_replace(" ", "-", strtolower($request->name)),
                        "bar_code"          =>$request->bar_code,
                        "short_description" =>$request->short_description,
                        "long_description"  =>$request->long_description,
                        "featured_status"   =>$request->featured_status,
                        "shipping_cost"     =>$request->shipping_cost,
                        "refund"            =>$request->refund,
                        "tags"              =>$request->tags,
                        "product_price"     =>$request->product_price,
                        "product_stock"     =>$request->product_stock,
                        "product_select"    =>$request->product_select,
                        "other_image"       =>json_encode($request->image)
                    ]);


                    if($request->product_image){
                        $image =$request->product_image;
                        $imageFile = Upload::find($image);
                        $product_image= $imageFile->file;
                        $product->product_image = $product_image;
                        $product->save();
                    }

                    if($request->product_select == 'product_variation'){
                        $product = $this->productService->update($request->all(), $product);
                        $product->stocks()->delete();
                        $this->productStockService->store($request->all(), $product);
                    }else{
                        ProductStock::where('id', $product->id)->update([
                            'qty' => $request->product_stock
                        ]);
                    }

                    Toastr::success('Successfully Updated.');
                    return redirect()->route('product.index');
                }catch(Exception $e){
                    toastr()->error($e->getMessage());
                    return redirect()->back();
                }
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }

        public function delete($productId)
        {
            if(auth()->user()->status ==1){
                $product= Product::find($productId);
                ProductStock::where('product_id',$product->id)->delete();
                $product->delete();
                Toastr::success("Successfully Deleted.");
                return back();
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function add_more_choice_option(Request $request)
        {
            if(auth()->user()->status ==1){
                $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();
                $html = '';
                foreach ($all_attribute_values as $row) {
                    $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
                }
                return json_encode($html);
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function sku_combination(Request $request)
        {
            if(auth()->user()->status ==1){
                $options = array();
                if ($request->has('colors') && count($request->colors) > 0) {
                    $colors_active = 1;
                    array_push($options, $request->colors);
                } else {
                    $colors_active = 0;
                }
                $unit_price = $request->unit_price;
                $product_name = $request->name;
                if ($request->has('choice_no')) {
                    foreach ($request->choice_no as $key => $no) {
                        $name = 'choice_options_' . $no;
                        if (isset($request[$name])) {
                            $data = array();
                            foreach ($request[$name] as $key => $item) {
                                // array_push($data, $item->value);
                                array_push($data, $item);
                            }
                            array_push($options, $data);
                        }
                    }
                }
                $combinations = (new CombinationService())->generate_combination($options);
                return view('seller.product.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }
        public function sku_combination_edit(Request $request)
        {
            if(auth()->user()->status ==1){
                $product = Product::findOrFail($request->id);
                $options = array();
                if ($request->has('colors') && count($request->colors) > 0) {
                    $colors_active = 1;
                    array_push($options, $request->colors);
                } else {
                    $colors_active = 0;
                }
                $product_name = $request->name;
                $unit_price = $request->unit_price;

                if ($request->has('choice_no')) {
                    foreach ($request->choice_no as $key => $no) {
                        $name = 'choice_options_' . $no;
                        $data = array();
                        foreach ($request[$name] ?? [] as $key => $item) {
                            array_push($data, $item);
                        }
                        array_push($options, $data);
                    }
                }
                $combinations = (new CombinationService())->generate_combination($options);
                return view('seller.product.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));

            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }

        public function getSingleFileModal(){
            if(auth()->user()->status ==1){

                return view('seller.product.single_file_modal');
            }else{
                Toastr::error('You are not authenticated.');
                return back();
            }
        }

    }

