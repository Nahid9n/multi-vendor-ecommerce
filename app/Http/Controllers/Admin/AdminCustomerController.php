<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCustomer;
use App\Models\BillingModel;
use App\Models\Customer;
use App\Models\CustomerAuth;
use App\Models\CustomerWallet;
use App\Models\ShippingsModel;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Exception;
class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $customer;
    public function index()
    {
        return view('admin.customer.index',[
            'customers'=>  User::where('role','customer')->orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "required|min:3",
            "email" => "required|unique:users,email",
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:8'
        ]);
        if ($validate->fails()) {
            Toastr::error($validate->getMessageBag()->first());
            return redirect()->back()->withErrors($validate)->withInput();
        }

        try {
            $customer= User::create([
                "name"              =>$request->name,
                "email"             =>$request->email,
                "password"          => Hash::make($request->password),
                'role'           => 'customer',
                'status'           => 1,
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

            toastr()->success('customer added successfully.');
            return back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(AdminCustomer $adminCustomer)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCustomer $adminCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminCustomer $adminCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CustomerAuth::deleteCustomer($id);
        return back()->with('message','Customer Info Delete Successfully.');
    }
    public function banCustomer(Request $request,$id){
        $customer = User::find($id);
        $customer->status = $request->status;
        $customer->save();

        $customerDetail = Customer::where('user_id',$id)->first();
        $customerDetail->status = $request->status;
        $customerDetail->save();
        if ($request->status == 1){
            Toastr::success("Active Customer Successfully");
        }
        else{
            Toastr::success("Banned Customer Successfully");
        }
        return redirect()->back();
    }
    /*public function loginAsCustomer(Request $request){
        $customer = User::where('email',$request->email)->first();
        $credentials = array('email'=> $customer->email,'password'=>$customer->password);
        if (Auth::attempt($credentials)) {
            Toastr::success("Login Successfully");
            return redirect()->route('customer.dashboard');
        }
        else {
            Toastr::error('Invalid email or password');
            return redirect()->back();
        }
        if ($this->customer){
                Session::put('customer_name',$this->customer->name);
                Session::put('customer_id',$this->customer->id);
                Session::put('customer_email',$this->customer->email);
                Session::put('customer_mobile',$this->customer->mobile);
                return redirect()->route('customer.dashboard');
            }
        else{
            return back()->with('message','sorry....invalid email.');
        }
    }*/
}
