<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ColorController extends Controller
{
    public function index()
    {
        return view('admin.product.color.index',[
            'colors'=>Color::orderBy('id','desc')->get(),
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
                'name' => 'required|string:255|unique:colors,name,except,id',
                'code' => 'required|unique:colors,code,except,id||string|max:7|regex:/#[a-fA-F0-9]{6}/',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Color::createColor($request);
            Toastr::success('Successfully Added.');
            return redirect()->route('colors.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Color $color)
    {
        return view('admin.product.color.edit',[
            'color'=>Color::find($color->id),
            'colors'=>Color::whereNotIn('id',[$color->id])->orderBy('id','desc')->get(),
        ]);
    }
    public function update(Request $request, Color $color)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:colors,name,'.$color->id,
                'code' => 'required|string|max:7|unique:colors,code,'.$color->id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Color::updateColor($request,$color->id);
            Toastr::success('Successfully Updated.');
            return redirect()->route('colors.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(Color $color)
    {
        try{
            Color::deleteColor($color->id);
            Toastr::success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
