<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.attribute.index',[
            'attributes'=> Attribute::orderBy('id','desc')->get(),
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
                'name' => 'required|string:255|unique:attributes,name,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $attribute = new Attribute();
            $attribute->name = $request->name;
            $attribute->save();
            Toastr::success('Successfully Added.');
            return redirect()->route('product_attribute.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function storeAttributeValue(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'value' => 'required|string:255',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $attribute = new AttributeValue();
            $attribute->attribute_id = $request->attribute_id;
            $attribute->value = $request->value;
            $attribute->color_code = $request->color_code;
            $attribute->save();
            Toastr::success('Successfully Added.');
            return redirect()->route('product_attribute.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        return view('admin.product.attribute.edit',[
            'attributes'=> Attribute::orderBy('id','desc')->get(),
            'attribute'=> $attribute,
        ]);
    }
    public function editValue($id)
    {
        $attributeValue = AttributeValue::find($id);
        return view('admin.product.attribute.valueedit',[
            'attributes'=> Attribute::orderBy('id','desc')->get(),
            'attributeValue'=> $attributeValue,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:attributes,name,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $attribute = Attribute::find($id);
            $attribute->name = $request->name;
            $attribute->save();
            Toastr::success('Successfully updated.');
            return redirect()->route('product_attribute.index');

        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function updateValue(Request $request, $id)
    {

        try {
            $validate = Validator::make($request->all(), [
                'value' => 'required|string:255',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $attribute = AttributeValue::find($id);
            $attribute->attribute_id = $request->attribute_id;
            $attribute->value = $request->value;
            $attribute->color_code = $request->color_code;
            $attribute->save();
            Toastr::success('Successfully updated.');
            return redirect()->route('product_attribute.index');

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
        $attribute = Attribute::find($id);
        $attributeValues = AttributeValue::whereIn('attribute_id',[$attribute->id])->get();
        foreach ($attributeValues as $value){
            $value->delete();
        }
        $attribute->delete();
        Toastr::success('Successfully deleted.');
        return back();
    }
    public function destroyValue($id)
    {
        $attributeValues = AttributeValue::find($id);
        $attributeValues->delete();
        Toastr::success('Successfully deleted.');
        return back();
    }
}
