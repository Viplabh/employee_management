<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DataUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search()
    {
        return view('agent.search');
    }


    public function searchPhoneNumber(Request $request)
    { {
            try {
                $phone = $request->input('phone');
                $results = DataUpload::where('mobile_no', $phone)->get();
                //  dd($results[0]->name);
                if ($results->isEmpty()) {
                    return back()->with('error', 'No results found');
                }
                return view('agent.search', ['results' => $results]);
            } catch (Exception $e) {
                return back()->with("error", "Something Went Wrong");
            }
        }
    }


    public function customer_status(Request $request)
    {
        try {
            $status = $request->input('status');
            $remarks = $request->input('remarks');
            $number = $request->input('number');

            $sql = DB::table('uploaded_data')
                ->where('id', $number)
                ->update([
                    'status' => $status,
                    'remarks' => $remarks,
                    'updated_by' => Auth::user()->email,
                ]);

            return redirect('agent/search')->with('success', 'Details Updated Successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Something Went Wrong');
        }
    }
    
}
