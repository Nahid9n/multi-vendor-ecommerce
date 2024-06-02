<?php

namespace App\Http\Controllers;

use App\Models\SellerPayment;
use App\Models\VendorPaymentInfo;
use App\Models\vendorWallet;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class VendorWalletController extends Controller
{
    public function wallet(){
        $vendor = vendorWallet::where('user_id',auth()->user()->id)->first();
        $vendorPaymentInfo = VendorPaymentInfo::where('user_id',auth()->user()->id)->first();
        $vendors = SellerPayment::latest()->get();

        return view('seller.wallet.index',compact("vendor","vendors","vendorPaymentInfo"));
    }
    public function withdrawalRequest(Request $request){
        $balance = vendorWallet::where('user_id',auth()->user()->id)->first();
        if ($balance){
            if ($request->withdrawal_amount > $balance->balance){
                toastr()->error('Not Enough Funds.');
                return back();
            }
            try {
                $validate = Validator::make($request->all(),[
                    "withdrawal_amount"          =>"required",
                ]);

                if($validate->fails())
                {
                    toastr()->error($validate->messages());
                    return redirect()->back();

                }
                $vendorPaymentInfo = VendorPaymentInfo::where('user_id',auth()->user()->id)->first();
                if ($vendorPaymentInfo->payment_method != ''){
                    $seller = new SellerPayment();
                    $seller->user_id = auth()->user()->id;
                    $seller->payment_method = $vendorPaymentInfo->payment_method;
                    $seller->account_holder_name = $vendorPaymentInfo->account_holder_name;
                    $seller->account_number = $vendorPaymentInfo->account_number;
                    $seller->branch = $vendorPaymentInfo->branch;
                    $seller->withdrawal_amount = $request->withdrawal_amount;
                    $seller->save();
                }
                else{

                    toastr()->error('Add Payment Info First.');
                    return back();
                }

                toastr()->success('Withdrawal Request Sent Successfully Wait For Admin Approval.');
                return back();
            }
            catch (Exception $e){
                toastr()->error($e->getMessage());
                return back();
            }
        }
        else{
            toastr()->error('Not Enough Funds');
            return back();
        }
    }
    public function withdrawalDetails($id){
        $withdraw = SellerPayment::find($id);
        return view('seller.wallet.details',compact("withdraw"));
    }
}
