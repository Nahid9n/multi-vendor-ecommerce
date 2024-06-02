<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::orderBy('id','desc')->paginate(10);
        return view('admin.product.sub-category.index',compact('sub_categories'));

    }
    public function create()
    {
        return view('admin.product.sub-category.add',
            ['categories' => Category::all()->where('status','1')]);
    }

    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'category_id'   => 'required',
                'name'          => 'required|string:255',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            SubCategory::newSubCategory($request);
           toastr()->success('Successfully Added.');
           return redirect()->route('sub-category.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(SubCategory $subCategory)
    {
        $subcategory = SubCategory::find($subCategory->id);

        $image = Upload::where('file',$subcategory->image)->first();
        return view('admin.product.sub-category.edit', [
            'categories' => Category::all(),
            'sub_category' => $subCategory,
            'image' => $image,
        ]);
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        try{
            $validate = Validator::make($request->all(), [
                'category_id'   => 'required',
                'name'          => 'required|string:255',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            SubCategory::updateSubCategory($request, $subCategory->id);
            toastr()->success('Successfully Updated.');
            return redirect()->route('sub-category.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(SubCategory $subCategory)
    {
        try{
            SubCategory::deleteSubCategory($subCategory);
            toastr()->success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
