<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.category.index',[
            'categories'=>BlogCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'name'=>'required | unique:blog_categories,name|max:255',
            ],[
                'name.required'=>'Category Name Required',
                'name.unique'=>'Already Have This Category Name',
            ]);
            if ($validate->fails()) {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back();
            }
            BlogCategory::newBlogCategory($request);
            toastr()->success('Blog Category create success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogCategory)
    {
        return view('admin.blog.category.edit',[
            'blogCategory'=>BlogCategory::find($blogCategory->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        try {
            $validate = Validator::make($request->all(),[
                'name'=>'required | unique:blog_categories,name,'.$blogCategory->id.',id',
            ],[
                'name.required'=>'Category Name Required',
                'name.unique'=>'Already Have This Category Name',
            ]);
            if ($validate->fails()) {
                toastr()->error($validate->getMessageBag()->first());
                return redirect()->back();
            }
            BlogCategory::updateBlogCategory($request,$blogCategory->id);
            toastr()->success('update Blog Category info success.');
            return redirect()->route('blog_categories.index');

        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogCategory)
    {
        BlogCategory::deleteBlogCategory($blogCategory->id);
        return back()->with('message','delete Blog Category success');
    }
}
