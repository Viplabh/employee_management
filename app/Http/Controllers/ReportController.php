<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report()
    {
        return view('agent.report');
    }
    public function daterange(Request $request)
    {
        $dates = explode(' - ', $request->DateFrom);
        $startDate = $dates[0];
        $endDate = $dates[1];
        $start_Date = date('Y-m-d', strtotime($startDate));
        $end_Date = date('Y-m-d', strtotime($endDate));
    
        $user = Auth::user();
    
        if (Auth::user()->role !== "admin") {
            $userEmail = $user->email;
            $data = DB::table('uploaded_data')
                ->whereBetween('created_at', [$start_Date, $end_Date])
                ->where('updated_by', $userEmail)
                ->get();
        } else {
            $data = DB::table('uploaded_data')
                ->whereBetween('created_at', [$start_Date, $end_Date])
                ->get();
        }
        if ($data->isEmpty()) {
            $request->session()->flash('error', 'No data found between this range.');
            return redirect('/agent/report'); 
        }
    
        return view('/agent/report', compact('data'));
    }
}