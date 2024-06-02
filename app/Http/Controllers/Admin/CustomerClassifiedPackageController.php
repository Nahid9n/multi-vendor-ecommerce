<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CustomerClassifiedPackage;
use App\Models\Upload;
use Illuminate\Http\Request;
use Exception;

class CustomerClassifiedPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.classified-package.index',[
            'packages'=>CustomerClassifiedPackage::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.classified-package.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request,[
                'package_name'=>'required | unique:customer_classified_packages,package_name',
                'amount'=>'required| unique:customer_classified_packages,amount',
                'product_upload'=>'required | unique:customer_classified_packages,product_upload',
            ],[
                'package_name.required'=>'package name field is required',
                'package_name.unique'=>'this package name is already have',
                'amount.required'=>'amount field is required',
                'amount.unique'=>'this amount number is already have',
                'product_upload.required'=>'Product Upload field is required',
                'product_upload.unique'=>'Product Upload field is already have',
            ]);
            CustomerClassifiedPackage::newPackage($request);
            toastr()->success("Add Package Success.");
            return back();

        }
        catch(Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $package = CustomerClassifiedPackage::find($id);
        $file = Upload::where('file',$package->package_logo)->first();
        if ($package){
            return view('admin.customer.classified-package.edit',[
                'package'=>$package,
                'file'=>$file,
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
    public function update(Request $request,  $id)
    {
        try{
            $this->validate($request,[
                'package_name'=>'required | unique:customer_classified_packages,package_name,'.$id,
                'amount'=>'required| unique:customer_classified_packages,amount,'. $id,
                'product_upload'=>'required | unique:customer_classified_packages,product_upload,'. $id,
            ],[
                'package_name.required'=>'package name field is required',
                'package_name.unique'=>'this package name is already have',
                'amount.required'=>'amount field is required',
                'amount.unique'=>'this amount number is already have',
                'product_upload.required'=>'Product Upload field is required',
                'product_upload.unique'=>'Product Upload field is already have',
            ]);

            CustomerClassifiedPackage::updatePackage($request,$id);
            toastr()->success("update Package info successfully.");
            return redirect()->route('classifiedPackage.index');

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
        CustomerClassifiedPackage::deletePackage($id);
        toastr()->success("Package delete Successfully.");
        return back();
    }
}
