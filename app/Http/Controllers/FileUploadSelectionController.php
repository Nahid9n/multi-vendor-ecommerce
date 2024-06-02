<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class FileUploadSelectionController extends Controller
{
    public function saveSingleSelection(Request $request)
    {
        $selectedId = $request->single_image;
        $input_name = $request->input_name;

        $image = Upload::where('id', $selectedId)->orderBy('id', 'desc')->first();
        return view('admin.file-upload.single',compact('image', 'selectedId', 'input_name'));
    }
    public function saveMultipleSelection(Request $request)
    {
        $images = Upload::whereIn('id',$request->image_id)->orderBy('id', 'desc')->where('user_id',auth()->user()->id)->get();
        $files = json_encode($request->image_id);
        return view('admin.file-upload.multiple',compact('images', 'files'));
    }

    public function getSingleSelection(Request $request){

        $files = Upload::orderBy('id', 'desc')->where('user_id',auth()->user()->id)->paginate(24);
        $name = $request->input('inputName');
        return view('seller.product.single_file_modal', compact('files', 'name'));
    }

    public function getMultipleSelection(Request $request){
        $files = Upload::orderBy('id', 'desc')->where('user_id',auth()->user()->id)->paginate(24);
        return view('seller.product.multi_file_modal', compact('files'));
    }

}
