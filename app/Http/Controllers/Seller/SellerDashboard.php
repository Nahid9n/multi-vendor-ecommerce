<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerFormVerificationField;
use App\Models\Upload;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class SellerDashboard extends Controller
{
    public function sellerDashboard(){
        $product = Product::where('role','seller')->where('user_id',auth()->user()->id)->get();
        $order   = Order::where('user_id',auth()->user()->id)->get();
        return view('seller.Layout.app',compact('product','order'));
    }
    public function profileVerifyForm(){

        if(auth()->user()->profile_verified == 0){
            try{
                $seller        = Seller::where('user_id',auth()->user()->id)->first();
                $verify_id     = SellerFormVerificationField::select('id')->get();
                $multi_selects = SellerFormVerificationField::where('type','multi_select')->get();
                $selects       = SellerFormVerificationField::where('type','select')->get();
                $radios        = SellerFormVerificationField::where('type','radio')->get();
                $files         = SellerFormVerificationField::where('type','file')->get();
                $verify_fields = SellerFormVerificationField::whereNotIn('type',['multi_select','select','radio','file'])->get();
                return view('seller.profile.verify_profile',compact('seller','verify_fields','multi_selects','selects','radios','files','verify_id'));
            }catch(Exception $e){
                Toastr::error($e->getMessage());
                return back();
            }
        }else{
            Toastr::error('You are already profile verified.');
            return back();
        }
    }
    public function profileVerify(Request $request)
    {
        if(auth()->user()->profile_verified == 0){
            try{
                $rules = [];
                foreach ($request->all() as $key => $value) {
                    $rules[$key] = 'required';
                }
                $validate = Validator::make($request->all(), $rules);
                if($validate->fails()){
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()->withErrors($validate)->withInput();;
                }
                $seller = Seller::where('user_id',auth()->user()->id)->first();
                    if($seller){
                        $sellerUpdate = $request->except(['_token','_method']);
                        $hasFile = false;
                        $inputs = $request->all();
                        $files =[];
                        $input_names=[];
                        foreach ($inputs as $inputName => $inputValue) {
                            if ($request->hasFile($inputName)) {
                                $file = $request->file($inputName);
                                array_push($input_names, $inputName);
                               $hasFile = true;
                               $fileName = $file->getClientOriginalName();
                              $file->move(public_path('uploads/profile_verify'), $fileName);
                                array_push($files, $fileName);
                            }
                        }
                       $result= array_combine($input_names,$files);
                       $data =$result + $sellerUpdate;
                        $seller->update([
                            'verify_field' => json_encode($data)
                        ]);

                        $user = User::find(auth()->user()->id);
                        $user->update([
                            'profile_verified'=> 1,
                        ]);

                    }
                    Toastr::success('Profile Successfully Verified.');
                    return redirect()->route('seller.dashboard');
            }catch(Exception $e){
                toastr()->error($e->getMessage());
                return back();
            }
        }else{
            Toastr::error('You are already profile verified.');
            return back();
        }
    }
    public function SellerProfile()
    {
        return view("seller.profile.index");
    }

    public function SellerUpdateProfile(Request $request)
    {
        try{
            $user = User::find(auth()->user()->id);
            if(isset($request->image))
            {
                $image = Upload::find($request->image);
                $imageName = $image->file;
                $user->update([
                    "image" => $imageName,
                ]);
            }
            $user->update([
                "name"          => $request->name,
                "date_of_birth" => $request->date_of_birth,
                "phone_number"  => $request->phone_number,
                "gender"        => $request->gender,
            ]);
            Toastr::success('Profile Successfully Updated.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }
    public function SellerChangePassword (Request $request)
    {
        try{
            $user= User::find(auth()->user()->id);
            if (password_verify($request->old_password, $user->password)) {
                $validate = Validator::make($request->all(), [
                    'old_password'     => 'required',
                    'new_password'     => 'required|required_with:confirm_password|same:confirm_password',
                    'confirm_password' => 'min:6',
                ]);
                if ($validate->fails()) {
                    Toastr::error($validate->getMessageBag()->first());
                    return redirect()->back()->withErrors($validate)->withInput();
                }
                $user->update([
                       'password'  =>bcrypt($request->new_password)
                   ]);
                   Toastr::success('Password changed Successfully.');
                   return redirect()->back();
            }else{
                toastr()->error('The old password is incorrect');
                return back()->withErrors(['old_password' => 'The old password is incorrect.']);
            }
        }catch(Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
}

