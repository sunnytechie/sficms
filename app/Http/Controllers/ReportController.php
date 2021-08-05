<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new(){
        $currentUser = Auth::user()->id;
        $now = Carbon::now();
        $date = new Carbon( $now );
        $year_now = $date->year;
        
        $profiles = Profile::where('user_id', $currentUser)->get();

        return view('reports.new', compact('profiles', 'year_now'));
    }

    public function store(Request $request) {
        $data = request()->validate([
            'profile_id'=> 'required',
            'area'=> 'required',
            'date_week'=> 'required',
            'date_month'=> 'required',
            'date_year'=> 'required',
            'chapter1'=> 'required',
            'chapter2'=> '',
            'chapter3'=> '',
            'chapter4'=> '',
            'chapter5'=> '',
            'chapter6'=> '',
            'chapter7'=> '',
            'chapter8'=> '',
            'chapter9'=> '',
            'chapter10'=> '',
            'chapter11'=> '',
            'chapter12'=> '',
            'day1'=> 'required',
            'day2'=> '',
            'day3'=> '',
            'day4'=> '',
            'day5'=> '',
            'day6'=> '',
            'day7'=> '',
            'day8'=> '',
            'day9'=> '',
            'day10'=> '',
            'day11'=> '',
            'day12'=> '',
            'capacity1'=> 'required',
            'capacity2'=> '',
            'capacity3'=> '',
            'capacity4'=> '',
            'capacity5'=> '',
            'capacity6'=> '',
            'capacity7'=> '',
            'capacity8'=> '',
            'capacity9'=> '',
            'capacity10'=> '',
            'capacity11'=> '',
            'capacity12'=> '',
            'income1'=> 'required',
            'income2'=> '',
            'income3'=> '',
            'income4'=> '',
            'income5'=> '',
            'income6'=> '',
            'income7'=> '',
            'income8'=> '',
            'income9'=> '',
            'income10'=> '',
            'income11'=> '',
            'income12'=> '',
            
        ]);

        $report = Report::create([
            'profile_id' => $data['profile_id'],
            'area' => $data['area'],
            'date_week' => $data['date_week'],
            'date_month' => $data['date_month'],
            'date_year' => $data['date_year'],
            'chapter1' => $data['chapter1'],
            'chapter2' => $data['chapter2'],
            'chapter3' => $data['chapter3'],
            'chapter4' => $data['chapter4'],
            'chapter5' => $data['chapter5'],
            'chapter6' => $data['chapter6'],
            'chapter7' => $data['chapter7'],
            'chapter8' => $data['chapter8'],
            'chapter9' => $data['chapter9'],
            'chapter10' => $data['chapter10'],
            'chapter11' => $data['chapter11'],
            'chapter12' => $data['chapter12'],
            'day1' => $data['day1'],
            'day2' => $data['day2'],
            'day3' => $data['day3'],
            'day4' => $data['day4'],
            'day5' => $data['day5'],
            'day6' => $data['day6'],
            'day7' => $data['day7'],
            'day8' => $data['day8'],
            'day9' => $data['day9'],
            'day10' => $data['day10'],
            'day11' => $data['day11'],
            'day12' => $data['day12'],
            'capacity1' => $data['capacity1'],
            'capacity2' => $data['capacity2'],
            'capacity3' => $data['capacity3'],
            'capacity4' => $data['capacity4'],
            'capacity5' => $data['capacity5'],
            'capacity6' => $data['capacity6'],
            'capacity7' => $data['capacity7'],
            'capacity8' => $data['capacity8'],
            'capacity9' => $data['capacity9'],
            'capacity10' => $data['capacity10'],
            'capacity11' => $data['capacity11'],
            'capacity12' => $data['capacity12'],
            'income1' => $data['income1'],
            'income2' => $data['income2'],
            'income3' => $data['income3'],
            'income4' => $data['income4'],
            'income5' => $data['income5'],
            'income6' => $data['income6'],
            'income7' => $data['income7'],
            'income8' => $data['income8'],
            'income9' => $data['income9'],
            'income10' => $data['income10'],
            'income11' => $data['income11'],
            'income12' => $data['income12'],
            ]);

            $reportId = $report->id;

            return redirect()->route('edit.report', $reportId)->with('status', 'Report has been submitted!');;
    }

    public function edit(Report $report) {
        $id = $report->id;
        $profile_id = $report->profile_id;
        $profiles = Profile::where('id', $profile_id)->get();

        $area = $report->area;
        $date_week = $report->date_week;
        $date_month = $report->date_month;
        $date_year = $report->date_year;
        $chapter1 = $report->chapter1;
        $chapter2 = $report->chapter2;
        $chapter3 = $report->chapter3;
        $chapter4 = $report->chapter4;
        $chapter5 = $report->chapter5;
        $chapter6 = $report->chapter6;
        $chapter7 = $report->chapter7;
        $chapter8 = $report->chapter8;
        $chapter9 = $report->chapter9;
        $chapter10 = $report->chapter10;
        $chapter11 = $report->chapter11;
        $chapter12 = $report->chapter12;
        $day1 = $report->day1;
        $day2 = $report->day2;
        $day3 = $report->day3;
        $day4 = $report->day4;
        $day5 = $report->day5;
        $day6 = $report->day6;
        $day7 = $report->day7;
        $day8 = $report->day8;
        $day9 = $report->day9;
        $day10 = $report->day10;
        $day11 = $report->day11;
        $day12 = $report->day12;
        $capacity1 = $report->capacity1;
        $capacity2 = $report->capacity2;
        $capacity3 = $report->capacity3;
        $capacity4 = $report->capacity4;
        $capacity5 = $report->capacity5;
        $capacity6 = $report->capacity6;
        $capacity7 = $report->capacity7;
        $capacity8 = $report->capacity8;
        $capacity9 = $report->capacity9;
        $capacity10 = $report->capacity10;
        $capacity11 = $report->capacity11;
        $capacity12 = $report->capacity12;
        $income1 = $report->income1;
        $income2 = $report->income2;
        $income3 = $report->income3;
        $income4 = $report->income4;
        $income5 = $report->income5;
        $income6 = $report->income6;
        $income7 = $report->income7;
        $income8 = $report->income8;
        $income9 = $report->income9;
        $income10 = $report->income10;
        $income11 = $report->income11;
        $income12 = $report->income12;

        return view('reports.edit', compact('id', 'profile_id', 'profiles', 'area', 'date_week', 'date_month', 'date_year', 'chapter1', 'chapter2', 'chapter3', 'chapter4', 'chapter5', 'chapter6', 'chapter7', 'chapter8', 'chapter9', 'chapter10', 'chapter11', 'chapter12', 'day1', 'day2', 'day3', 'day4', 'day5', 'day6', 'day7', 'day8', 'day9', 'day10', 'day11', 'day12', 'capacity1', 'capacity2', 'capacity3', 'capacity4', 'capacity5', 'capacity6', 'capacity7', 'capacity8', 'capacity9', 'capacity10', 'capacity11', 'capacity12', 'income1', 'income2', 'income3', 'income4', 'income5', 'income6', 'income7', 'income8', 'income9', 'income10', 'income11', 'income12'));
    }

    public function update(Report $report) {
        $reportID = $report->id;
         $data = request()->validate([
            'profile_id'=> 'required',
            'area'=> 'required',
            'date_week'=> 'required',
            'date_month'=> 'required',
            'date_year'=> 'required',
            'chapter1'=> 'required',
            'chapter2'=> '',
            'chapter3'=> '',
            'chapter4'=> '',
            'chapter5'=> '',
            'chapter6'=> '',
            'chapter7'=> '',
            'chapter8'=> '',
            'chapter9'=> '',
            'chapter10'=> '',
            'chapter11'=> '',
            'chapter12'=> '',
            'day1'=> 'required',
            'day2'=> '',
            'day3'=> '',
            'day4'=> '',
            'day5'=> '',
            'day6'=> '',
            'day7'=> '',
            'day8'=> '',
            'day9'=> '',
            'day10'=> '',
            'day11'=> '',
            'day12'=> '',
            'capacity1'=> 'required',
            'capacity2'=> '',
            'capacity3'=> '',
            'capacity4'=> '',
            'capacity5'=> '',
            'capacity6'=> '',
            'capacity7'=> '',
            'capacity8'=> '',
            'capacity9'=> '',
            'capacity10'=> '',
            'capacity11'=> '',
            'capacity12'=> '',
            'income1'=> 'required',
            'income2'=> '',
            'income3'=> '',
            'income4'=> '',
            'income5'=> '',
            'income6'=> '',
            'income7'=> '',
            'income8'=> '',
            'income9'=> '',
            'income10'=> '',
            'income11'=> '',
            'income12'=> '',
        ]);
        Report::where('id', $reportID)->update(array_merge(
            $data,
        ));

        return redirect()->back()->with('status', 'Report has been updated!');;
    }
    
    public function index() {
        $currentUserId = Auth::user()->id;
        $profiles = Profile::orderBy('id', 'DESC')
                            ->where('user_id', $currentUserId)
                            ->get();

        return view('reports.index', compact('profiles'));
    }

    public function view(Report $report) {
        $reportID = $report->id;

        $profile = Profile::find($reportID);
        $profileArea = $profile->area;
        $profileCity = $profile->city;
        $profileCountry = $profile->country;

        $reports = Report::orderBy('id', 'DESC')
                                ->where('profile_id', $reportID)
                                ->get();

        return view('reports.view', compact('reports', 'reportID', 'profileArea', 'profileCity', 'profileCountry'));
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

        return view('reports.search', compact('reports', 'getAllAttendanceAreas', 'selected_month'));
    }
}
