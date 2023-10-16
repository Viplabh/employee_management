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
    $request->validate([
        'file' => 'required|file|mimes:xls,xlsx',
    ]);

    $data = Excel::import(new UsersImport, request()->file('file'));

    session()->flash('success', 'Successfully Uploaded!!!');

    return redirect()->route('upload_data');
}
 
}       
