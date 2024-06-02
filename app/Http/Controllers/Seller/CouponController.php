<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index()
    {
        if(auth()->user()->status ==1){
            $coupons = Coupon::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
            return view('seller.coupon.index',compact('coupons'));

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function create()
    {
        if(auth()->user()->status ==1){
            $products = Product::select('name','id')->where('user_id',auth()->user()->id)->get();
            return view('seller.coupon.add',compact('products'));

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
                    'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,except,id',

                ]);
                if ($validate->fails()) {
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
                }
                Coupon::create([
                    'coupon_type'   =>$request->coupon_type,
                    'coupon_code'   =>$request->coupon_code,
                    'product_id'   =>$request->product_id,
                    'user_id'   =>auth()->user()->id,
                    'discount'   =>$request->discount,
                    'discount_status'   =>$request->discount_status,
                    'min_shopping'   =>$request->min_shopping,
                    'max_discount_amount'   =>$request->max_discount_amount,
                    'date_range'   =>$request->datefilter,
                    'status'   =>$request->status,
                ]);
                Toastr::success('Successfully Added.');
                return redirect()->route('seller-coupon.index');

            }catch(\Exception $e){
                toastr()->error($e->getMessage());
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
            $coupon = Coupon::find($id);
            $products = Product::select('name','id')->get();
            return view('seller.coupon.edit',compact('products',"coupon"));

        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function update(Request $request,$id)
    {
     if(auth()->user()->status ==1){
            try{
                $coupon = Coupon::find($id);
                $validate = Validator::make($request->all(), [
                    'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,'.$id,

                ]);
                if ($validate->fails()) {
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()
                        ->withErrors($validate)
                        ->withInput();
                }
                $coupon->update([
                    'coupon_type'   =>$request->coupon_type,
                    'coupon_code'   =>$request->coupon_code,
                    'product_id'   =>$request->product_id,
                    'user_id'   =>auth()->user()->id,
                    'discount'   =>$request->discount,
                    'discount_status'   =>$request->discount_status,
                    'min_shopping'   =>$request->min_shopping,
                    'max_discount_amount'   =>$request->max_discount_amount,
                    'date_range'   =>$request->datefilter,
                    'status'   =>$request->status,
                ]);
                Toastr::success('Successfully Updated.');
                return redirect()->route('seller-coupon.index');
            }catch(\Exception $e){
                toastr()->error($e->getMessage());
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
            $data= Coupon::find($id);
            $data->delete();
            Toastr::success('Successfully Deleted.');
            return redirect()->route('seller-coupon.index');
        }else{
            Toastr::error('You are not authenticated.');
            return back();
        }
    }
    public function adminIndex()
    {
        $coupons = Coupon::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('admin.marketing.coupon.index',compact('coupons'));

    }

    public function adminCreate()
    {
        $products = Product::select('name','id')->get();
        return view('admin.marketing.coupon.add',compact('products'));
    }

    public function ProductStore(Request $request)
    {
        try{
        $validate = Validator::make($request->all(), [
            'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,except,id',
            'product_id'        => 'required',
        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $coupon = new Coupon();
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->product_id = $request->product_id;
        $coupon->user_id = auth()->user()->id;
        $coupon->discount = $request->discount;
        $coupon->discount_status = $request->discount_status;
        $coupon->date_range = $request->datefilter;
        $coupon->status = $request->status;
        $coupon->save();

        Toastr::success('Successfully Added.');
        return redirect()->route('admin-coupon.index');
    }catch(\Exception $e){
        toastr()->error($e->getMessage());
        return back();
    }
    }
    public function OrderStore(Request $request)
    {
        try{
        $validate = Validator::make($request->all(), [
            'coupon_code' => 'required|string:255|unique:coupons,coupon_code,except,id',
        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }
        $coupon = new Coupon();
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->min_shopping = $request->min_shopping;
        $coupon->user_id = auth()->user()->id;
        $coupon->discount = $request->discount;
        $coupon->discount_status = $request->discount_status;
        $coupon->max_discount_amount = $request->max_discount_amount;
        $coupon->date_range = $request->datefilter;
        $coupon->status = $request->status;
        $coupon->save();

        Toastr::success('Successfully Added.');
        return redirect()->route('admin-coupon.index');
    }catch(\Exception $e){
        toastr()->error($e->getMessage());
        return back();
    }
    }
    public function adminEdit($id)
    {
        $coupon = Coupon::find($id);
        $products = Product::select('name','id')->get();
        return view('admin.marketing.coupon.edit',compact('products',"coupon"));
    }
    public function adminProductUpdate(Request $request,$id)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,'.$id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $coupon = Coupon::find($id);
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->product_id = $request->product_id;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->date_range = $request->daterange;
            $coupon->status = $request->status;
            $coupon->save();
            Toastr::success('Successfully Updated.');
            return redirect()->route('admin-coupon.index');
    }catch(\Exception $e){
        toastr()->error($e->getMessage());
        return back();
    }
    }
    public function adminOrderUpdate(Request $request,$id)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,'.$id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $coupon = Coupon::find($id);
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->min_shopping = $request->min_shopping;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->max_discount_amount = $request->max_discount_amount;
            $coupon->date_range = $request->daterange;
            $coupon->status = $request->status;
            $coupon->save();
            Toastr::success('Successfully Updated.');
            return redirect()->route('admin-coupon.index');
    }catch(\Exception $e){
        toastr()->error($e->getMessage());
        return back();
    }
    }
    public function adminDelete($id)
    {
        $data= Coupon::find($id);
        $data->delete();
        Toastr::success('Successfully Deleted.');
        return redirect()->route('admin-coupon.index');
    }

}
