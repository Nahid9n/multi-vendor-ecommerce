<?php

namespace App\Http\Controllers;

use App\Mail\CustomerRegistrationMail;
use App\Models\BillingModel;
use App\Models\Customer;
use App\Models\CustomerAuth;
use App\Models\CustomerWallet;
use App\Models\ShippingsModel;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Validation\Rule;
use function Symfony\Component\HttpFoundation\isSecure;
use Exception;
class CustomerAuthController extends Controller
{
    private $customer,$confirm_password;
    public function index(){

        if(auth()->user()){
            return redirect()->route('customer.dashboard');
        }
        return view('customer.auth.login');
    }
    public function indexRegister(){
        return view('customer.auth.register');
    }
    public function CustomerRegister(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                "name"     =>"required|min:3",
                "email"    =>"required|unique:users,email",
                'password'  => 'required|required_with:confirm_password|same:confirm_password',
                'confirm_password'=>'required|min:6',
            ]);


            if($validate->fails())
            {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back()->withErrors($validate)->withInput();

            }
            //$otp=rand(100000,999999);
            $customer= User::create([
                "name"              =>$request->name,
                "email"             =>$request->email,
                // "password"          =>bcrypt($request->password),
                "password"          => Hash::make($request->password),
                'role'           => 'customer',
                "status"               =>1,
                // 'otp_expired_at'    => Carbon::now()->addMinutes(3)
            ]);

            if(!$customer){
                Toastr::error('Registration Failed');
                // return redirect()->route('customer.otpForm');
                return redirect()->back();
            }

            Customer::create([
                "user_id" => $customer->id
            ]);

            BillingModel::create([
                "customer_id" => $customer->id
            ]);

            ShippingsModel::create([
                "customer_id" => $customer->id
            ]);

            CustomerWallet::create([
                "user_id" => $customer->id,
                "balance" => 0,
            ]);

            // Mail::to($customer->email)->send(new CustomerRegistrationMail($otp));
            Toastr::success('Successfully Register');
            // return redirect()->route('customer.otpForm');
            return redirect()->route('customer.login.page');
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            // return redirect()->route('customer.otpForm');
            return back();
        }


}
public function CustomerOtpForm(){
    return view('customer.auth.otp');
}
public function CustomerOtpVerified(Request $request)
{
    $validate=validator::make($request->all(),[
    'otp'=>'required |digits:6'
    ]);
    if($validate->fails()){
    Toastr::error($validate->getMessageBag());
    }

    $otpExitCustomer=CustomerAuth::where('otp',$request->otp)->first();
    if($otpExitCustomer)
    {
    if($otpExitCustomer->otp_expired_at >=now())
    {
        if ($otpExitCustomer->email_verified_at == null)
            {
                //verify here
                $otpExitCustomer->update([
                    'otp'=>null,
                    'otp_expired_at'=>null,
                    'email_verified_at'=>now(),
                ]);
                toastr()->success('Customer successfully verified.');
                return redirect()->route('customer.login.page');
             }
        }
        toastr()->error('Customer not verfied.');
        return redirect()->back();
    }
    toastr()->error('Invalid Customer.');
    return redirect()->back();
}


    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->getMessageBag()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $customer = User::where('email',$request->email)->first();
        if (isset($customer)){
            if ($customer->status == 1){
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    Toastr::success("Login Successfully");
                    return redirect()->route('customer.dashboard');
                } else {
                    Toastr::error('Invalid email or password');
                    return redirect()->back();
                }
            }
            else{
                Toastr::error('You Are Banned Contact With Admin For More Update.');
                return redirect()->back();
            }
        }
        else{
            Toastr::error('You Are Not Registered.');
            return redirect()->back();
        }
    }
    public function logout(){

        Auth::logout();
        Toastr::success("Logout Successfully");
        return redirect('/');
    }

}
