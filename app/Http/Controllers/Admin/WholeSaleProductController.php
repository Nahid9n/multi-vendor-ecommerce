<?php

namespace App\Http\Controllers\Admin;

use AizPackages\CombinationGenerate\Services\CombinationService;
use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Size;
use App\Models\Unit;
use App\Models\Upload;
use App\Services\ProductService;
use App\Services\ProductStockService;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;

class WholeSaleProductController extends Controller
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
        $products = Product::where('user_id',auth()->user()->id)
                    ->where('product_type','whole-sale-product')->latest()->get();
        return view("admin.whole-sale-product.index",compact("products"));
    }
    public function create()
    {
        return view('admin.whole-sale-product.add', [
            'parent_categories' => Category::where('status',1)->get(),
            'brands'            => Brand::where('status',1)->get(),
            'units'             => Unit::where('status',1)->get(),
            'colors'            => Color::where('status',1)->get(),
        ]);
    }
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name'              => 'required|string:255|unique:products,name,except,id',
            'category_id'       => 'required|exists:categories,id',
            'brand_id'          => 'required|exists:brands,id',
            'unit_id'           => 'required|exists:units,id',
            'unit_amount'       => 'required|string:255',
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
            if($request->product_image){
                $image =$request->product_image;
                $imageFile = Upload::find($image);
                $product_image= $imageFile->file;
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
                    "product_type"      =>$product_type,
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
                    "unit_amount"       =>$request->unit_amount,
                    "product_image"     =>$product_image,
                    "product_price"     =>$request->product_price,
                    "product_stock"     =>$request->product_stock,
                    "product_select"    =>$request->product_select,
                    "other_image"       =>json_encode(explode(",",$request->images)),
                    "user_id"           =>auth()->user()->id,
                    "role"              =>'admin',
                    "status"              =>$request->status,
                ]);

                $this->productStockService->store($request->all(), $product);
                DB::commit();
                Toastr::success('Successfully Added.');
                return redirect()->route('whole-sale-product.index');

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
            $product_stocks = ProductStock::where('product_id',$product->id)->get();
                return view("admin.whole-sale-product.product-details",compact("product","product_stocks"));
            }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit($productId)
    {
        try{
            $product = Product::find($productId);
            $parent_categories= Category::all();
            $brands = Brand::all();
            $units  = Unit::all();
            $sizes  = Size::all();
            $colors = Color::all();

            return view("admin.whole-sale-product.edit",compact(
                "product","brands","units",'sizes','colors','parent_categories'
            ));
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function update(Request $request)
    {
        $productId = $request->id;
        try{
            $validate = Validator::make($request->all(), [
                'name'              => 'required|string:255|unique:products,name,'.$productId,
                'category_id'       => 'required|exists:categories,id',
                'product_price'     => 'required',
                'brand_id'          => 'required|exists:brands,id',
                'unit_id'           => 'required|exists:units,id',
                'unit_amount'       => 'required|string:255',
                'bar_code'          => 'required|string:255|unique:products,bar_code,'.$productId,
                'shipping_cost'     => 'required',

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $product_image=null;
            if($request->product_image){
                $image =$request->product_image;
                $imageFile = Upload::find($image);
                $product_image= $imageFile->file;
            }
            $category_id =$request->category_id;
            $category = Category::where('id',$category_id)->first();
            $product_type =$request->product_type;
            $product = Product::find($productId);
                $product->update([
                "category_id"       =>$request->category_id,
                "variant_product"   =>$request->product_select,
                "brand_id"          =>$request->brand_id,
                "unit_id"           =>$request->unit_id,
                "product_type"      =>$product_type,
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
                "unit_amount"       =>$request->unit_amount,
                "product_image"     =>$product_image,
                "product_price"     =>$request->product_price,
                "product_stock"     =>$request->product_stock,
                "product_select"    =>$request->product_select,
                "other_image"       =>json_encode(explode(",",$request->images)),
                "status"              =>$request->status,
            ]);
            $product = $this->productService->update($request->all(), $product);
            $product->stocks()->delete();
            $this->productStockService->store($request->all(), $product);

            Toastr::success('Successfully Updated.');
            return redirect()->route('whole-sale-product.index');
        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function delete($productId)
    {
        $product= Product::find($productId);
        ProductStock::where('product_id',$product->id)->delete();
        $product->delete();
        Toastr::success("Successfully Deleted.");
        return back();
    }
    public function add_more_choice_option(Request $request)
    {
        //dd($request->all());
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
}
