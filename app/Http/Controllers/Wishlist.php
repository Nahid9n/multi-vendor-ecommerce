<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ProductVariant;
use App\Models\Size;
use App\Models\Wishlist as ModelsWishlist;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Wishlist extends Controller
{
    public function addToWishlist($id){

        $existingWishlistItem = ModelsWishlist::where('product_id', $id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if($existingWishlistItem) {
            return response()->json(['status' => false, 'This is item is already added in wishlist']);
        }
        
        ModelsWishlist::create(['product_id' => $id, 'wishlist_status' => 1, 'user_id' => auth()->user()->id]);
        $total = count(ModelsWishlist::where('user_id', auth()->user()->id)->get());
        return response()->json(['status' => true, 'message' => $total]);
    }

    public function addToWishlistVariant(Request $request){ 
        $existingWishlistItem = ModelsWishlist::where('product_id', $request->product_id)
            ->where('user_id', auth()->user()->id)
            ->first();
        if($existingWishlistItem) {
            return response()->json(['status' => false, 'This is item is already added in wishlist']);
        }
        
        ModelsWishlist::create(['product_id' => $request->product_id, 'color' => $request->color_id ?? 'N/A', 'size' => $request->size_id ?? 'N/A', 'wishlist_status' => 1, 'user_id' => auth()->user()->id]);
        $total = count(ModelsWishlist::where('user_id', auth()->user()->id)->get());
        return response()->json(['status' => true, 'message' => $total]);
    }

    public function wishlistCouter(Request $request){
        $wishlistCount = count(ModelsWishlist::where('user_id', auth()->user()->id)->get());
        return response()->json(['status' => true, 'message' => $wishlistCount]);
    }

    public function wishlist(){
        $products = ModelsWishlist::with(['product', 'variant'])->where('user_id', auth()->user()->id)->paginate(10);   
        return view('website.wishlist.index', compact('products'));
    }
    public function wishListView(){
        $products = ModelsWishlist::with(['product', 'variant'])->where('user_id', auth()->user()->id)->paginate(10);   
        return view('website.wishlist.index', compact('products'));
    }

    public function wishlistdestroy($id=null){
        $destroyData = ModelsWishlist::find($id);
        $destroyData->delete();
        Toastr::success("Data deleted successfully");
        return redirect()->route('wishList-view');
    }
}