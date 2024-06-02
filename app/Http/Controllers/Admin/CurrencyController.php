<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Currency;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.currency.index',[
            'currencies'=>Currency::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.currency.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'name'              => 'required | unique:currencies,name',
                'code'              => 'required',
                'exchange_rate'     => 'required',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Currency::newCurrency($request);
            toastr()->success('Successfully Added.');
            return redirect()->route('currency.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        if ($currency){
            return view('admin.currency.edit',[
                'currency'=>$currency
            ]);
        }
        else{
            toastr()->error('Currency Not Found.');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        try{
            $validate = Validator::make($request->all(), [
                'name'                  => Rule::unique('currencies')->ignore($currency->id),
                'code'                  => 'required',
                'exchange_rate'         => 'required',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Currency::updateCurrency($request,$currency->id);
            toastr()->success('Successfully Added.');
            return redirect()->route('currency.index');

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function statusUpdate(Request $request,$id){
        $currency = Currency::find($id);
        if ($request->status){
            $currency->status = $request->status;
            $currency->save();
        }
        else{
            $currency->status = 0;
            $currency->save();
        }
        toastr()->success('Successfully Change Status.');
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        try{
            Currency::deleteCurrency($currency->id);
            toastr()->success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
