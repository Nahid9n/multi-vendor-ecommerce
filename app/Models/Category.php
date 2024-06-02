<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    private static $category,$banner,$icon,$cover,$bannerName,$iconName,$coverName,$directory,$bannerUrl,$iconUrl,$coverUrl,
                    $categoryId,$parentIds,$update;
    private static function getBanner($request){
        self::$banner = $request->file('banner');
        self::$bannerName = self::$banner->getClientOriginalName();
        self::$directory = 'uploads/products/categories/banner/';
        self::$banner->move(self::$directory,self::$bannerName);
        self::$bannerUrl = self::$directory.self::$bannerName;
        return self::$bannerUrl;
    }
    private static function getIcon($request){
        self::$icon = $request->file('icon');
        self::$iconName = self::$icon->getClientOriginalName();
        self::$directory = 'uploads/products/categories/icon/';
        self::$icon->move(self::$directory,self::$iconName);
        self::$iconUrl = self::$directory.self::$iconName;
        return self::$iconUrl;
    }
    private static function getCover($request){
        self::$cover = $request->file('cover');
        self::$coverName = self::$cover->getClientOriginalName();
        self::$directory = 'uploads/products/categories/cover/';
        self::$cover->move(self::$directory,self::$coverName);
        self::$coverUrl = self::$directory.self::$coverName;
        return self::$coverUrl;
    }
    public static function newCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->type = $request->type;
        self::$category->parent_id = $request->parent_id;

        if(self::$category->parent_id == 0){
            self::$category->level = 0;
        }else{
           self::$categoryId = Category::where('id',$request->parent_id)->first();
            self::$category->level = self::$categoryId->level+1;
        }
        if ($request->banner !=''){
            $banner = Upload::find($request->banner);
            self::$category->banner = $banner->file;
        }
       if ($request->icon !=''){
           $icon = Upload::find($request->icon);
           self::$category->icon = $icon->file;
        }
       if ($request->cover !=''){
           $cover = Upload::find($request->cover);
           self::$category->cover = $cover->file;
        }
        self::$category->meta = $request->meta;
        self::$category->metaDescription = $request->metaDescription;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function updateCategory($request,$id){
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->type = $request->type;

        self::$category->parent_id = $request->parent_id;

        if(self::$category->parent_id == 0){
            self::$category->level = 0;
        }else{
           self::$categoryId = Category::where('id',$request->parent_id)->first();
            self::$category->level = self::$categoryId->level+1;
        }
        if ($request->banner !=''){
            $banner = Upload::find($request->banner);
            self::$category->banner = $banner->file;
        }
        if ($request->icon !=''){
            $icon = Upload::find($request->icon);
            self::$category->icon = $icon->file;
        }
        if ($request->cover !=''){
            $cover = Upload::find($request->cover);
            self::$category->cover = $cover->file;
        }
        self::$category->meta = $request->meta;
        self::$category->metaDescription = $request->metaDescription;
        self::$category->status = $request->status;
        self::$category->save();
    }
    public static function deleteCategory($id){
        self::$category = Category::find($id);
        self::$parentIds = Category::where('parent_id',self::$category->id)->get();
        // $arrays=[];
        foreach(self::$parentIds as $parent){
            $update = Category::find($parent->id);
            $update->parent_id = self::$category->parent_id;
            $update->level = self::$category->level;
            // array_push($arrays,$update->level);
            $update->save();
        }
        // foreach(self::$parentIds as $cat_id){
        //     $cats = Category::where('parent_id',$cat_id)->get();
        //     foreach($cats as $cat){
        //         foreach($arrays as $arr){
        //             $cat->$arr+1;
        //             $cat->save();
        //         }
        //     }
        // }
        self::$category->delete();

    }
    public function type(){
        return $this->belongsTo(ProductType::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }


}
