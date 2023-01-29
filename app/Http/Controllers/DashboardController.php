<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fileUpload;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function dashboard(){
        $images=fileUpload::all();
        return view('dashboard',compact('images'));
    }
    public function upload(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            if ($check) {

                $fileName = $request->name;
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
}
