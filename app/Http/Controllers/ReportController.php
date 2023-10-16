<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
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

        $data = DB::table('uploaded_data')
            ->whereBetween('created_at', [$start_Date, $end_Date])
            ->get();
        return view('agent.report', compact('data'));
       
    }
}