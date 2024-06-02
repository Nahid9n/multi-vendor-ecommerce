<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    private $timeout = 3000;
    private $category;
    public function index()
    {
        return view('admin.product.category.digital.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('admin.product.category.add', [
            'productTypes' => ProductType::where('status', 1)->get(),
        ]);
    }
    public function store(Request $request)
    {
        return $request;
        try{
            $validate = Validator::make($request->all(), [
                "name"              => "required|unique:categories,name,except,id|max:255",
                "type_id"           => "required",
                "orderNumber"       => "required|numeric|min:1",
                "meta"              => "required|string:255",
                "metaDescription"   => "required|string:255",
//                "banner"            => "required|mimes:jpeg,png,jpg,gif|max:100| dimensions:min_width=100,min_height=100,max_width=100,max_height=100",
//                "icon"              => "required|mimes:jpeg,png,jpg,gif|max:32| dimensions:min_width=32,min_height=32,max_width=32,max_height=32",
//                "cover"             => "required|mimes:jpeg,png,jpg,gif|max:360| dimensions:min_width=360,min_height=360,max_width=360,max_height=360",
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Category::newCategory($request);
            toastr()->success("Successfully Added.");
            return redirect()->route('categories.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Category $category)
    {
        return view('admin.product.category.edit', [
            'category' => Category::find($category->id),
            'productTypes' => ProductType::where('status', 1)->get(),
        ]);
    }
    public function update(Request $request, Category $category)
    {
        try{
            $validate = Validator::make($request->all(), [
                "name"              => "required|max:255|unique:categories,name,".$category->id,
                "type_id"           => "required",
                "orderNumber"       => "required|numeric|min:1",
                "meta"              => "required|string:255",
                "metaDescription"   => "required|string:255",
                "banner"            => "required|mimes:jpeg,png,jpg,gif|max:100| dimensions:min_width=100,min_height=100,max_width=100,max_height=100",
                "icon"              => "required|mimes:jpeg,png,jpg,gif|max:32| dimensions:min_width=32,min_height=32,max_width=32,max_height=32",
                "cover"             => "required|mimes:jpeg,png,jpg,gif|max:360| dimensions:min_width=360,min_height=360,max_width=360,max_height=360",
            ],[
            'banner.dimensions'=> 'Dimension must be 100*100',
                'icon.dimensions' => 'Dimension must be 32*32',
                'cover.dimensions'=> 'Dimension must be 360*360',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $this->category = Category::updateCategory($request, $category->id);
            toastr()->success("Successfully Updated.");
            return redirect()->route('categories.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(Category $category)
    {
        try{
            Category::deleteCategory($category->id);
            toastr()->success("Successfully Deleted.");
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
