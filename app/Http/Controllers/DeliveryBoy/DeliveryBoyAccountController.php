<?php

namespace App\Http\Controllers\DeliveryBoy;

use App\Http\Controllers\Controller;
use App\Models\DeliveryBoy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class DeliveryBoyAccountController extends Controller
{
    private function getImage($request){
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $directory = 'uploads/delivery-boy/';
        $image->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        return $imageUrl;
    }
    public function manageDeliveryBoy(){
        return view('deliveryBoy.account.index',[
            'deliveryBoy' => User::where('id',auth()->user()->id)->first(),
        ]);
    }

    public function updateDeliveryBoy(Request $request,$id){

        $deliveryBoy = DeliveryBoy::find($id);
        $user = User::where('id',$deliveryBoy->user_id)->first();
        $user->name = $request->name;
        $user->save();

        $deliveryBoy->name = $request->name;
        if ($request->file('image')){
            if (file_exists($deliveryBoy->image)){
                unlink($deliveryBoy->image);
            }
            $deliveryBoy->image = $this->getImage($request);
        }
        $deliveryBoy->mobile = $request->mobile;
        $deliveryBoy->designation = $request->designation;
        $deliveryBoy->blood = $request->blood;
        $deliveryBoy->date = $request->date;
        $deliveryBoy->present_address = $request->present_address;
        $deliveryBoy->permanentAddress = $request->permanentAddress;
        $deliveryBoy->gender = $request->gender;
        $deliveryBoy->short_description = $request->short_description;
        $deliveryBoy->biography = $request->biography;
        $deliveryBoy->experience = $request->experience;
        $deliveryBoy->facebook = $request->facebook;
        $deliveryBoy->twitter = $request->twitter;
        $deliveryBoy->linkedIn = $request->linkedIn;
        $deliveryBoy->website = $request->website;
        $deliveryBoy->save();
        toastr()->success('Update Info Success.');
        return back();
    }
    public function passwordChange(){
        return view('deliveryBoy.password.index',[
            'deliveryBoy' => User::where('id',auth()->user()->id)->first(),
        ]);
    }
    public function updatePassword(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                'old_password' => 'required',
                'new_password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6'
            ]);

            if($validate->fails())
            {
                toastr()->error($validate->messages());
                return redirect()->back();

            }
            $deliveryBoy = User::find($id);
            if ($deliveryBoy) {
                if (password_verify($request->old_password, $deliveryBoy->password)) {
                    $deliveryBoy->password = bcrypt($request->new_password);
                    $deliveryBoy->save();
                    toastr()->success('Password Change Successfully');
                    return back();
                } else {
                    toastr()->error('Old Password Mismatched');
                    return back();
                }
            }
            else {
                toastr()->error('data not found');
                return back();
            }
        }
        catch (Exception $e){
            toastr()->error('');
        }
    }
}
