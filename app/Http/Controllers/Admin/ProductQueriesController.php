<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductQueries;
use App\Models\ProductQueriesReply;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductQueriesController extends Controller
{
    public function index(){
        $queries = ProductQueries::all();
        $product = array();
        foreach ($queries as $query){
            if (!in_array($query->product_id,$product)){
                array_push($product,$query->product_id);
            }
        }
        $products = Product::whereIn('id',$product)->latest()->get();

        return view('admin.support.product-queries.queries',[
            'queries' => $queries,
            'products' => $products,
        ]);
    }
    public function newQuery(Request $request){
        try {
            $validate = Validator::make($request->all(),[
                "question"          =>"required",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $queries = new ProductQueries();
            $queries->product_id = $request->product_id;
            $queries->user_id = $request->user_id;
            $queries->question = $request->question;
            $queries->save();
            toastr()->success('send success');
            return redirect()->back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }

    }
    public function updateQuery(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "question"          =>"required",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $queries = ProductQueries::find($id);
            $queries->product_id = $request->product_id;
            $queries->user_id = $request->user_id;
            $queries->question = $request->question;
            $queries->save();
            toastr()->success('update success');
            return redirect()->back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function updateQueryReply(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "reply"          =>"required",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $queries = ProductQueriesReply::find($id);
            $queries->product_id = $request->product_id;
            $queries->queries_id = $request->queries_id;
            $queries->user_id = $request->user_id;
            $queries->reply = $request->reply;
            $queries->save();
            toastr()->success('update success');
            return redirect()->back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function viewQuery($id){
        $product = Product::find($id);
        $queries = ProductQueries::where('product_id',$id)->latest()->get();
        return view('admin.support.product-queries.view',[
            'queries'=> $queries,
            'product'=> $product,
        ]);
    }
    public function replyQuery(Request $request){
        try {
            $validate = Validator::make($request->all(),[
                "reply"          =>"required",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $queries = new ProductQueriesReply();
            $queries->product_id = $request->product_id;
            $queries->queries_id = $request->queries_id;
            $queries->user_id = auth()->user()->id;
            $queries->reply = $request->reply;
            $queries->save();
            toastr()->success('reply send success');
            return redirect()->back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }

    public function deleteQuery($id){
        $queries = ProductQueriesReply::find($id);
        $queries->delete();
        toastr()->success('delete success');
        return redirect()->back();
    }
    public function deleteQueries($id){
        $query = ProductQueries::find($id);
        if (isset($query)){
            $queriesReplies = ProductQueriesReply::where('queries_id',$query->id)->get();
            foreach ($queriesReplies as $reply){
                $reply->delete();
            }
        }
        $query->delete();
        toastr()->success('delete success');
        return redirect()->back();
    }
}
