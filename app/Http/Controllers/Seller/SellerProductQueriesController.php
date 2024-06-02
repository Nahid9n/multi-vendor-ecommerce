<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductQueries;
use App\Models\ProductQueriesReply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SellerProductQueriesController extends Controller
{
    public function index(){
        if(auth()->user()->status ==1){
            $queries = ProductQueries::all();
            $product = array();
            foreach ($queries as $query){
                if (!in_array($query->product_id,$product)){
                    array_push($product,$query->product_id);
                }
            }
            $products = Product::whereIn('id',$product)->where('user_id',auth()->user()->id)->latest()->get();

            return view('seller.support.product-queries.queries',[
                'queries' => $queries,
                'products' => $products,
            ]);
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function newQuery(Request $request){
        if(auth()->user()->status ==1){
            $queries = new ProductQueries();
            $queries->product_id = $request->product_id;
            $queries->user_id = $request->user_id;
            $queries->question = $request->question;
            $queries->save();
            toastr()->success('send success');
            return redirect()->back();
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function viewQuery($id){
        if(auth()->user()->status ==1){
            $product = Product::find($id);
            $queries = ProductQueries::where('product_id',$id)->latest()->get();
            return view('seller.support.product-queries.view',[
                'queries'=> $queries,
                'product'=> $product,
            ]);
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function replyQuery(Request $request){
        if(auth()->user()->status ==1){
            $queries = new ProductQueriesReply();
            $queries->product_id = $request->product_id;
            $queries->queries_id = $request->queries_id;
            $queries->user_id = auth()->user()->id;
            $queries->reply = $request->reply;
            $queries->save();
            toastr()->success('reply send success');
            return redirect()->back();
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function deleteQuery($id){
        if(auth()->user()->status ==1){
            $queries = ProductQueriesReply::find($id);
            $queries->delete();
            toastr()->success('delete success');
            return redirect()->back();
        }else{
            Toastrr::error('You are not authenticated.');
            return back();
        }
    }
}
