<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionProduct;
use App\Models\AuctionProductType;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuctionProductController extends Controller
{
    public function index()
    {
        $auction_products = AuctionProduct::with([
            "product",
             "type"
             ])->get();
        return view("admin.auction_products.auction_product.index",
            compact("auction_products"));
    }
    public function create()
    {
        $products       = Product::all();
        $product_types  = AuctionProductType::where('status',1)->get();

        return view("admin.auction_products.auction_product.create",compact([
                    "products",
                    "product_types",
                ]));
    }
    public function store(Request $request)
    {
        
        
        $validator = Validator::make(request()->all(), [
            "product_id"        =>"required|numeric|min:0",
            // "auction_product_type_id "          =>"required|numeric|min:0",
            "code"              =>"required|string",
            "discount"          =>"required|numeric|min:0",
            "start_date"         =>"required|date",
            "end_date"          =>"required|date",
            "bit_amount"        =>"required|numeric|min:0",
            "total_bit"         =>"required|numeric|min:0",

            ]);
            if($validator->fails())
            {
                Toastr::error($validator->getMessageBag()->first());
                return redirect()->back();
            }

            $added_by = Session::get('customer_name');

            if(Session::get('customer_name') == null){
                $added_by = 'Admin';
            }

        AuctionProduct::create([
            "product_id"            =>$request->product_id,
            "type_id"               =>$request->type_id,
            "code"                  =>$request->code,
            "discount"              =>$request->discount,
            "status"                =>$request->status,
            "start_date"            =>$request->start_date,
            "end_date"              =>$request->end_date,
            "bit_starting_amount"   =>$request->bit_amount,
            "total_bids"            =>$request->total_bit,
            //"added_by"              =>auth()->user()->name,
            "added_by"              => $added_by

        ]);
        Toastr::success("AuctionProduct has been successfully created.");
        return redirect()->route('auction.product.index');
    }
    public function show($auctionProductId)
    {
        $auction_product = AuctionProduct::find($auctionProductId);
        return view("admin.auction_products.auction_product.show",
                compact("auction_product"));
    }
    public function edit($auctionProductId)
    {
        $auction_product = AuctionProduct::find($auctionProductId);
        $products = Product::all();
        $product_types = AuctionProductType::all();
        return view("admin.auction_products.auction_product.edit",
                compact("auction_product", "products","product_types"));
    }
    public function update(Request $request, $auctionProductId)
    {

        $auction_product = AuctionProduct::find($auctionProductId);
        $validator = Validator::make(request()->all(), [
            "product_id"        =>"required|numeric|min:0",
            // "type_id "          =>"required|numeric|min:0",
            "code"              =>"required|string",
            "discount"          =>"required|numeric|min:0",
            "start_date"         =>"required|date",
            "end_date"          =>"required|date",
            "bit_amount"        =>"required|numeric|min:0",
            "total_bit"         =>"required|numeric|min:0",

            ]);
            if($validator->fails())
            {
                Toastr::error($validator->getMessageBag()->first());
                return redirect()->back();
            }

            $auction_product->update([
            "product_id"            =>$request->product_id,
            "type_id"               =>$request->type_id,
            "code"                  =>$request->code,
            "discount"              =>$request->discount,
            "status"                =>$request->status,
            "start_date"            =>$request->start_date,
            "end_date"              =>$request->end_date,
            "bit_starting_amount"   =>$request->bit_amount,
            "total_bids"            =>$request->total_bit,
            // "added_by"              =>auth()->user()->name,
            "added_by"              => Session::get('customer_name')


        ]);
        Toastr::success("AuctionProduct has been successfully update.");
        return redirect()->route('auction.product.index');
    }

    public function delete($auctionProductId)
    {
        $auction_product = AuctionProduct::find($auctionProductId);
        $auction_product->delete();
         Toastr::success("AuctionProduct has been successfully deleted.");
        return redirect()->back();
    }

    public function inHouseAuctionProduct($id)
    {
        $inHouseProduct = AuctionProduct::find($id);
        return view("admin.auction_products.inHouse.index",
                compact("inHouseProduct"));
    }
}
