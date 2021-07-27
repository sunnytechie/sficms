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

        return view('reports.index', compact('getAttendanceReport', 'profileArea', 'profileCity', 'profileCountry'));
    }
}
