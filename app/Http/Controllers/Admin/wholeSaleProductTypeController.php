<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\WholeSaleProduct;
use App\Models\WholeSaleProductType;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class wholeSaleProductTypeController extends Controller
{
     public function index()
    {
        $productType = WholeSaleProductType::all();
        return view("admin.whole_sale_products.product_type.index",
                compact("productType"));
    }
     public function create()
    {
        return view("admin.whole_sale_products.product_type.create");
    }
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(), [
            "name"          => "required |unique:whole_sale_product_types,name,except,id",
            "description"   => "required",
            "status"        => "required",
        ]);
        if($validator->fails())
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        }

        WholeSaleProductType::create([
            "name"          =>$request->name,
            "description"   =>$request->description,
            "status"        =>$request->status,
        ]);
        Toastr::success("WholeSaleProductType has been successfully created.");
        return redirect()->route('whole-sale-product-type.index');
    }
    public function show($id)
    {
        $product_type = WholeSaleProductType::find($id);

        return view("admin.whole_sale_products.product_type.show", compact("product_type"));
    }
    public function edit($id)
    {
      $product_type = WholeSaleProductType::find($id);
        return view("admin.whole_sale_products.product_type.edit", compact("product_type"));
    }
    public function update_status(Request $request)
    {

        try{
            $product_type= WholeSaleProductType::find($request->id);

            $product_type->update([            
                "status"        =>$request->status,
            ]);

            return response()->json([
                'status' => true,
                'message' => "WholeSaleProductType Status has been successfully updated."
            ]);

        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'error' => "WholeSaleProductType Status unable to update."
            ]);
        }

    }
    
    public function update(Request $request,$id)
    {
         $validator= Validator::make($request->all(), [
            "name"          => "required",
            "description"   => "required",
            "status"        => "required",
        ]);
        if($validator->fails())
        {
            Toastr::error($validator->getMessageBag()->first());
            return redirect()->back();
        }
        $product_type= WholeSaleProductType::find($id);
        $product_type->update([
            "name"          =>$request->name,
            "description"   =>$request->description,
            "status"        =>$request->status,
        ]);
        Toastr::success("WholeSaleProductType has been successfully updated.");
        return redirect()->route('whole-sale-product-type.index');
    }
     public function delete($id)
    {
      $product_type = WholeSaleProductType::find($id);
      $product_type->delete();
      Toastr::success("WholeSaleProductType has been successfully deleted.");
      return redirect()->back();

    }
    public function typeofwholesaleproduct($id){
        return view('admin.whole_sale_products.product_type.index',[
            'productType'=> WholeSaleProduct::where('type_id',$id)->get(),
        ]);
    }
}
