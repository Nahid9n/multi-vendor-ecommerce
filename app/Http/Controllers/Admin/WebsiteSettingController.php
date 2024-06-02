<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.website-setting.show',[
            'websiteSetting'=> WebsiteSetting::where('status',1)->first()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.website-setting.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WebsiteSetting $websiteSetting)
    {
        return view('admin.website-setting.show',[
            'websiteSetting'=>$websiteSetting,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebsiteSetting $websiteSetting)
    {
        return view('admin.website-setting.edit',[
            'websiteSetting'=>WebsiteSetting::find($websiteSetting->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebsiteSetting $websiteSetting)
    {
        WebsiteSetting::updateWebsiteDetails($request,$websiteSetting->id);
        toastr()->success('Update info successfully.');
        return redirect()->route('website-settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebsiteSetting $websiteSetting)
    {
        //
    }
}
