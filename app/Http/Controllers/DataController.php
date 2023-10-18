<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\DataUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ExcelFileValidationRule;
use Maatwebsite\Excel\Facades\Excel;


class DataController extends Controller
{
    public function upload(Request $request)
    {

        return view('upload_data');
    }
    public function import(Request $request)
{
    $validatedData = $request->validate([
            'file' => 'required|max:255',
        ]);
        

    $data = Excel::import(new UsersImport, request()->file('file'));

    $request->session()->flash('success', 'File Uploaded Successfully');
    return redirect('upload_data');
}
 
}       
