<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $profiles = Profile::orderBy('id', 'DESC')
                             ->get();

        return view('attendance.index', compact('profiles'));
    }

    public function new() {
        $currentUser = Auth::user()->id;
        $now = Carbon::now();
        $date = new Carbon( $now );
        $year_now = $date->year;
        
        $profiles = Profile::where('user_id', $currentUser)->get();

        return view('attendance.new', compact('profiles', 'year_now'));
    }

    public function store(Request $request) {

        $data = request()->validate([
            'profile_id' => 'required',
            'area' => 'required',
            'chapter' => 'required',
            'date_month' => 'required',
            'date_week' => 'required',
            'date_day' => 'required',
            'capacity' => 'required',
            'tithe_money' => 'required',
            'tithe_hq' => 'required',
            'date_year' => 'required',
        ]);

        Attendance::create([
            'profile_id' => $data['profile_id'],
            'area' => $data['area'],
            'chapter' => $data['chapter'],
            'date_month' => $data['date_month'],
            'date_week' => $data['date_week'],
            'date_day' => $data['date_day'],
            'capacity' => $data['capacity'],
            'tithe_money' => $data['tithe_money'],
            'tithe_hq' => $data['tithe_hq'],
            'date_year' => $filteredDate,
            ]);

        return back()->with('status_upload', 'Report has been submitted successfully to the database*');
    }

    public function edit() {
        print "Edit";
    }

    public function update() {
        print "Update";
    }

        public function close() {
        print "Close edit";
    }
}
