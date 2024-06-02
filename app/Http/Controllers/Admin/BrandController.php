<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.product.brand.index',[
            'brands'=>Brand::orderBy('id','desc')->paginate(10),
        ]);
    }
    public function create()
    {
        return view('admin.product.brand.add');
    }

    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'name'   => 'required|unique:brands,name,except,id',
//                'logo'   => 'required | dimensions:min_width=120,min_height=80,max_width=120,max_height=80',
            ],[
//                'logo.dimensions'=> 'Dimension must be 120*80'
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Brand::newBrand($request);
           toastr()->success('Successfully Added.');
           return redirect()->route('brands.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Brand $brand)
    {
        $brand =Brand::find($brand->id);

        $logo = Upload::where('file',$brand->logo)->first();

        if ($brand){
            return view('admin.product.brand.edit',[
                'brand'=> $brand,
                'logo'=> $logo,
            ]);
        }
        toastr()->success("Not Found");
        return redirect()->back();

    }
    public function update(Request $request, Brand $brand)
    {

        try{
            $validate = Validator::make($request->all(), [
                'name'   =>  Rule::unique('brands')->ignore($brand->id),
//              'logo'   => 'required|dimensions:min_width=120,min_height=80,max_width=120,max_height=80',
            ],[
                'logo.dimensions'=> 'Dimension must be 120*80'
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Brand::updateBrand($request,$brand->id);
           toastr()->success('Successfully Updated.');
           return redirect()->route('brands.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function featuredStatusUpdate(Request $request,$id){
        $brand = Brand::find($id);
        $brand->featured_status = $request->featured_status;
        $brand->save();
        toastr()->success("Successfully Updated.");
        return back();
    }

    public function destroy(Brand $brand)
    {
        try{
            Brand::deleteBrand($brand->id);
            toastr()->success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
