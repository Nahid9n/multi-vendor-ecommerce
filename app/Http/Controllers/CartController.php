<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\Size;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Cart;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static $product;
    public function index()
    {

        //dd(CartItem::with(['size', 'color'])->where('user_id', auth()->user()->id)->get());
        return view('website.cart.index',[
            'products'=> CartItem::with(['size', 'color'])->where('user_id', auth()->user()->id)->get(),
            // 'product_name'=> $product_name,
        ]);
    }
    public function store(Request $request)
    {
        if(!auth()->user()){
            Toastr::error("Please login first");
            return response()->json([
                'status' => false,
                'error' => "Please login first"
            ]);
        }

        $product = Product::find($request->id);
        if(!$product){
            Toastr::error("Product not found");
            return response()->json([
                'status' => false,
                'error' => "Product not found"
            ]);
        }

        $productAlreadyExist = CartItem::where('product_id', $request->id)->where('user_id', auth()->user()->id)->first();

        if($request->ajax()){
            if($productAlreadyExist){
                Toastr::error("This product is already added in cart");
                return response()->json([
                    'error' => "This product is already added in cart",
                ]);
            }

            CartItem::create([
                'product_id'    => $product->id,
                'user_id'       => auth()->user()->id,
                'name'          => $product->name,
                'qty'           => $request->qty,
                'price'         => $request->price,
                'size_id'       => (isset($request->size)? $request->size : ''),
                'color_id'      => (isset($request->color)? $request->color : ''),
                'image'         => $product->product_image,
                'code'          => $product->code,
                'seller_id'     => $product->user_id,
                'shipping_cost' => $product->shipping_cost,
                'variant_id'    => (isset($request->variant_id)? $request->variant_id : ''),
            ]);

            $prices = CartItem::where('user_id', auth()->user()->id)->select('price','qty')->get();
            $total_price = 0;

            foreach($prices as $price){
                $prices = CartItem::where('user_id', auth()->user()->id)->select('price','qty')->get();
                $total_price += $price->price*$price->qty;
            }

            return response()->json([
                'message' => "Product added",
                'count' => count(CartItem::where('user_id', auth()->user()->id)->get()),
                'total_price' => $total_price,
            ]);

        }else{
            if($productAlreadyExist){
                $current_qty = CartItem::where('user_id', auth()->user()->id)->first('qty');
                $updateQty = $current_qty->qty+$request->qty;
                if($product->qty < $updateQty){

                    Toastr::error("Product stock is not available");
                    return Redirect::back()->withErrors(['error' => 'Product stock is not available.']);

                }
            }


            CartItem::create([
                'product_id'    => $product->id,
                'user_id'       => auth()->user()->id,
                'name'          => $product->name,
                'qty'           => $request->qty,
                'price'         => $request->price,
                'size_id'          => (isset($product->size)? $product->size : ''),
                'color_id'         => (isset($product->color)? $product->color : ''),
                'image'         => $product->product_image,
                'code'          => $product->code,
                'seller_id'     => $product->user_id,
                'shipping_cost' => $product->shipping_cost,
                'variant_id'    => (isset($request->variant_id)? $request->variant_id : ''),
            ]);

            Toastr::success("added in cart");
            return back()->with('message','add to cart success.');
        }

    }

    public function variant_product_add_to_cart(Request $request){

        if(!auth()->user()){
            Toastr::error("Please login first");
            return response()->json([
                'status' => false,
                'error' => "Please login first"
            ]);
        }

        $product = ProductStock::find($request->variant_id);

        if(!$product){
            Toastr::error("Product not found");
            return response()->json([
                'status' => false,
                'error' => "Product not found"
            ]);
        }

        $productAlreadyExist = CartItem::where('product_id', $product->product_id)->where('user_id', auth()->user()->id)->first();

        if($productAlreadyExist){
            // dd('productAlreadyExist');
            $current_qty = CartItem::where('user_id', auth()->user()->id)->first('qty');

            $updateQty = $current_qty->qty+1;

            if($product->qty < $updateQty){

                Toastr::error("Product stock is not available");
                return response()->json([
                    'status' => false,
                    'error' => "Product stock is not available"
                ]);

            }


            CartItem::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->update(['qty' => $updateQty]);

            $prices = CartItem::where('user_id', auth()->user()->id)->select('price','qty')->first();
            $total_price = 0;

            return response()->json([
                'message' => "Cart Product updated",
                'count' => count(CartItem::where('user_id', auth()->user()->id)->get('id')),
                'total_price' => $prices->qty*$prices->price,
            ]);
        }

        $getProductDetails = Product::find($product->product_id);

        $variants = explode("-", $product->variant);

        CartItem::create([
            'product_id'    => $getProductDetails->id,
            'user_id'       => auth()->user()->id,
            'name'          => $getProductDetails->name,
            'qty'           => 1,
            'price'         => $product->price,
            'size_id'          => (isset($variants[1])? $variants[1] : ''),
            'color_id'         => (isset($variants[0])? $variants[0] : ''),
            'image'         => $getProductDetails->product_image,
            'code'          => $getProductDetails->code,
            'seller_id'     => $getProductDetails->user_id,
            'shipping_cost' => $getProductDetails->shipping_cost,
            'variant_id'    => (isset($request->variant_id)? $request->variant_id : ''),
        ]);


        $prices = CartItem::where('user_id', auth()->user()->id)->get('price');
        $total_price = 0;

        foreach($prices as $price){
            $total_price += $price->price;
        }


        return response()->json([
            'message' => "Product added",
            'count' => count(CartItem::where('user_id', auth()->user()->id)->get()),
            'total_price' => $total_price,
        ]);
    }
    public function variantProductAdd(Request $request,$id){
        if(!auth()->user()){
            Toastr::error("Please login first");
            return back();
        }

        $product = ProductStock::where('product_id',$id)->get();

        if(!$product){
            Toastr::error("Product not found");
            return back();
        }

        $productAlreadyExist = CartItem::where('product_id', $id)->where('user_id', auth()->user()->id)->first();

        if($productAlreadyExist){
            // dd('productAlreadyExist');
            $current_qty = CartItem::where('user_id', auth()->user()->id)->first('qty');

            $updateQty = $current_qty->qty+1;

            if($product->qty < $updateQty){

                Toastr::error("Product stock is not available");
                return back();

            }

            CartItem::where('product_id', $id)->where('user_id', auth()->user()->id)->update(['qty' => $updateQty]);

            $prices = CartItem::where('user_id', auth()->user()->id)->select('price','qty')->first();
            $total_price = 0;

            return back();
        }

        $getProductDetails = Product::find($id);

        $variants = explode("-", $product->variant);

        CartItem::create([
            'product_id'    => $getProductDetails->id,
            'user_id'       => auth()->user()->id,
            'name'          => $getProductDetails->name,
            'qty'           => $request->qty,
            'price'         => $product->price,
            'size_id'       => $request->size,
            'color_id'      => $request->color,
            'image'         => $getProductDetails->product_image,
            'code'          => $getProductDetails->code,
            'seller_id'     => $getProductDetails->user_id,
            'shipping_cost' => $getProductDetails->shipping_cost,
            'variant_id'    => (isset($request->variant_id)? $request->variant_id : ''),
        ]);


        $prices = CartItem::where('user_id', auth()->user()->id)->get('price');
        $total_price = 0;

        foreach($prices as $price){
            $total_price += $price->price;
        }
        return back();
    }

    public function addToCartProduct(Request $request){
        try {
            if(!auth()->user()){
                return response()->json([
                    'status' => false,
                    'error' => "Please login first"
                ]);
            }

            $product = Product::find($request->product_id);

            if(!$product){
                return response()->json([
                    'status' => false,
                    'error' => "Product not found"
                ]);
            }


            $color = $request->color;
            $size = $request->size;

            $stock_query = ProductStock::query();

            if($product->variant_product == 'product_variation'){
                if ($color && $size) {
                    $stock_query->where('variant', $color.'-'.$size);
                } elseif ($color && !$size) {
                    $stock_query->where('variant', 'LIKE', $color.'-%');
                } elseif (!$color && $size) {
                    $stock_query->where('variant', 'LIKE', '%-'.$size);
                }
            }

            $stock = $stock_query->where('product_id', $product->id)->first();

            if($stock && $request->qty > $stock->qty){
                return response()->json([
                    'status' => false,
                    'error' => "Product stock is not available"
                ]);
            }

            $size_value = isset($request->size) && $request->size != 'choose' ? $request->size : null;
            $color_value = isset($request->color) && $request->color != 'choose' ? $request->color : null;

            $data = [
                'product_id' => $product->id,
                'user_id' => auth()->user()->id,
                'size_id' => $size_value,
                'color_id' => $color_value,
            ];

            if($request->ajax()){
                CartItem::updateOrCreate($data, [
                    'product_id'    => $product->id,
                    'user_id'       => auth()->user()->id,
                    'name'          => $product->name,
                    'qty'           => $request->qty,
                    'price'         => $product->product_price,
                    'row_total'     => $product->product_price * $request->qty,
                    'size_id'       => $size_value,
                    'color_id'      => $color_value,
                    'image'         => $product->product_image,
                    'code'          => $product->code,
                    'seller_id'     => $product->user_id,
                    'shipping_cost' => $product->shipping_cost,
                    'variant_id'    => (isset($request->variant_id)? $request->variant_id : ''),
                ]);
                return response()->json([
                    'status' => true,
                    'message' => "Product added",
                    'count' => count(CartItem::where('user_id', auth()->user()->id)->get())
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {

    }

    public function deleteProduct(Request $request, $rowId){
     
        CartItem::where('id', $rowId)->delete();

        if($request->ajax()){
            $prices = CartItem::where('user_id', auth()->user()->id)->get('price');
            $total_price = 0;

            foreach($prices as $price){
                $total_price += $price->price;
            }

            return response()->json([
                'message' => "Product added",
                'count' => count(CartItem::where('user_id', auth()->user()->id)->get()),
                'total_price' => $total_price,
            ]);



        }

        Toastr::success("cart product has been successfully");
        return back()->with('message','cart product remove successfully.');


    }

    public function deleteProductAjax(Request $request){
        $items = json_decode($request->cart_id);
        foreach($items as $item){
            CartItem::where('id', $item)->delete();
        }

        return response()->json(['success' => 'cart product has been successfully remove.']);
    }

    public function ajaxUpdateProduct(Request $request){


        $cart = CartItem::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        $updateQty = $request->qty;


        $product = Product::find($request->product_id);

        //dd($product);

        if($product->product_stock < $updateQty){
            Toastr::error("Product stock is not available");
            return response()->json(['error' => 'Product stock is not available']);
        }


        $cart->update([
            'qty' => $request->qty,
        ]);


        if(!$cart){
            return response()->json(['error' => 'Unable to update data']);
        }

        return response()->json(['success' => 'Cart product has been successfully updated.']);
    }

    public function updateProduct(Request $request){
        foreach ($request->data as $item){
            Cart::update($item['rowId'], $item['qty']);
        }
        Toastr::success("cart product has been successfully updated.");
        return redirect('/cart')->with('message','cart product update successfully.');
    }

    public function getCartDetails(){
        $cartContent = CartItem::where('user_id', auth()->user()->id)->get();
        $prices = CartItem::where('user_id', auth()->user()->id)->sum('row_total');
        return view('website.cart_partial', compact('cartContent', 'prices'));
    }

    public function getCartCount(){
        $cartContent = CartItem::where('user_id', auth()->user()->id)->get();
        return count($cartContent);
    }



}
