<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\Models\Brand;
use App\Models\Country;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Exception;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.country.index',[
            'countries'=>Country::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [

                'name'              => 'required | unique:countries,name',
                'code'              => 'required | unique:countries,code',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Country::newCountry($request);
            toastr()->success('Successfully Added.');
            return redirect()->route('country.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        if ($country){
            return view('admin.country.edit',[
                'country'=>$country
            ]);
        }
        else{
            toastr()->error('Country Not Found.');
            return redirect()->back();
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        try{
            $validate = Validator::make($request->all(), [
                'name'   => Rule::unique('countries')->ignore($country->id),
                'code'   => Rule::unique('countries')->ignore($country->id),
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Country::updateCountry($request,$country->id);
            toastr()->success('Successfully Added.');
            return redirect()->route('country.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function statusUpdate(Request $request,$id){
        $country = Country::find($id);
        if ($request->status){
            $country->status = $request->status;
            $country->save();
        }
        else{
            $country->status = 0;
            $country->save();
        }
        toastr()->success('Successfully Change Status.');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        try{
            Country::deleteCountry($country->id);
            toastr()->success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
