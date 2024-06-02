<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerShopSetting;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ShopSettingController extends Controller
{
    public function index()
    {
        $seller = Seller::where('user_id',auth()->user()->id)->first();
        $shop_setting = SellerShopSetting::where('seller_id',$seller->id)->first();
        return view('seller.shop_setting.index',compact('shop_setting'));
    }
    public function edit($id)
    {
        return view('seller.shop_setting.edit',[
            'shop_setting'=>SellerShopSetting::find($id),
        ]);
    }

    public function update(Request $request,$id)
    {
        // try{
            $shop_setting = SellerShopSetting::find($id);
            if($request->logo)
            {
                $file = Upload::find($request->logo);
                $logo = $file->file;
                $shop_setting->logo = $logo;
            }

            if($request->icon)
            {
                $file = Upload::find($request->icon);
                $icon = $file->file;
                $shop_setting->icon = $icon;
            }
            if($request->banner)
            {
                $file = Upload::find($request->banner);
                $banner = $file->file;
                $shop_setting->banner = $banner;
            }
            $shop_setting->slogan = $request->slogan;
            $shop_setting->meta = $request->meta;
            $shop_setting->meta_description = $request->meta_description;
            $shop_setting->about = $request->about;
            $shop_setting->facebook = $request->facebook;
            $shop_setting->twitter = $request->twitter;
            $shop_setting->linkedIn = $request->linkedIn;
            $shop_setting->youtube = $request->youtube;
            $shop_setting->map = $request->map;
            $shop_setting->save();
            Toastr::success('Successfully Updated.');
            return redirect()->route('seller.shop-setting.index');

        // }catch(\Exception $e){
        //    Toastr::error($e->getMessage());
        //     return redirect()->back();
        // }
    }
}
