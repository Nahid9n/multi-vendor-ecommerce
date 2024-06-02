<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogImage;
use App\Models\Upload;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blog,$images,$fileName,$extension;
    public function index()
    {
        return view('admin.blog.index',[
            'blogs'=>Blog::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add',[
            'blogCategories'=>BlogCategory::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'title'=>'required | max:255',
                'category_id'=>'required',
            ],[
                'name.required'=>'Blog Title Required',
            ]);

            $this->blog = Blog::newBlog($request);
            if ($request->other_images)
            {
                BlogImage::newBlogImage( $request->other_images, $this->blog->id);
            }
            toastr()->success('Blog post info save successfully.');
            return back();
        }
        catch (\Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show',[
            'blog'=>$blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $banner = Upload::where('file',$blog->banner)->first();
        $meta_image = Upload::where('file',$blog->meta_image)->first();
        $imgIds = array();
        $images = array();
        foreach($blog->blogImages as $other_image){
            array_push($images,Upload::find($other_image->upload_id));
            array_push($imgIds,$other_image->id);
        }

        return view('admin.blog.edit',[
            'blog'=> $blog,
            'imgids'=> implode(',',$imgIds),
            'banner'=> $banner,
            'metaImage'=> $meta_image,
            'images'=> $images,
            'blogCategories'=>BlogCategory::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request,[
            'title'=>'required | max:255',
//            'banner'=>'dimensions:width=500,height=500','mimes:jpg,png,jpeg,gif,svg','max:2048',
        ],[
            'name.required'=>'Blog Title Required',
//            'banner.dimensions'=>'image Must Be Width 500 & Height : 500',
//            'banner.mimes'=>'image Must Be jpg,png,jpeg,gif,svg',
//            'banner.max'=>'image Maximum 2048',
        ]);
        Blog::updateBlog($request,$blog->id);
        if ($request->other_images)
        {
            BlogImage::updateBlogImage( $request->other_images, $blog->id);
        }
        toastr()->success('update blog info success.');
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Blog::deleteBlog($blog->id);
        $images = BlogImage::where('blog_id',$blog->id)->get();
        foreach ($images as $image){
            $image->delete();
        }
        toastr()->success('delete blog info success.');
        return back();
    }
}
