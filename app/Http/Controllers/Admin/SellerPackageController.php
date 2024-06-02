<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OfflinePayment;
use App\Models\PurchagePackage;
use App\Models\SellerPackage;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Exception;

class SellerPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function sellerPayment()
     {
        $payments = OfflinePayment::with(['user'])->orderBy('id','desc')->paginate(10);
        return view('admin.Sellers.packages.payment.payment_list',compact('payments'));
     }
     public function sellerPaymentStatus(Request $request,$id)
     {

            $payment = OfflinePayment::find($id);
            $payment->update([
                'status' =>$request->status,
            ]);
           $package= SellerPackage::find($payment->package_id);
           PurchagePackage::create([
                'package'       =>$package->package_name,
                'package_price' =>$package->amount,
                'payment_type'  =>'Offline Payment', //to do dynamic value
           ]);
            Toastr::success('Successfully Status Updated.');
            return redirect()->back();
     }
    public function index()
    {
        return view('admin.Sellers.packages.index',[
            'packages'=>SellerPackage::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Sellers.packages.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'package_name'=>'required | unique:seller_packages,package_name',
                'amount'=>'required| unique:seller_packages,amount',
                'product_upload'=>'required | unique:seller_packages,product_upload',
                'duration'=>'required',
            ],[
                'package_name.required'=>'package name field is required',
                'package_name.unique'=>'this package name is already have',
                'amount.required'=>'amount field is required',
                'amount.unique'=>'this amount number is already have',
                'product_upload.required'=>'Product Upload field is required',
                'product_upload.unique'=>'Product Upload field is already have',
            ]);
            SellerPackage::newPackage($request);
            toastr()->success("Add Package Success.");
            return redirect()->route('sellerPackage.index');

        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SellerPackage $sellerPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = SellerPackage::find($id);
        $package_logo = Upload::where('file',$package->package_logo)->first();
        if ($package){
            return view('admin.Sellers.packages.edit',[
                'package'=>$package,
                'package_logo'=>$package_logo,
            ]);
        }
        else{
            toastr()->error("Package Not Found.");
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $this->validate($request,[
                'package_name'=>'required | unique:seller_packages,package_name,'.$id,
                'amount'=>'required| unique:seller_packages,amount,'. $id,
                'product_upload'=>'required | unique:seller_packages,product_upload,'. $id,
                'duration'=>'required',
            ],[
                'package_name.required'=>'package name field is required',
                'package_name.unique'=>'this package name is already have',
                'amount.required'=>'amount field is required',
                'amount.unique'=>'this amount number is already have',
                'product_upload.required'=>'Product Upload field is required',
                'product_upload.unique'=>'Product Upload field is already have',
            ]);

            SellerPackage::updatePackage($request,$id);
            toastr()->success("update Package info successfully.");
            return redirect()->route('sellerPackage.index');

        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SellerPackage::deletePackage($id);
        toastr()->success("Package delete Successfully.");
        return back();
    }
}
