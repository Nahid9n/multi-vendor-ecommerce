<?php

namespace App\Http\Controllers;

use App\Models\SellerPayment;
use App\Models\VendorPaymentInfo;
use App\Models\vendorWallet;
use Illuminate\Http\Request;

class SellerPaymentController extends Controller
{
    public function paymentInfo(){
        $vendorPayment = VendorPaymentInfo::where('user_id',auth()->user()->id)->first();
        return view('seller.payment.info',compact("vendorPayment"));
    }
    public function paymentInfoStore(Request $request){
            $vendorPayment = new VendorPaymentInfo();
            $vendorPayment->user_id	                = auth()->user()->id;
            $vendorPayment->payment_method	        = $request->payment_method;
            $vendorPayment->account_holder_name	    = $request->account_holder_name;
            $vendorPayment->account_number          = $request->account_number;
            $vendorPayment->branch                  = $request->branch;
            $vendorPayment->save();
            toastr()->success('add payment info successfully.');
            return redirect()->route('seller.payment.info');
    }
    public function paymentInfoUpdate(Request $request,$id){
        $vendorPayment = VendorPaymentInfo::find($id);
        $vendorPayment->payment_method	        = $request->payment_method;
        $vendorPayment->account_holder_name	    = $request->account_holder_name;
        $vendorPayment->account_number          = $request->account_number;
        $vendorPayment->branch                  = $request->branch;
        $vendorPayment->save();
        toastr()->success('update payment info successfully.');
        return redirect()->route('seller.payment.info');
    }

    public function allPayment(){
        return view('admin.Sellers.payout.index',[
            'sellers'=>SellerPayment::latest()->get(),
        ]);
    }
    public function pendingPayment(){
        return view('admin.Sellers.payout.index',[
            'sellers'=>SellerPayment::where('status',0)->latest()->get(),
        ]);
    }

    public function cancel(){
        return view('admin.Sellers.payout.index',[
            'sellers'=>SellerPayment::where('status',2)->latest()->get(),
        ]);
    }
    public function completePayment(){
        return view('admin.Sellers.payout.index',[
            'sellers'=>SellerPayment::where('status',1)->latest()->get(),
        ]);
    }

    public function statusChangePayment(Request $request,$id){

        $sellerPayment = SellerPayment::find($id);

        if ($sellerPayment->status == 0){
            if ($request->status == 1){
                $sellerWallet = vendorWallet::where('user_id',$sellerPayment->user_id)->first();
                $sellerWallet->balance = $sellerWallet->balance - $sellerPayment->withdrawal_amount;
                $sellerWallet->total_withdraw = $sellerWallet->total_withdraw + $sellerPayment->withdrawal_amount;
                $sellerWallet->save();
            }
        }
        if ($sellerPayment->status == 1){
            if ($request->status == 0){
                $sellerWallet = vendorWallet::where('user_id',$sellerPayment->user_id)->first();
                $sellerWallet->balance = $sellerWallet->balance + $sellerPayment->withdrawal_amount;
                $sellerWallet->total_withdraw = $sellerWallet->total_withdraw - $sellerPayment->withdrawal_amount;
                $sellerWallet->save();
            }
            if ($request->status == 2){
                $sellerWallet = vendorWallet::where('user_id',$sellerPayment->user_id)->first();
                $sellerWallet->balance = $sellerWallet->balance + $sellerPayment->withdrawal_amount;
                $sellerWallet->total_withdraw = $sellerWallet->total_withdraw - $sellerPayment->withdrawal_amount;
                $sellerWallet->save();
            }
        }
        if ($sellerPayment->status == 2){
            if ($request->status == 1){
                $sellerWallet = vendorWallet::where('user_id',$sellerPayment->user_id)->first();
                $sellerWallet->balance = $sellerWallet->balance - $sellerPayment->withdrawal_amount;
                $sellerWallet->total_withdraw = $sellerWallet->total_withdraw + $sellerPayment->withdrawal_amount;
                $sellerWallet->save();
            }
        }

        $sellerPayment->status = $request->status;
        $sellerPayment->save();

        toastr()->success('Payment Status Change Successfully.');
        return back();
    }
    public function attachmentPayment(Request $request,$id){

        $payment = SellerPayment::find($id);
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'uploads/seller-Payment-Prove/';
        $image->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        if ($request->file('image')){
            if (file_exists($payment->image)){
                unlink($payment->image);
            }
            $payment->image = $imageUrl;
            $payment->save();
        }

        toastr()->success('Attachment Added Successfully.');
        return back();
    }
    public function sellerWithdrawalDetails($id){
        $withdraw = SellerPayment::find($id);
        return view('admin.Sellers.payout.details',compact("withdraw"));
    }

}
