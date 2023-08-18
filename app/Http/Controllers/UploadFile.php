<?php

namespace App\Http\Controllers;

use App\Http\Traits\FileTrait;
use App\Models\File;
use Exception;
use Illuminate\Http\Request;

class UploadFile extends Controller
{
    function getData() {
        $data = File::get();
        return view('upload')->with('tableData', $data);
    }

//    public function upload($value) {
//        dd($value);
////        foreach($request->file('fileToUpload') as $key => $file) {
////            echo '===>';
////            echo 'File Name: '.$file->getClientOriginalName();
////            echo '<br>';
////        }
////        return;
//
//        $file = $request->file('fileToUpload');
//        $name = $request->get('name');
//        $file->storeAs(
//            'public/files', $file->getClientOriginalName()
//        );
//        File::create([
//            'name' => $name,
//            'file_name' => $file->getClientOriginalName()
//        ]);
//
//        return redirect()->route('upload');
//    }

    function uploadFile(Request $request) {
        $validate = $request->validate([
            'fileToUpload' => ['required'],
            'name' => ['required']
        ]);

        File::create([
            'name' => $request->get('name'),
            'file_name' => $request->file('fileToUpload')
        ]);

        return redirect()->route('upload');
    }

    function edit($id) {
        $data = File::find($id);
        return view('update')->with('id', $id)->with('tableData', $data);
    }

    function updateFile($id, Request $request) {
        $model = File::find($id);
        if ($model) {
            $model->fill([
                'name' => $request->get('name'),
                'file_name' => $request->file('fileToUpload') ? $request->file('fileToUpload')->getClientOriginalName() : $model['file_name']
            ]);

            if ($model->isDirty()) {
                $model->save();
            }

            return redirect()->route('upload');
        } else {
            throw new Exception('Model Not Found');
        }
    }
}
