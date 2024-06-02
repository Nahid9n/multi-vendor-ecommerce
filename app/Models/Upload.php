<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Intervention\Gif\Blocks\getSize;
use function Symfony\Component\Mime\Part\getFilename;

class Upload extends Model
{
    use HasFactory;
    private static $file,$fileName,$directory,$fileSize,$fileUrl,$fileType,$extension;

    public static function newFileUpload($request,$requestFiles){
        foreach ($requestFiles as $requestFile)
        {
            self::$file = $requestFile;
            self::$extension = self::$file->getClientOriginalExtension();
            self::$fileName = self::$file->getClientOriginalName();
            self::$fileSize = self::$file->getSize() / 1024;
            self::$fileType = self::$file->getType();
            self::$directory = 'uploads/file-uploads/';
            self::$file->move(self::$directory, self::$fileName);
            self::$fileUrl = self::$directory.self::$fileName;

            self::$file                = new Upload();
            self::$file->user_id       = auth()->user()->id;
            self::$file->file_name       = self::$fileName;
            self::$file->file_type         =  self::$fileType;
            self::$file->file_size         =  self::$fileSize;
            self::$file->file         =  self::$fileUrl;
            self::$file->uploaded_by         = str_replace(" ","_",$request->uploaded_by);
            self::$file->save();
        }
    }
}
