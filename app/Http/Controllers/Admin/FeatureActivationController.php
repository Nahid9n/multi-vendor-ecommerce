<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use App\Models\Currency;
use App\Models\FeatureActivation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rule;
use function Symfony\Component\HttpFoundation\replace;

class FeatureActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.feature.index',[
            'featuresSystem'=>FeatureActivation::where('type','System')->latest()->get(),
            'featuresBusiness'=>FeatureActivation::where('type','Business Related')->latest()->get(),
            'featuresPayment'=>FeatureActivation::where('type','Payment Related')->latest()->get(),
            'featuresSocial'=>FeatureActivation::where('type','Social Media Login')->latest()->get(),
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
//        try{
//            $validate = Validator::make($request->all(), [
//                'name'              => 'required | unique:feature_activations,name',
//                'type'              => 'required',
//            ]);
//            if ($validate->fails()) {
//                Toastr::error($validate->getMessageBag()->first());
//                return redirect()->back()
//                    ->withErrors($validate)
//                    ->withInput();
//            }
//            FeatureActivation::newFeature($request);
//            toastr()->success('Successfully Added.');
//            return redirect()->back();
//
//        }catch(Exception $e){
//            toastr()->error($e->getMessage());
//            return redirect()->back();
//        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FeatureActivation $featureActivation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureActivation $featureActivation)
    {
//        if ($featureActivation){
//            return view('admin.country.edit',[
//                'feature'=>$featureActivation
//            ]);
//        }
//        else{
//            toastr()->error('Feature Not Found.');
//            return redirect()->back();
//        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeatureActivation $featureActivation)
    {
//        try{
//            $validate = Validator::make($request->all(), [
//                'name'   =>  Rule::unique('feature_activations')->ignore($featureActivation->id),
//                'type'   => 'required',
//            ]);
//            if ($validate->fails()) {
//                Toastr::error($validate->getMessageBag()->first());
//                return redirect()->back()
//                    ->withErrors($validate)
//                    ->withInput();
//            }
//            FeatureActivation::updateFeature($request,$featureActivation->id);
//            toastr()->success('Successfully Added.');
//            return redirect()->route('feature.index');
//
//        }catch(Exception $e){
//            toastr()->error($e->getMessage());
//            return redirect()->back();
//        }
    }
    public function statusUpdate(Request $request,$id){
        $feature = FeatureActivation::find($id);
        if ($request->status){
            $feature->status = $request->status;
            $feature->save();
        }
        else{
            $feature->status = 0;
            $feature->save();
        }
        toastr()->success('Successfully Change Status.');
        return redirect()->back();

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureActivation $featureActivation)
    {
//        try{
//            FeatureActivation::deleteFeature($featureActivation->id);
//            toastr()->success('Successfully Deleted.');
//            return redirect()->back();
//
//        }catch(Exception $e){
//            toastr()->error($e->getMessage());
//            return redirect()->back();
//        }
    }
}
