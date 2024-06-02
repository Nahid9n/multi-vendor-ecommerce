<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        return view('admin.product.sizes.index',[
            'sizes'=>Size::orderBy('id','desc')->get(),
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
                'name' => 'required|string:255|unique:sizes,name,except,id',
                'code' => 'required|unique:sizes,code,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Size::newSize($request);
            Toastr::success('Successfully Added.');
            return redirect()->route('sizes.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Size $size)
    {
        return view('admin.product.sizes.edit',[
            'size'=>Size::find($size->id),
            'sizes'=>Size::whereNotIn('id',[$size->id])->orderBy('id','desc')->get(),
        ]);
    }
    public function update(Request $request, Size $size)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:sizes,name,'.$size->id,
                'code' => 'required|unique:sizes,code,'.$size->id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            Size::updateSize($request,$size->id);
            Toastr::success('Successfully Updated.');
            return redirect()->route('sizes.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function destroy(Size $size)
    {
        try{
            Size::deleteSize($size->id);
            Toastr::success('Successfully Deleted.');
            return redirect()->back();

        }catch(Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
