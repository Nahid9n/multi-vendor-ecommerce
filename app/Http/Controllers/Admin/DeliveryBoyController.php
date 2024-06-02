<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use App\Models\DeliveryBoyOrder;
use App\Models\DeliveryBoyPayment;
use App\Models\Order;
use App\Models\Seller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Exception;

class DeliveryBoyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.delivery-boy.index',[
            'deliveryBoys'=>DeliveryBoy::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.delivery-boy.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                "name"  => "required|min:3",
                "email" => "required|unique:users,email",
                'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required|min:8'
            ]);
            if ($validate->fails()) {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back()->withErrors($validate)->withInput();
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = $request->role;
            $user->email_verified_at = Carbon::now();
            $user->status = 1;
            $user->save();

            $deliveryBoy = User::where('email', $request->email)->first();

            $delivery = new DeliveryBoy();
            $delivery->owner_id = $request->owner_id;
            $delivery->user_id = $deliveryBoy->id;
            $delivery->name = $request->name;
            if ($request->file('image')){
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $directory = 'uploads/delivery-boy/';
                $image->move($directory,$imageName);
                $imageUrl = $directory.$imageName;
                $delivery->image = $imageUrl;
            }
            $delivery->designation = 'DeliveryBoy';
            $delivery->save();

            $deliveryBoyOrder = new DeliveryBoyOrder();
            $deliveryBoyOrder->user_id = $deliveryBoy->id;
            $deliveryBoyOrder->save();


            toastr()->success('Delivery Boy has been successfully created.');
            return redirect()->route('delivery-boy.index');
        }
         catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryBoy $deliveryBoy)
    {
//        dd($deliveryBoy);
        $deliveryBoyDetail = DeliveryBoyOrder::where('user_id',$deliveryBoy->user_id)->first();
        return view('admin.delivery-boy.show',[
            'deliveryBoy'=>$deliveryBoy,
            'deliveryBoyDetail'=>$deliveryBoyDetail,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryBoy $deliveryBoy)
    {
        return view('admin.delivery-boy.edit',[
            'deliveryBoy'=>DeliveryBoy::find($deliveryBoy->id),
        ]);
    }
    public function editInfo($id)
        {
            $deliveryBoy = User::find($id);

            return view('admin.delivery-boy.edit-info',[
                'deliveryBoy'=>$deliveryBoy,
            ]);
        }
    public function updateInfo(Request $request,$id)
        {
            try {
                DeliveryBoy::updateInfo($request,$id);
                toastr()->success('Delivery Boy has been successfully Updated.');
                return redirect()->route('delivery-boy.index');
            }
            catch (Exception $exception){
                toastr()->error($exception->getMessage());
                return back();

            }
        }

    /**
     * Update the specified resource in storage.
     */
//    public function update(Request $request, DeliveryBoy $deliveryBoy)
//    {
//        try{
//            $this->validate($request,[
//                'name'=>'required | max:255',
//                'mobile' => 'digits:11|unique:delivery_boys,mobile,' . $deliveryBoy->id,
//                'email' => 'unique:delivery_boys,email,' . $deliveryBoy->id,
//                'gender'=>'required',
//            ],[
//                'name.required'=>'name field is required',
//                'mobile.required'=>'mobile field is required',
//                'mobile.digits'=>'mobile Number 11 Digits',
//                'mobile.unique'=>'this mobile number is already have',
//                'email.unique'=>'this email is already have',
//                'gender.required'=>'gender field is required',
//            ]);
//
//            DeliveryBoy::updateDeliveryBoy($request,$deliveryBoy->id);
//            toastr()->success("update delivery boy info successfully.");
//            return redirect('delivery-boy.index');
//
//        }
//        catch(Exception $e){
//            toastr()->error($e->getMessage());
//            return back();
//        }
//    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryBoy $deliveryBoy)
    {
        DeliveryBoy::deleteDeliveryBoy($deliveryBoy->id);
        toastr()->success("Delivery Boy info delete Successfully.");
        return back();
    }
    public function banDeliveryBoy(Request $request,$id)
    {
        try {

            $user = User::find($id);
            $user->update([
                "status" => $request->status,
            ]);

            $deliveryBoy = DeliveryBoy::where('user_id', $id)->first();
            $deliveryBoy->update([
                "status" => $request->status,
            ]);
            if ($deliveryBoy->status == 1){
                toastr()->success($deliveryBoy->name.' Delivery Boy has successfully Active.');
                return redirect()->route('delivery-boy.index');
            }
            toastr()->error($deliveryBoy->name.' Delivery Boy has successfully banned.');
            return redirect()->route('delivery-boy.index');
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }

    public function updateProfile(Request $request, $id)
    {
        try {
            $this->validate($request,[
                'name'=>'required | max:255',
                'mobile' => 'digits:11|unique:delivery_boys,mobile,' . $id,
                'email' => 'unique:delivery_boys,email,' . $id,
                'gender'=>'required',
            ],[
                'name.required'=>'name field is required',
                'mobile.required'=>'mobile field is required',
                'mobile.digits'=>'mobile Number 11 Digits',
                'mobile.unique'=>'this mobile number is already have',
                'email.unique'=>'this email is already have',
                'gender.required'=>'gender field is required',
            ]);
            DeliveryBoy::updateDeliveryBoy($request,$id);
            toastr()->success("update delivery boy info successfully.");
            return back();
        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }

    public function allPayment(){
        return view('admin.delivery-boy.payment-history',[
            'deliveryBoys'=>DeliveryBoyPayment::latest()->get(),
        ]);
    }
    public function pendingPayment(){
        return view('admin.delivery-boy.payment-history',[
            'deliveryBoys'=>DeliveryBoyPayment::where('status',0)->latest()->get(),
        ]);
    }

    public function collectedHistory(){
        return view('admin.delivery-boy.collected-history',[
            'deliveryBoys'=>Order::where('delivery_status',3)->latest()->paginate(20),
        ]);
    }
    public function cancel(){
        return view('admin.delivery-boy.payment-history',[
            'deliveryBoys'=>DeliveryBoyPayment::where('status',2)->latest()->get(),
        ]);
    }
    public function completePayment(){
        return view('admin.delivery-boy.payment-history',[
            'deliveryBoys'=>DeliveryBoyPayment::where('status',1)->latest()->get(),
        ]);
    }

}
