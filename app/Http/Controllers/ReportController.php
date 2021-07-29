<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Attendance $attendance) {
        $attendanceId = $attendance->id;

        $profile = Profile::find($attendance);

        $profileID = $attendance->profile->id;
        $profileArea = $attendance->profile->area;
        $profileCity = $attendance->profile->city;
        $profileCountry = $attendance->profile->country;

        $getAttendanceReport = Attendance::orderBy('id', 'DESC')
                                           ->where('profile_id', $attendanceId)
                                           ->get();

        $getAllAttendanceAreas = Attendance::orderBy('area')->get();

        return view('reports.index', compact('getAttendanceReport', 'profileArea', 'profileCity', 'profileCountry', 'getAllAttendanceAreas'));
    }

    public function search(Request $request) {

        $getAllAttendanceAreas = Attendance::orderBy('area')->get();

        //Get all request
        $selected_month = $request->get('selected_month');
        $selected_year = $request->get('selected_year');
        $selected_area = $request->get('selected_area');

        $reports = Attendance::where('date_month', $selected_month)
                              ->where('date_year', $selected_year)
                              ->where('area', $selected_area)
                              ->get();
        
                $week1 = "Week 1";
                $week2 = "Week 2";
                $week3 = "Week 3";
                $week4 = "Week 4";
                $week5 = "Week 5";

       $reportsWeekOne = Attendance::where('date_month', $selected_month)
                              ->where('date_year', $selected_year)
                              ->where('area', $selected_area)
                              ->where('date_week', $week1)
                              ->get();

        return view('reports.search', compact('reports', 'getAllAttendanceAreas'));
    }
}
