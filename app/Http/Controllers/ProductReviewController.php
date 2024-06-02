<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductReviewController extends Controller
{
    public function review(Request $request){
        try {
            $validate = Validator::make($request->all(),[
                "comment"          =>"required|min:3",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $review = new ProductReview();
            $review->user_id = auth()->user()->id;
            $review->seller_id = $request->seller_id;
            $review->product_id = $request->product_id;
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            if ($request->images){
                $images = array();
                foreach ($request->images as $image){
                    $imageName = $image->getClientOriginalName();
                    $directory = 'uploads/review-product/';
                    $image->move($directory,$imageName);
                    $imageUrl = $directory.$imageName;
                    array_push($images,$imageUrl);
                }

                $review->images = json_encode($images);
            }
            $review->status = 1;
            $review->save();

            toastr()->success('review send successfully.');
            return back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function reviewUpdate(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "comment"          =>"required|min:3",
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $review = ProductReview::find($id);
            $review->user_id = auth()->user()->id;
            $review->seller_id = $request->seller_id;
            $review->product_id = $request->product_id;
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            if ($request->images){
                foreach (json_decode($review->images) as $img){
                    if (file_exists($img)){
                        unlink($img);
                    }
                }
                $images = array();
                foreach ($request->images as $image){
                    $imageName = $image->getClientOriginalName();
                    $directory = 'uploads/review-product/';
                    $image->move($directory,$imageName);
                    $imageUrl = $directory.$imageName;
                    array_push($images,$imageUrl);
                }

                $review->images = json_encode($images);
            }
            $review->status = 1;
            $review->save();

            toastr()->success('review update successfully.');
            return back();
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function reviewDelete($id){
        $review = ProductReview::find($id);
        $review->delete();
        toastr()->success('review delete successfully.');
        return back();
    }

}
