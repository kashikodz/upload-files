<?php

namespace App\Http\Controllers;

//use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Models\fileUpload;
use Illuminate\Support\Facades\Response;
use ZipArchive;
use File;

class DashboardController extends Controller
{
    public function dashboard(){
        $images=fileUpload::all();
        return view('dashboard',compact('images'));
    }
    public function upload(Request $request){
        $this->validate($request, [
            'file_name' => 'required|unique:file_uploads',
            'file' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {

                $fileName = $request->file_name;
                $filePath = $request->file('file')->storeAs('uploads', $fileName.'.'.$extension, 'public');
                $fileModel = new fileUpload;
                $fileModel->file_name = $fileName.'.'.$extension;
//                $fileModel->name = time().'_'.$request->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                return back()
                    ->with('success','File has been uploaded.')
                    ->with('file', $fileName);
            } else {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
            }

        }

    }
    public function singleDownload($name){
//        dd($name);
        $file=public_path('/storage/uploads/'.$name);
        return Response::download($file);
    }

    public function downloadMultipleFiles(Request $request){
//        dd($request->selected_files);
        $files = explode(',',$request->selected_files,);

        $zip = new ZipArchive;

        $fileName = 'selectedImages.zip';
        $zip->open($fileName,ZipArchive::CREATE);
//        dd($files);
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $path = public_path('storage\uploads\\');
            foreach ($files as $key => $value) {
//                dd($value);

                $relativeNameInZipFile = basename($path.$value);
                $zip->addFile($path.$value, $relativeNameInZipFile);
            }
            $zip->close();
        return response()->download($fileName)->deleteFileAfterSend(true);;
        }
    }
    public function downloadMultipleFiles_working(Request $request){
            $zip = new ZipArchive;

            $fileName = 'zipFileName.zip';

            if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
            {
                // Folder files to zip and download
                // files folder must be existing to your public folder
                $files = File::files(public_path('storage\\uploads\\'));
//                dd($files);

                // loop the files result
                foreach ($files as $key => $value) {
                    $relativeNameInZipFile = basename($value);
                    $zip->addFile($value, $relativeNameInZipFile);
                }

                $zip->close();
            }

            // Download the generated zip
//            return response()->download(public_path($fileName));
    }
}
