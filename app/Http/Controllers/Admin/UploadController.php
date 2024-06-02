<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Upload;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        $files = Upload::latest()->where('user_id',auth()->user()->id)->get();
        $sortValue = null;
        if (auth()->user()->role == 'seller'){
            return view('seller.file-upload.index',[
                'files'=> $files,
                'sortValue' => $sortValue
            ]);
        }
        else{
            return view('admin.file-upload.index',[
                'files'=> $files,
                'sortValue' => $sortValue
            ]);
        }

    }

    public function allFiles(){
        $query = Upload::query();
        $data_type = 'all';
        $files = $query->latest()->where('user_id',auth()->user()->id)->paginate(18);
        $sortValue = null;

        return view('admin.file-upload.all_files',[
            'files'=> $files,
            'data_type' => $data_type,
            'sortValue' => $sortValue
        ]);
    }
    
    public function singleFile(){
        $query = Upload::query();
        $data_type = 'all';
        $files = $query->latest()->where('user_id',auth()->user()->id)->paginate(18);
        $sortValue = null;

        return view('admin.file-upload.single_file',[
            'files'=> $files,
            'data_type' => $data_type,
            'sortValue' => $sortValue
        ]);
    }

    public function create(){
        if (auth()->user()->role == 'seller') {
            return view('seller.file-upload.create');
        }
        else{
            return view('admin.file-upload.create');
        }
    }

    public function store(Request $request){
        $requestFiles = $request->file('files');
        if ($requestFiles){
            Upload::newFileUpload($request,$requestFiles);
        }
        Toastr::success('Successfully Uploaded.');
        if (auth()->user()->role == 'seller'){
            return redirect()->route('seller.file.manage');
        }
        else{
            return redirect()->route('admin.file.manage');
        }


    }

    public function destroy($id){
        $file = Upload::find($id);
        if ($file){
            if(file_exists($file->file)){
                unlink($file->file);
            }
            $file->delete();
            Toastr::success('Successfully Delete.');
            return redirect()->back();
        }
        Toastr::success('Items Not Found');
        return redirect()->back();
    }

    public function deleteSelectedItems(Request $request){
        $ids = $request->input('ids');
        Upload::whereIn('id', $ids)->delete();
        return response()->json(['success' => true]);
    }

    public function sortFile(Request $request)
    {
        $sortValue = $request->input('sortValue');
        $data_type = 'filter';
        $query = Upload::query();
        $query->where('user_id', auth()->user()->id);

        switch ($sortValue) {
            case 'newest':
                $files = $query->latest()->paginate(18);
                break;
            case 'oldest':
                $files = $query->oldest('id')->paginate(18);
                break;
            case 'smallest':
                $files = $query->orderBy('file_size', 'asc')->paginate(18);
                break;
            case 'largest':
                $files = $query->orderBy('file_size', 'desc')->paginate(18);
                break;
            default:
                $files = $query->paginate(18);
                break;
        }

        return view('admin.file-upload.all_files', compact('files', 'sortValue', 'data_type'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $data_type = 'search';
        $query = Upload::query();
        $query->where('user_id', auth()->user()->id);
        $files = $query->where('file_name', 'like', "%$search%")->paginate(18);

        return view('admin.file-upload.all_files', compact('files', 'data_type', 'search'));
    }

    public function paginate(Request $request)
    {
        $files = Upload::where('user_id',auth()->user()->id)->paginate(20);
        return view('admin.pagination.paginate', compact('files'))->render();
    }
}
