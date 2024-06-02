<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionProductType;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuctionProductTypeController extends Controller
{
    public function index()
    {
        $product_types = AuctionProductType::all();
        return view("admin.auction_products.auction_product_type.index",
                compact("product_types"));
    }
     public function create()
    {
        return view("admin.auction_products.auction_product_type.create");
    }

    public function updateStatus(AuctionProductType $auctionProductType)
    {
        $auctionProductType->update(['status' => request('status')]);

        return redirect()->route('auction.product.type.index');
    }
    public function store(Request $request)
    {
        try{
            $validator= Validator::make($request->all(), [
                "auction_product_type"  => "required|unique:auction_product_types,type_name,except,id",
                "description"           => "required|string",
                "status"                => "required|numeric|min:0",
            ]);
            if($validator->fails())
            {
                Toastr::error($validator->getMessageBag()->first());
                return redirect()->back();
            }
            AuctionProductType::create([
                "type_name"     =>$request->auction_product_type,
                "description"   =>$request->description,
                "status"        =>$request->status,
            ]);
            Toastr::success("AuctionProductType has been successfully created.");
            return redirect()->route('auction.product.type.index');

        }catch(Exception $e){
            Log::error("Something went wrong!".$e->getMessage());
            return redirect()->back();
        }
    }
    public function show($id)
    {
        $product_type = AuctionProductType::find($id);

        return view("admin.auction_products.auction_product_type.show", compact("product_type"));
    }
    public function edit($id)
    {
      $product_type = AuctionProductType::find($id);
        return view("admin.auction_products.auction_product_type.edit", compact("product_type"));
    }
    public function update(Request $request,$id)
    {
        try{
            $validator= Validator::make($request->all(), [
                "auction_product_type"  => "required|",
                "description"           => "required|string",
                "status"                => "required|numeric|min:0",
           ]);
           if($validator->fails())
           {
               Toastr::error($validator->getMessageBag()->first());
               return redirect()->back();
           }
           $product_type= AuctionProductType::find($id);
           $product_type->update([
            "type_name"     =>$request->auction_product_type,
            "description"   =>$request->description,
            "status"        =>$request->status,
           ]);
           Toastr::success("AuctionProductType has been successfully created.");
           return redirect()->route('auction.product.type.index');

        }catch(Exception $e){
            Log::error("Something went wrong!".$e->getMessage());
            return redirect()->back();
        }
    }
     public function delete($id)
    {
      $product_type = AuctionProductType::find($id);
      $product_type->delete();
      Toastr::success("AuctionProductType has been successfully deleted.");
      return redirect()->back();

    }

    public function typeOfAuctionProductType($id){

        return view('admin.auction_products.auction_product_type.index',[
            'product_types'=> AuctionProductType::where('id',$id)->get(),
        ]);
        
    }

}
