<?php

namespace App\Models;

use App\Models\ProductStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    private static $product, $image,$imageName,$extension, $directory,$imageUrl,$productQtyPrice;

    private static function getImageUrl($request)
    {

        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$extension;
        self::$directory = "uploads/products/All-product/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newProduct($request)
    {
        self::$product = new Product();
        $productType= 'physical_product';
        if ($request->images != ''){
            $arrayImages = [];
            $images = explode(',',$request->images);
            foreach ($images as $image){
                $file = Upload::find($image);
                array_push($arrayImages,$file->file);
            }
            self::$product->other_image = json_encode($arrayImages);
        }
        if ($request->product_image != ''){
            $file = Upload::find($request->product_image)->file;
            self::$product->product_image = $file;
        }
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->product_type = $productType;
        self::$product->name = $request->name;
        self::$product->slug = str_replace(" ", "_", strtolower($request->name));
        self::$product->weight = $request->weight;
        self::$product->bar_code = $request->bar_code;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->tags = $request->tags;
        self::$product->refund = $request->refund;
        self::$product->cash_on = $request->cash_on;
        self::$product->shipping_cost = $request->shipping_cost;
        self::$product->product_price = $request->product_price;
        self::$product->featured_status = $request->featured_status;
        self::$product->status = $request->status;
        self::$product->user_id = auth()->user()->id;

        $role = User::find(auth()->user()->id)->role;
        self::$product->role = $role;

        self::$product->save();
        return self::$product;
    }
    public static function newProductQtyPrice($request,$product)
    {
        self::$product = new ProductQtyPrice();
        self::$product->user_id = $product->user_id;
        self::$product->product_id = $product->id;
        self::$product->color = json_encode($request->colors);
        self::$product->size = json_encode($request->sizes);
        self::$product->sku = json_encode($request->skus);
        self::$product->quantity = json_encode($request->quantitys);
        self::$product->variation_price = json_encode($request->variant_prices);
        $arrayfiles = [];
        if ($request->filess != ''){
            $filess = explode(',',$request->filess);
            foreach ($filess as $image){
                $file = Upload::find($image);
                array_push($arrayfiles,$file->file);
            }
            self::$product->image = json_encode($arrayfiles);
        }
        self::$product->save();
    }


    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        $productType= 'physical_product';
        if ($request->images != ''){
            $arrayImages = [];
            $images = explode(',',$request->images);
            foreach ($images as $image){
                $file = Upload::find($image);
                array_push($arrayImages,$file->file);
            }
            self::$product->other_image = json_encode($arrayImages);
        }
        if ($request->product_image != ''){
            $file = Upload::find($request->product_image)->file;
            self::$product->product_image = $file;
        }
        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->product_type = $productType;
        self::$product->name = $request->name;
        self::$product->slug = str_replace(" ", "_", strtolower($request->name));
        self::$product->weight = $request->weight;
        self::$product->bar_code = $request->bar_code;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        self::$product->tags = $request->tags;
        self::$product->refund = $request->refund;
        self::$product->cash_on = $request->cash_on;
        self::$product->shipping_cost = $request->shipping_cost;
        self::$product->product_price = $request->product_price;
        self::$product->featured_status = $request->featured_status;
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }
    public static function updateProductQtyPrice($request, $product)
    {
        $productType= 'physical_product';
        self::$product = ProductVariant::where('product_id',$product->id)->first();
        self::$product->product_id = $product->id;
        self::$product->color = json_encode($request->colors);
        self::$product->size = json_encode($request->sizes);
        self::$product->sku = json_encode($request->skus);
        self::$product->quantity = json_encode($request->quantitys);
        self::$product->variation_price = json_encode($request->variant_prices);
        $arrayfiles = [];
        if ($request->filess != ''){
            $filess = explode(',',$request->filess);
            foreach ($filess as $image){
                $file = Upload::find($image);
                array_push($arrayfiles,$file->file);
            }
            self::$product->image = json_encode($arrayfiles);
        }
        self::$product->save();
    }
   public static function deleteProduct($id){
       self::$product = Product::find($id);
       self::$productQtyPrice = ProductVariant::where('product_id',$id)->first();
       self::$product->delete();
       self::$productQtyPrice->delete();
   }

   public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'product_id', 'id')->withTrashed();
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function queries(){
        return $this->hasMany(ProductQueries::class);
    }
    public function productqtyprice(){
        return $this->hasMany(ProductVariant::class,'product_id');
    }
    public function orderDetails(){
        return $this->hasMany(OrdersDetails::class);
    }
    public function review(){
        return $this->hasMany(ProductReview::class);
    }

}
