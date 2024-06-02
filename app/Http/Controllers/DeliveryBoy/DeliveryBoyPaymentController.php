<?php

namespace App\Http\Controllers\DeliveryBoy;
use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use App\Models\DeliveryBoyOrder;
use App\Models\DeliveryBoyPayment;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\User;
use Illuminate\Validation\Rule;

class DeliveryBoyPaymentController extends Controller
{
    public function paymentInfoPage(){
        $deliveryBoy = User::where('id',auth()->user()->id)->first();
        $deliveryBoyPaymentInfo = DeliveryBoy::where('user_id',auth()->user()->id)->first();
        return view('deliveryBoy.payment.index',compact("deliveryBoyPaymentInfo","deliveryBoy"));
    }
    public function paymentInfo(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "payment_method"          =>"required|min:3",
                "account_holder_name"         =>"required|",
                'account_number'          => 'required|unique:delivery_boys,account_number',
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $deliveryBoy = DeliveryBoy::where('user_id',$id)->first();
            $deliveryBoy->payment_method = $request->payment_method;
            $deliveryBoy->account_holder_name = $request->account_holder_name;
            $deliveryBoy->account_number = $request->account_number;
            $deliveryBoy->branch = $request->branch;
            $deliveryBoy->save();

            toastr()->success('Payment Info Added Successfully.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }
    public function paymentInfoUpdate(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "payment_method"          =>"required|min:3",
                "account_holder_name"         =>"required",
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $deliveryBoy = DeliveryBoy::where('user_id',$id)->first();
            $deliveryBoy->payment_method = $request->payment_method;
            $deliveryBoy->account_holder_name = $request->account_holder_name;
            $deliveryBoy->account_number = $request->account_number;
            $deliveryBoy->branch = $request->branch;
            $deliveryBoy->save();

            toastr()->success('Payment Info Update Successfully.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function withdrawalRequest(Request $request){
        $balance = DeliveryBoyOrder::where('user_id',auth()->user()->id)->first();
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
                $deliveryBoyInfo = DeliveryBoy::where('user_id',auth()->user()->id)->first();
                if ($deliveryBoyInfo->payment_method != ''){
                    $deliveryBoy = new DeliveryBoyPayment();
                    $deliveryBoy->user_id = auth()->user()->id;
                    $deliveryBoy->payment_id = rand();
                    $deliveryBoy->payment_method = $deliveryBoyInfo->payment_method;
                    $deliveryBoy->account_holder_name = $deliveryBoyInfo->account_holder_name;
                    $deliveryBoy->account_number = $deliveryBoyInfo->account_number;
                    $deliveryBoy->branch = $deliveryBoyInfo->branch;
                    $deliveryBoy->withdrawal_amount = $request->withdrawal_amount;
                    $deliveryBoy->save();

                    $deliveryBoyBalance = DeliveryBoyOrder::where('user_id',$deliveryBoyInfo->user_id)->first();
                    $deliveryBoyBalance->balance = $deliveryBoyBalance->balance - $request->withdrawal_amount;
                    $deliveryBoyBalance->save();
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
        $withdraw = DeliveryBoyPayment::find($id);
        return view('deliveryBoy.wallet.details',compact("withdraw"));
    }
    public function deliveryBoyWithdrawalDetails($id){
        $withdraw = DeliveryBoyPayment::find($id);
        return view('admin.delivery-boy.details',compact("withdraw"));
    }
    public function statusChangePayment(Request $request,$id){

        $deliveryBoyPayment = DeliveryBoyPayment::find($id);

        if ($deliveryBoyPayment->status == 0){
            if ($request->status == 1){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->total_withdraw = $deliveryBoyWallet->total_withdraw + $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }
            if ($request->status == 2){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->balance = $deliveryBoyWallet->balance + $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }
        }
        if ($deliveryBoyPayment->status == 1){
            if ($request->status == 0){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->total_withdraw = $deliveryBoyWallet->total_withdraw - $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }
            if ($request->status == 2){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->balance = $deliveryBoyWallet->balance + $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->total_withdraw = $deliveryBoyWallet->total_withdraw - $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }
        }
        if ($deliveryBoyPayment->status == 2){
            if ($request->status == 1){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->balance = $deliveryBoyWallet->balance - $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->total_withdraw = $deliveryBoyWallet->total_withdraw + $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }
            if ($request->status == 0){
                $deliveryBoyWallet = DeliveryBoyOrder::where('user_id',$deliveryBoyPayment->user_id)->first();
                $deliveryBoyWallet->balance = $deliveryBoyWallet->balance - $deliveryBoyPayment->withdrawal_amount;
                $deliveryBoyWallet->save();
            }

        }

        $deliveryBoyPayment->status = $request->status;
        $deliveryBoyPayment->save();

        toastr()->success('Payment Status Change Successfully.');
        return back();
    }
    public function attachmentPayment(Request $request,$id){
        $payment = DeliveryBoyPayment::find($id);
        if ($request->file('image')){
            if (file_exists($payment->image)){
                unlink($payment->image);
            }
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $directory = 'uploads/delivery-Boy-Payment-Prove/';
            $image->move($directory,$imageName);
            $imageUrl = $directory.$imageName;
            $payment->image = $imageUrl;
        }
        $payment->save();
        toastr()->success('Attachment Added Successfully.');
        return back();
    }

}
