<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Mail\SellerForgotPasswordMail;
use App\Mail\SellerRegistrationMail;
use App\Models\FeatureActivation;
use App\Models\Seller;
use App\Models\SellerShopSetting;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    public function sellerRegistrationForm()
    {

        return view("admin.Sellers.auth.register");
    }
    public function sellerRegistration(Request $request)
    {
        try{
           $validator = Validator::make($request->all(),[
               'name'       => 'required|string|max:255',
               'email'      => 'required|string|max:255|unique:users,email,except,id',
               'password'   => 'required|required_with:confirm_password|same:confirm_password',
               'confirm_password'=> 'min:6',
               'shop_name'  => 'required|string|max:255|unique:sellers,shop_name,except,id',
               'address'    => 'required|string|max:255',
               'terms_policy' => 'required',
           ]);
           if($validator->fails()){
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back()->withErrors($validator)->withInput();
           }
           $activation = FeatureActivation::where('name','Email_Verification')->where('type','Business Related')->first();
           if($activation->status ==1){
               $role = 'seller';
               $token = Str::random(32);
               $user = User::create([
                   'name'              => $request->name,
                   'email'             => $request->email,
                   'password'          => bcrypt($request->password),
                   'token'             => $token,
                   'token_expired_at'  => Carbon::now()->addMinutes(3),
                   'role'              => $role,
               ]);
               $seller = User::where('email', $request->email)->exists();
               if ($seller) {
                   $seller = Seller::create([
                       "user_id"    => $user->id,
                       "shop_name"  => $request->shop_name,
                       "address"  => $request->address,
                       "terms_policy"=> $request->terms_policy,
                   ]);
                   SellerShopSetting::create([
                       'seller_id' =>$seller->id,
                   ]);

                   $link = route('seller.registrationVerify', $token);
                   Mail::to($user->email)->send(new SellerRegistrationMail($link));
                   Toastr::success('Successfully Register.');
                   return back();
               }else{
                   Toastr::success('Yor are not Vendor.');
                   return back();
               }

           }else{
            $role = 'seller';
               $user = User::create([
                   'name'              => $request->name,
                   'email'             => $request->email,
                   'password'          => bcrypt($request->password),
                   'email_verified_at' => Carbon::now(),
                   'role'              => $role,
               ]);
               $seller = User::where('email', $request->email)->exists();
               if ($seller) {
                   $seller = Seller::create([
                       "user_id"    => $user->id,
                       "shop_name"  => $request->shop_name,
                       "address"  => $request->address,
                       "terms_policy"=> $request->terms_policy,
                   ]);
                   SellerShopSetting::create([
                       'seller_id' =>$seller->id,
                   ]);

                   Toastr::success('Successfully Register.');
                   return back();
               }else{
                   Toastr::success('Yor are not Vendor.');
                   return back();
               }
           }

        }catch (Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function sellerRegistrationVerify($token)
    {
        $seller = User::where('token', $token)->whereDate('token_expired_at', '=', now())
            ->whereTime('token_expired_at', '>=', now())
            ->first();
        if ($seller) {
            $seller->update([
                'token' => null,
                'token_expired_at' => null,
                'email_verified_at' => Carbon::now(),
            ]);
            toastr()->success('Successfully verified.');
            return redirect()->route('seller.loginForm');
        }
        toastr()->error('No user OR You are not seller.');
        return redirect()->route('seller.registrationForm');
    }
    public function sellerLoginForm()
    {
        return view("admin.Sellers.auth.login");
    }
    public function sellerLogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required|min:6",
        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $credentials = $request->only('email', 'password');
        $seller_user = User::where('email',$request->email)
                            ->where('role','seller')
                            // ->where('email_verified_at','!=', null)
                            ->first();

        if($seller_user){
            if (auth()->attempt($credentials)) {
                Toastr::success('Successfully Login.');
                return redirect()->route('seller.dashboard');
            }
             Toastr::error('Invalid Credentials.');
             return back();
        }
        Toastr::error('Yor are not Register.');
        return back();
    }
    public function SellerLogout()
    {
        Auth::logout();

        Toastr::success('Seller Logout');
        return redirect()->route('seller.loginForm');
    }

    public function SellerForgotPasswordForm()
    {
        return view("admin.Sellers.auth.forgot-password");
    }
    public function sellerSendResetPasswordLink(Request $request)
    {
        $validate = validator::make(request()->all(), [
            'email' => 'required|email',
        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag());
            return redirect()->back();
        }
        $seller = Seller::where('email', $request->email)->first();
        if ($seller) {
            $token = str::random(32);
            $seller->update([
                'token' => $token,
                'token_expired_at' => Carbon::now()->addMinutes(3),
            ]);
            $link = route('click.reset.link', $token);

            Mail::to($seller->email)->send(new SellerForgotPasswordMail($link));

            Toastr::success('Reset link sent to your email.');
            return redirect()->back();
        }
        Toastr::error('No User Found');
        return redirect()->back();
    }
    public function clickResetLink($token)
    {
        $seller = Seller::where('token', $token)->whereDate('token_expired_at', '=', now())
            ->whereTime('token_expired_at', '>=', now())
            ->first();


        if ($seller) {
            return view('admin.Sellers.auth.confirm_password', compact('token'));
        }
        Toastr::error('Token Expired or Invalid Seller');
        return redirect()->route('seller.loginForm');

    }
    public function SellerResetPassword(Request $request, $token)
    {
        /*  $validate=Validator::make($request->all(),[
             'password'=>'required|confirmed'
         ]);

         if($validate->fails())
         {
           Toastr::error($validate->getMessageBag());
           return redirect()->back();
         } */

        $seller = Seller::where('token', $token)->first();
        if ($seller) {
            $seller->update([
                'password' => bcrypt($request->password),
                'token' => null,
            ]);

            Toastr::success('Your password reset successfully.');
            return redirect()->route('seller.loginForm');
        }
        Toastr::success('Invalid Seller password');
        return redirect()->route('seller.loginForm');

    }
    public function index()
    {
        $users = User::where('role','seller')->where('profile_verified',1)->orderBy('id', 'desc')->get();
        return view("admin.Sellers.all_seller.index", compact('users'));
    }
    public function list()
    {
        $users = User::where('role','seller')->orderBy('id', 'desc')->get();
        return view("admin.Sellers.all_seller.list",compact('users'));
    }
    public function create()
    {
        return view("admin.Sellers.all_seller.create");
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                "name" => "required|min:1",
                "email" => "required|unique:users,email",
                'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required|min:6',
                'shop_name' => 'required',
                'address' => 'required'
            ]);
            if ($validate->fails()) {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back()->withErrors($validate)->withInput();
            }
           $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "email_verified_at" => Carbon::now(),
                "profile_verified" =>1,
                'status'   =>1,
                "role" => $request->role,
            ]);
            Seller::create([
                'user_id'   =>$user->id,
                'shop_name' =>$request->shop_name,
                'address'   =>$request->address,
                'verify_field' =>json_encode([
                    'added_by' => 'admin',
                    'verify_at' => 'admin',
                ])
            ]);


            toastr()->success('Seller has been successfully created.');
            return redirect()->route('seller.list');
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function sellerVerifyProfile($id)
    {
        $user= User::find($id);
        $seller = Seller::where('user_id',$user->id)->first();
        $verify_profile = json_decode($seller->verify_field, true);
        return view("admin.Sellers.all_seller.profile", compact("verify_profile","user","seller"));
    }
    public function show($sellerId)
    {
    }
    public function edit($sellerId)
    {
        $seller = Seller::find($sellerId);
        return view("admin.Sellers.all_seller.edit", compact("seller"));
    }
    public function update(Request $request, $sellerId)
    {
        try {
            $seller = Seller::find($sellerId);
            $validate = Validator::make($request->all(), [
                "first_name" => "required|min:3",
                "last_name" => "required|min:3",
                "email" => "required",
                "password" => "required|min:6",
                "phone" => "required",
                "dob" => "required|date",
                "address" => "required|string|max:255",
                'gender' => 'required|in:Male,Female,Other',
                'join_date' => 'required|date',
                'shop_name' => 'required|string',
                'status' => 'required|in:0,1',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back();
            }

            $imageName = $request->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/sellers'), $imageName);
            }

            $seller->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "DOB" => $request->dob,
                "address" => $request->address,
                "phone" => $request->phone,
                "gender" => $request->gender,
                "join_date" => $request->join_date,
                "shop_name" => $request->shop_name,
                "added_by" => auth()->user()->name,
                "image" => $imageName,
            ]);
            Toastr::success('Seller has been successfully updated.');
            return redirect()->route('seller.index');

        } catch (Exception $e) {
            Log::error("Something went wrong!" . $e->getMessage());
            return redirect()->back();
        }

    }
    public function statusChange(Request $request, $id)
    {
        $seller = User::find($id);
        $seller->status = $request->status;
        $seller->save();
        toastr()->success('status change successfully.');
        return redirect()->back();
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->update([
            'profile_verified' => 0,
        ]);
        $seller = Seller::where('user_id',$user->id)->first();
        if ($seller) {
            $seller->verify_field = null;
            $seller->save();
        }
        toastr()->success('Seller has been successfully deleted.');
        return redirect()->back();
    }
    /* =====================================================
        Seller Profile
    ======================================================
    */
    public function SellerProfile($id)
    {
        $seller = Seller::find($id);
        return view("admin.Sellers.profile.index", compact('seller'));
    }

    public function SellerUpdateProfile(Request $request, $id)
    {
        // dd($request->all());
        $seller = Seller::find($id);
        $seller->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "DOB" => $request->dob,
            "address" => $request->address,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "shop_name" => $request->shop_name,
        ]);
        Toastr::success('Seller Profile successfully updated.');
        return redirect()->back();

    }
    public function SellerChangePassword(Request $request, $id)
    {
        $seller = Seller::find($id);
        $seller->update([
            'password' => bcrypt($request->new_password)
        ]);
        Toastr::success('Seller Password change successfully.');
        return redirect()->back();

    }
}
