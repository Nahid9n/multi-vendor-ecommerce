<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rule;

class DigitalCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.category.digital.index', [
            'categories' => Category::where('type','digital')->orderBy('id','desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.category.digital.add', [
            'parent_categories' => Category::where('status', 1)->where('type','digital')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        return $request;
        try{
            $validate = Validator::make($request->all(), [
                "name"          => "required|unique:categories,name,except,id|max:255",
                "parent_id"     => "required",
                // "orderNumber"   => "required|numeric|min:1",
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Category::newCategory($request);
            toastr()->success("Successfully Added.");
            return redirect()->route('digitals.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $banner = Upload::where('file',$category->banner)->first();
        $icon = Upload::where('file',$category->icon)->first();
        $cover = Upload::where('file',$category->cover)->first();
        if ($category){
            if ($category->type == 'digital'){
                return view('admin.product.category.digital.edit', [
                    'category' => $category,
                    'banner' => $banner,
                    'icon' => $icon,
                    'cover' => $cover,
                    'parent_categories' => Category::where('status', 1)->get(),
                ]);
            }
            toastr()->success("It Is Not Digital Category.");
            return redirect()->back();
        }

        toastr()->success("Not Found");
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $validate = Validator::make($request->all(), [
                "name"              => Rule::unique('brands')->ignore($id),
                "parent_id"         => "required",

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $this->category = Category::updateCategory($request, $id);
            toastr()->success("Successfully Updated.");
            return redirect()->route('digitals.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function featuredStatusUpdate(Request $request,$id){
        $category = Category::find($id);
        $category->featured_status = $request->featured_status;
        $category->save();
        toastr()->success("Successfully Updated.");
        return back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            Category::deleteCategory($id);
            toastr()->success("Successfully Deleted.");
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
