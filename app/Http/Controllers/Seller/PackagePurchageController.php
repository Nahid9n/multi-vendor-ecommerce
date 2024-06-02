<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

use App\Models\OfflinePayment;
use App\Models\PurchagePackage;
use App\Models\SellerPackage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PackagePurchageController extends Controller
{
    public function list()
    {
        $packages = SellerPackage::all();
        return view('seller.package.index',compact('packages'));
    }
    public function purchageStore(Request $request)
    {
        try{
            $validate = Validator::make($request->all(),[
                'transition_id' =>'required|string:255',
            ]);
            if($validate->fails())
            {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back();
            }

            $imageName = null;
            if($request->hasFile('photo'))
            {
                $photo = $request->file('photo');
                $imageName = time().'.'.$photo->getClientOriginalExtension();

                $photo->move(public_path('uploads/sellers/offline_payment'),$imageName);
            }
            OfflinePayment::create([
                'user_id'        =>auth()->user()->id,
                'package_id'     =>$request->package_id,
                'transition_id'  =>$request->transition_id ,
                'photo'          =>$imageName,
            ]);
            Toastr::success('Successfully Purchaged.');

                $photo->move(public_path('uploads/sellers/purchage_package'),$imageName);

            PurchagePackage::create([
                'transition_id' =>$request->transition_id,
                'payment_method' =>$request->payment_method,
                'photo'     =>$imageName,
            ]);
        Toastr::success('Successfully Added.');
        return redirect()->back();
    }catch(\Exception $e){
        toastr()->error($e->getMessage());
        return back();
    }
    }
    public function purchagePackage()
    {
        try{
            $puchage_packages= PurchagePackage::all();
            return view('seller.package.purchage_package',compact('puchage_packages'));
            $data= PurchagePackage::all();
            return view('seller.package.purchage_package',compact('data'));
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return back();
    }

    }
}
