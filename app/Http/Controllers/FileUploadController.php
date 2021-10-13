<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
class FileUploadController extends Controller
{
    public function index()
    {
        $files = array();      
        for($i=0; $i<= count(Storage::disk('local')->files())-1; $i++){
            $name = Storage::disk('local')->files()[$i];
            $type =File::extension(Storage::disk('local')->files()[$i]);
            $size = round((Storage::size(Storage::disk('local')->files()[$i]))/1024,2) . " KB";
            $dt = new Carbon(Storage::lastModified(Storage::disk('local')->files()[$i]));
            $time = $dt->day ."-".$dt->month."-".$dt->year;
            $files[$i] = array("name"=>$name,"type"=>$type,"size"=>$size,"time"=>$time);

        } 
        return view('file_upload.index',compact('files'));
    }

    public function dropzoneFileUpload(Request $request){
        if($request->hasFile('file')) {  
                    
            $destinationPath = storage_path('files');
            $extension = $request->file('file')->getClientOriginalExtension();
            $validExtensions = array("jpeg","jpg","png","pdf","txt","zip",'rar','doc');

            if(in_array(strtolower($extension), $validExtensions)){
              $fileName = $request->file('file')->getClientOriginalName();
              $request->file('file')->move($destinationPath, $fileName);    
            }
     
          }
         
    }

    public function remove($name) {
        $files = Storage::disk('local')->files($name);
        if(Storage::disk('local')->exists($name)) {
            unlink(storage_path('files').'\\'.$name);
            return $this->index();
        }
        return redirect('/');
    }
    
    public function download($file)
    {
    //PDF file is stored under project/public/download/info.pdf
        $fileName = storage_path('files').'\\'.$file;
        $type = substr($file, 0,strpos($file, "."));
        $headers = array(
              'Content-Type: application/'.$type,
            );

        return Response::download($fileName, $file, $headers);
    }
    
}
