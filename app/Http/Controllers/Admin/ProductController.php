<?php

namespace App\Http\Controllers\Admin;

use AizPackages\CombinationGenerate\Services\CombinationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Message;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ProductStock;
use App\Models\ProductType;
use App\Models\Size;
use App\Models\StartConversation;
use App\Models\Unit;
use App\Models\ProductVariant;
use App\Models\Upload;
use App\Models\User;
use App\Services\ProductService;
use App\Services\ProductStockService;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function Ramsey\Uuid\Codec\decode;

class ProductController extends Controller
{

    private $per_page = 12;

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
        $products = Product::latest()->get();
        return view("admin.product.product_all.index",compact("products"));
    }
    public function create()
    {
        return view('admin.product.product_all.add', [
            'parent_categories' => Category::where('status',1)->get(),
            'brands'            => Brand::where('status',1)->get(),
            'colors'            => Color::where('status',1)->get(),
            'units'            => Unit::where('status',1)->get(),
        ]);
    }
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name'              => 'required|string:255|unique:products,name,except,id',
            'category_id'       => 'required|exists:categories,id',
            'brand_id'          => 'required|exists:brands,id',
            'unit_id'          => 'required|exists:units,id',
            'bar_code'          => 'required|string:255|unique:products,bar_code,except,id',
            'product_price'     => 'required',

        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }
        try{
            DB::beginTransaction();
            $product_image=null;
            if($request->product_image){
                $image =$request->product_image;
                $imageFile = Upload::find($image);
                $product_image = $imageFile->file;
            }
            $attr = $this->productService->store($request->all());
            $category_id =$request->category_id;
            $category = Category::where('id',$category_id)->first();
            $product_type =$request->product_type;
            $product = Product::create([
                "category_id"       =>$request->category_id,
                "attributes"        =>$attr['attributes'],
                "choice_options"    =>$attr['choice_options'],
                "colors"            =>$attr['colors'],
                "variant_product"   =>$request->product_select,
                "brand_id"          =>$request->brand_id,
                "unit_id"           =>$request->unit_id,
                "category_type"     =>$category->type,
                "product_type"      =>$product_type,
                "name"              =>$request->name,
                "slug"              =>str_replace(" ", "-", strtolower($request->name)),
                "bar_code"          =>$request->bar_code,
                "short_description" =>$request->short_description,
                "long_description"  =>$request->long_description,
                "featured_status"   =>$request->featured_status ? $request->featured_status : 0,
                "shipping_cost"     =>$request->shipping_cost,
                "refund"            =>$request->refund,
                "tags"              =>$request->tags,
                "product_price"     =>$request->product_price,
                "product_image"     =>$request->product_image ? $product_image : '',
                "product_stock"     =>$request->product_stock ? $request->product_stock:0,
                "product_select"    =>$request->product_select,
                "other_image"       =>$request->image ? json_encode($request->image): '',
                "user_id"           => auth()->user()->id,
                "role"              =>'admin',
                "status"              =>$request->status,
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
            return redirect()->route('products.index');

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
                return view("admin.product.product_all.product-details",compact("product","product_stocks","otherImages"));
            }
            catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($productId)
    {
            $product = Product::find($productId);
            $otherImages = null;
            if ($product->other_image != null){
                $images = json_decode($product->other_image);
                $otherImages = Upload::whereIn('id', $images)->get();

            }

        try{
            $parent_categories= Category::where('status',1)->get();
            $brands = Brand::where('status',1)->get();
            $units  = Unit::where('status',1)->get();
            $colors = Color::where('status',1)->get();

            return view("admin.product.product_all.edit",compact(
                "product","brands",'colors','parent_categories','otherImages','units'
            ));
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $productId = $request->id;
        $product = Product::find($productId);

            $validate = Validator::make($request->all(), [
                'name'              => 'required|string:255|unique:products,name,'.$productId,
                'category_id'       => 'required|exists:categories,id',
                'unit_id'       => 'required|exists:units,id',
                'product_price'     => 'required',
                'brand_id'          => 'required|exists:brands,id',
                'bar_code'          => 'required|string:255|unique:products,bar_code,'.$productId

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
        try{
            $category_id =$request->category_id;
            $category = Category::where('id',$category_id)->first();
            $product_type =$request->product_type;
            $product = Product::find($productId);
            $product->update([
                "category_id"       =>$request->category_id,
                "variant_product"   =>$request->product_select,
                "brand_id"          =>$request->brand_id,
                "unit_id"          =>$request->unit_id,
                "category_type"     =>$category->type,
                "product_type"      =>$request->product_type,
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
                "status"            =>$request->status ? $request->status : $product->status,
            ]);
            if ($request->image != ''){
                $product->other_image = json_encode($request->image);
                $product->save();
            }
            if($request->product_image){
                $imageFile = Upload::find($request->product_image);
                $product->product_image = $imageFile->file;
                $product->save();
            }

            if($request->product_select == 'product_variation'){
                $product = $this->productService->update($request->all(), $product);
                $product->stocks()->delete();
                $this->productStockService->store($request->all(), $product);
            }
            else
                {
                ProductStock::where('product_id', $product->id)->update([
                    'qty' => $request->product_stock,
                    'variant' => $request->name,
                    'sku' => $request->bar_code,
                    'price' => $request->product_price,
                ]);
            }


            Toastr::success('Successfully Updated.');
            return redirect()->route('products.index');
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy($productId)
    {
        $product= Product::find($productId);
        ProductStock::where('product_id',$product->id)->delete();
        $product->delete();
        Toastr::success("Successfully Deleted.");
        return back();
    }
    public function add_more_choice_option(Request $request)
    {

        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();
        $html = '';
        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }
        return json_encode($html);
    }

    public function sku_combination(Request $request)
    {
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
        return view('admin.product.product_all.sku_combinations', compact('combinations', 'unit_price', 'colors_active', 'product_name'));
    }

    public function sku_combination_edit(Request $request)
    {
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
        return view('admin.product.product_all.sku_combinations_edit', compact('combinations', 'unit_price', 'colors_active', 'product_name', 'product'));
    }
    /* ------------------------
        Admin product End
    ---------------------------------*/

    public function productByType($id)
    {
        return view('admin.product.product-by-type.index',[
            'type'=>ProductType::find($id),
            'products'=>Product::where('type_id',$id)->get()
        ]);
    }
    public function productReview(){
        $products = ProductReview::where('seller_id',auth()->user()->id)->latest()->get();
        $productIds = array();
        foreach ($products as $product){
            if (!in_array($product->product_id,$productIds)){
                array_push($productIds,$product->product_id);
            }
        }
        $products = Product::whereIn('id',$productIds)->get();
        return view('admin.product.review.index',[
            'products'=> $products,
        ]);
    }
    public function productReviewShow($id){
        $product = Product::find($id);
        $reviews = ProductReview::where('product_id',$id)->where('seller_id',auth()->user()->id)->latest()->get();
        return view('admin.product.review.view',[
            'reviews'=> $reviews,
            'product'=> $product,
        ]);
    }
    public function productReviewShowImages($id){
        $review = ProductReview::where('id',$id)->where('seller_id',auth()->user()->id)->first();
        $images = json_decode($review->images);
        return view('admin.product.review.details',[
            'review'=> $review,
            'images'=> $images,
        ]);
    }



    public function seeMorePagination(Request $request){
        $skip = $request->last_item;
        $products =  Product::skip($skip)->take($this->per_page)->where('status',1)->get();
        if(count($products) < 1){
            return false;
        }

        return view('website.home.seeMorePagination', compact('products', 'skip'));
    }


    public function productModalGet(Request $request){
        $product = Product::find($request->product_id);
        return view('website.home.productModal', compact('product'));
    }

    public function getVariantsSize(Request $request){
        $productSize = ProductVariant::where('product_id', $request->product_id)->where('color_id', $request->color_id)->select('size_id', 'variant_prices')->get();
        $sizes = array();

        foreach($productSize as $size){
            array_push($sizes, Size::find($size));
        }

        return view('website.getSize', compact('sizes'));

    }

    public function getVariantsColor(Request $request){
        $productColor = ProductVariant::where('product_id', $request->product_id)->where('size_id', $request->color_id)->get('color_id');

        $colors = array();
        foreach($productColor as $color){
            array_push($colors, Color::find($color));
        }

        return view('website.getColor', compact('colors'));

    }

    public function getVariantsPrice(Request $request){

        $price = ProductVariant::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->select('id', 'variant_prices')->first();
        if($price){
            return response()->json(['success' => $price, 'variant_id' => $price->id]);
        }else{
            return response()->json(['error' => 'not found']);
        }

    }

    public function digitalProduct(){
        $products = Product::where('user_id',auth()->user()->id)->where('product_type','digital')->latest()->get();
        return view('admin.product.digital-product.index',compact("products"));
    }
    public function createDigitalProduct(){
        return view('admin.product.digital-product.add', [
                'parent_categories' => Category::where('status',1)->where('type','digital')->get(),
                'brands'            => Brand::where('status',1)->get(),
                'colors'            => Color::where('status',1)->get(),
            ]);
    }


    public function sellerProduct(){
        $products = Product::where('role','seller')->latest()->get();
        return view('admin.product.seller.index',compact('products'));
    }
    public function inhouseProduct(){
        $products = Product::where('role','admin')->latest()->get();
        return view('admin.product.inhouse.index',compact('products'));
    }
    public function sellerProductShow($id){
        try {
            $product = Product::find($id);
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
            return view('admin.product.seller.show',compact('product','product_stocks','otherImages'));
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }

    public function inhouseProductShow($id){
        try {
            $product = Product::find($id);
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
            return view('admin.product.inhouse.show',compact('product','product_stocks','otherImages'));
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }

    public function productStatusChange(Request $request,$id){
        $product = Product::find($id);
        $product->status = $request->status;
        $product->save();
        if ($request->status == 1){
            Toastr::success('Active Product Successfully.');
            return back();
        }
        Toastr::success('Inactive Product Successfully.');
        return back();
    }
    public function productStatusChangeBulk(Request $request){
        try {
            $this->validate($request,[
               'status' => 'required',
               'product_id' => 'required',
            ]);
            $productsIds = explode(',',implode($request->product_id));
            $products = Product::whereIn('id',$productsIds)->get();
            if ($products != ''){
                foreach ($products as $product){
                    if ($product->status != $request->status){
                        $product->status = $request->status;
                        $product->save();
                    }
                }
                if ($request->status == 1){
                    Toastr::success('Active Product Successfully.');
                    return back();
                }
                Toastr::success('Inactive Product Successfully.');
                return back();
            }
            else{
                Toastr::error('Product Not Found');
                return back();
            }

        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }

    public function productConversation(){
        $products = StartConversation::where('seller_id',auth()->user()->id)->latest()->get();
        $productIds = array();
        foreach ($products as $product){
            if (!in_array($product->product_id,$productIds)){
                array_push($productIds,$product->product_id);
            }
        }
        $products = Product::whereIn('id',$productIds)->get();
        return view('admin.support.product-conversation.index',[
            'products'=> $products,
        ]);
    }
    public function productConversationShow($id){
        $product = Product::find($id);
        $conversations = StartConversation::where('product_id',$id)->where('seller_id',auth()->user()->id)->latest()->get();
        return view('admin.support.product-conversation.view',[
            'conversations'=> $conversations,
            'product'=> $product,
        ]);
    }
    public function productConversationShowDetails($id){
        $con = StartConversation::find($id);
        $product = Product::find($con->product_id);
        $conversations = Message::where('conversation_id',$id)->get();
        return view('admin.support.product-conversation.conversation',[
            'con'=> $con,
            'conversations'=> $conversations,
            'product'=> $product,
        ]);
    }

    public function productConversationReply(Request $request){
            $conversation = new Message();
            $conversation->conversation_id = $request->conversation_id;
            $conversation->sender_id = auth()->user()->id;
            $conversation->receiver_id = $request->receiver_id;
            $conversation->message = $request->message;
            $conversation->save();
            Toastr::success('reply send successfully.');
            return back();
    }
    public function productStartConversationDelete($id){
            $conversation = StartConversation::find($id);
            $replies = Message::whereIn('conversation_id',[$conversation->id])->get();
            if ($replies){
                foreach ($replies as $reply){
                    $reply->delete();
                }
            }

            $conversation->delete();
            Toastr::success('Delete successfully.');
            return back();
    }
    public function productConversationDelete($id){
            $conversation = Message::find($id);
            $conversation->delete();
            Toastr::success('Delete successfully.');
            return back();
    }
    public function productReviewDelete($id){
            $review = ProductReview::find($id);

            $images = json_decode($review->images);
            foreach ($images as $image){
                if (file_exists($image))
                    unlink($image);
            }

            Toastr::success('Delete successfully.');
            return back();
    }



}

