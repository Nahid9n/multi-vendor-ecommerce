<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SellerCommission;
use Illuminate\Http\Request;

class SellerCommissionController extends Controller
{
    public function index(){
        return view('admin.Sellers.commission.index',[
            'commission'=>SellerCommission::first(),
        ]);
    }
    public function commissionStatusUpdate(Request $request,$id){
        $commission = SellerCommission::find($id);
        if ($request->commission_status){
            $commission->commission_status = $request->commission_status;
            $commission->save();
            toastr()->success('Seller Commission Save Successfully.');
            return back();
        }
        $commission->commission_status = 0;
        $commission->save();
        toastr()->success('Seller Commission Save Successfully.');
        return back();
    }
    public function commissionUpdate(Request $request,$id){
        $commission = SellerCommission::find($id);
        $commission->seller_commission = $request->seller_commission;
        if ($commission->previous_seller_commission == 0){
            $commission->previous_seller_commission = $request->seller_commission;
            $commission->save();
            toastr()->success('Seller Commission Save Successfully.');
            return back();
        }
        $commission->previous_seller_commission = $request->previous_seller_commission;
        $commission->save();
        toastr()->success('Seller Commission Save Successfully.');
        return back();
    }
    public function withdrawAmountUpdate(Request $request,$id){
        $commission = SellerCommission::find($id);
        $commission->withdraw_seller_amount = $request->withdraw_seller_amount;
        $commission->save();
        toastr()->success('withdraw seller amount save successfully.');
        return back();
    }
    public function categoryBaseCommission(Request $request,$id){

        $commission = SellerCommission::find($id);
        $commission->previous_seller_commission = $request->previous_seller_commission;
        if ($request->category_based_commission){
            $commission->seller_commission = 0;
            $commission->category_based_commission = $request->category_based_commission;
            $commission->save();
            toastr()->success('category base commission status change successfully.');
            return back();
        }

        $commission->seller_commission = $request->seller_commission;
        $commission->category_based_commission = 0;
        $commission->save();
        toastr()->success('category base commission status change successfully.');
        return back();
    }

}
