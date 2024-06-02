<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UnitController extends Controller
{
    public function index()
    {
        return view('admin.product.units.index', [
            'units' => Unit::orderBy('id','desc')->get(),
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:units,name',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Unit::createUnit($request);
            toastr()->success('Successfully Added.');
            return redirect()->route('units.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Unit $unit)
    {
        return view('admin.product.units.edit', [
            'unit' => Unit::find($unit->id),
            'units' => Unit::whereNotIn('id',[$unit->id])->orderBy('id','desc')->get(),
        ]);
    }
    public function update(Request $request, Unit $unit)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => [
                    'required',
                    'string:255',
                    Rule::unique('units')->ignore($unit->id),
                ],

            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Unit::updateUnit($request, $unit->id);
            toastr()->success('Successfully Updated.');
            return redirect()->route('units.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(Unit $unit)
    {
        try {
            Unit::deleteUnit($unit->id);
            toastr()->success('Successfully Deleted');
            return redirect()->back();

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
