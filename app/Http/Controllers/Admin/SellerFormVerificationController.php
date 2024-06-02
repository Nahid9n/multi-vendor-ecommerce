<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SellerFormVerificationField;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SellerFormVerificationController extends Controller
{
    public function sellerVerificationForm(){
        $fields = SellerFormVerificationField::all();
        return view('admin.Sellers.verification-form.verification-form',compact('fields'));
    }
    public function sellerVerificationFormField(Request $request){
        if ($request->type == 'select'){
            try{
                $this->validate($request,[
                    'value'=>'required',
                ],[
                    'value.required'=>'Option field is required',
                ]);
                SellerFormVerificationField::sellerVerificationFormFieldsAdd($request);
                toastr()->success('Successfully Save.');
                return back();
            }
            catch(Exception $e){
                toastr()->error($e->getMessage());
                return back();
            }
        }
        elseif($request->type == 'multi_select'){
            try{
                $this->validate($request,[
                    'value'=>'required',
                ],[
                    'value.required'=>'Option field is required',
                ]);
                SellerFormVerificationField::sellerVerificationFormFieldsAdd($request);
                toastr()->success('Successfully Save.');
                return back();
            }
            catch(Exception $e){
                toastr()->error($e->getMessage());
                return back();
            }
        }
        elseif($request->type == 'radio'){
            try{
                $this->validate($request,[
                    'value'=>'required',
                ],[
                    'value.required'=>'Option field is required',
                ]);
                SellerFormVerificationField::sellerVerificationFormFieldsAdd($request);
                toastr()->success('Successfully Save.');
                return back();
            }
            catch(Exception $e){
                toastr()->error($e->getMessage());
                return back();
            }
        }
        SellerFormVerificationField::sellerVerificationFormFieldsAdd($request);
        toastr()->success('Successfully Save.');
        return back();


    }
    public static function sellerVerificationFormFieldUpdate(Request $request,$id){
        $row = SellerFormVerificationField::find($id);
        if ($row){
            SellerFormVerificationField::sellerVerificationFormFieldsUpdate($request,$id);
            toastr()->success('Successfully Update.');
            return redirect()->route('seller.verification.form');
        }
        toastr()->success('Not Found.');
        return back();
    }
    public static function sellerVerificationFormFieldDelete($id){
        SellerFormVerificationField::sellerVerificationFormFieldsDelete($id);
        toastr()->success('Successfully Delete.');
        return back();
    }

}
