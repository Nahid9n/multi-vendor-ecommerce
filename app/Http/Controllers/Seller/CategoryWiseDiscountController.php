<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryWiseDiscount;
use Brian2694\Toastr\Facades\Toastr;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryWiseDiscountController extends Controller
{
    public function index()
    {
        if(auth()->user()->status ==1){
            try{
                $discounts = CategoryWiseDiscount::with('category')->orderBy('id','DESC')->get();
                return view('seller.category_wise_discount.index',compact('discounts'));
            }catch(\Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }

    }
    public function create()
    {
        if(auth()->user()->status ==1){
            try{
                $parent_categories = Category::where('status',1)->get();
                return view('seller.category_wise_discount.create',compact('parent_categories'));
            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function store(Request $request)
    {
        if(auth()->user()->status ==1){
            try{
                $validate = Validator::make($request->all(), [
                    'category_id'  =>'required',
                    'discount'     => 'required|numeric',
                    'datefilter'   => 'required',

                ]);
                if ($validate->fails()) {
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()->withErrors($validate)->withInput();
                }
                CategoryWiseDiscount::create([
                    'category_id'  =>$request->category_id,
                    'discount'      =>$request->discount,
                    'discount_date_range' =>$request->datefilter,
                    'status' =>$request->status,
                ]);
                Toastr::success('Successfully Added.');
                return redirect()->route('category-wise-discount.index');

            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }

    }
    public function edit($id)
    {
        if(auth()->user()->status ==1){
            try{
                $parent_categories = Category::where('status',1)->get();
                $discount = CategoryWiseDiscount::find($id);
                return view('seller.category_wise_discount.edit',compact('parent_categories','discount'));
            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function update(Request $request,$id)
    {
        if(auth()->user()->status ==1){
            try{
                $validate = Validator::make($request->all(), [
                    'category_id' =>'required',
                    'discount'    => 'required|numeric',
                    'datefilter'  => 'required',
                ]);
                if ($validate->fails()) {
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()->withErrors($validate)->withInput();
                }
                $category = CategoryWiseDiscount::find($id);
                $category->update([
                    'category_id'  =>$request->category_id,
                    'discount'      =>$request->discount,
                    'discount_date_range' =>$request->datefilter,
                    'status' =>$request->status,
                ]);
                Toastr::success('Successfully Updated.');
                return redirect()->route('category-wise-discount.index');
            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function delete($id)
    {
        if(auth()->user()->status ==1){

            try{
                CategoryWiseDiscount::destroy($id);
                Toastr::success('Successfully Deleted.');
                return back();
            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }

    }
}
