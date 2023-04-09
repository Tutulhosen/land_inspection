<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //show schedule page
    public function SchedulePage(Request $request)
    {
        $schedule_data= DB::table('inspection_schedule')->latest()->get();
        return view('dashboard.pages.schedule.schedule', compact('schedule_data'));
    }
}
