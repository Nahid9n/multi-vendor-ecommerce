<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('admin.product.product-type.index',[
            'productTypes'=>ProductType::orderBy('id','desc')->get(),
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:product_types,name,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            ProductType::newProductType($request);
            Toastr::success('Successfully Added.');
            return redirect()->route('product-type.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(ProductType $productType)
    {
        $productType = ProductType::find($productType->id);
        $image = Upload::where('file',$productType->image)->first();
        return view('admin.product.product-type.edit',[
            'product_type'=> $productType,
            'image'=> $image,
            'productTypes'=>ProductType::whereNotIn('id',[$productType->id])->orderBy('id','desc')->get(),
        ]);
    }
    public function update(Request $request, ProductType $productType)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:product_types,name,'.$productType->id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            ProductType::updateProductType($request,$productType->id);
            Toastr::success('Successfully Updated.');
            return redirect()->route('product-type.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(ProductType $productType)
    {
        try{
            ProductType::deleteProductType($productType->id);
            Toastr::success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
