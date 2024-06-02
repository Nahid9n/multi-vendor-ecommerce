<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Pages;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.index',[
            'pages'=>Pages::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:pages,name,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $page = new Pages();
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->contents = $request->contents;
            $page->status = $request->status;
            $page->save();
            Toastr::success('Successfully Added.');
            return redirect()->route('pages.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = Pages::find($id);
        if ($page){
            return view('admin.pages.show',[
                'page' => $page,
            ]);
        }
        else{
            toastr()->error('Page Not Found');
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.pages.edit',[
            'page' => Pages::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $page = Pages::find($id);
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->contents = $request->contents;
            $page->status = $request->status;
            $page->save();
            Toastr::success('Successfully Update.');
            return redirect()->route('pages.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        $page->delete();
        Toastr::success('Successfully Delete.');
        return back();
    }
}
