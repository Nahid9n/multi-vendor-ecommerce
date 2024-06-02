<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSlider;
use Illuminate\Http\Request;
use Exception;
class WebsiteSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manageSliders = WebsiteSlider::latest()->get();
        return view('admin.slider.index',compact("manageSliders"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'title'=>'required',
            ],[
                'title.required'=>'title Required',
            ]);
            WebsiteSlider::newSlider($request);
            toastr()->success('Create Slider Info Success');
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
    public function show($id)
    {
        $websiteSlider = WebsiteSlider::find($id);
        return view('admin.slider.show',compact("websiteSlider"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return view('admin.slider.edit',[
            'slider'=>WebsiteSlider::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id )
    {
        WebsiteSlider::updateSlider($request,$id);
        toastr()->success('Update Slider Info Success.');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        WebsiteSlider::deleteSlider($id);
        toastr()->success('Delete Slider Info Success.');
        return back();
    }
}
