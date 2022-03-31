<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Report;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new(){
        $active = 'report';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $currentUser = Auth::user()->id;
        $now = Carbon::now();
        $date = new Carbon( $now );
        $year_now = $date->year;
        
        $profiles = Profile::where('user_id', $currentUser)->get();

        return view('reports.new', compact('profiles', 'year_now', 'active'));
    }

    public function store(Request $request) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $data = request()->validate([
            'profile_id'=> 'required',
            'area'=> 'required',
            'date_week'=> '',
            'date_month'=> 'required',
            'date_year'=> 'required',
            'spreadsheet'=> 'required|mimes:xlsx,xls',    
        ]);

        //dd($data);

        $currentUser = Auth::user()->id;
        $now = Carbon::now();
        $date = new Carbon( $now );
        $year_now = $date->year;
        
        //custom name branding
        $sfiBrand = "SFI_Report_";
        //generate random numbers
        $randString = rand(10000000000,99999999999);
        //request file
        $file = $request->file('spreadsheet');
        //Get file name
        $fileName = $file->getClientOriginalName();
        //rename file
        $fileName = $sfiBrand. time(). $randString. '_'. $fileName;
        //dd($fileName);
        //upload file
        $file->move(public_path('/uploads/reports/'), $fileName);

        $report = Report::create([
            'profile_id' => $data['profile_id'],
            'area' => $data['area'],
            'date_week' => $data['date_week'],
            'date_month' => $data['date_month'],
            'date_year' => $data['date_year'],
            'spreadsheet' => $fileName,
            ]);

        $report->save();
        
        $reportId = $report->id;
        $reportProfileId = $report->profile_id;
        
        return redirect()->route('show.profile', $reportProfileId)->with('status', 'Report has been submitted!');
    }

    public function edit(Report $report) {
        $active = 'report';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $currentUserId = Auth::user()->id;


        $profile_id = $report->profile_id;
        $reportUpdated_at = $report->updated_at;
        $id = $report->id;
        $area = $report->area;
        $date_week = $report->date_week;
        $date_month = $report->date_month;
        $date_year = $report->date_year;
        $spreadsheet = $report->spreadsheet;
        
        return view('reports.edit', compact('id', 'profile_id', 'area', 'date_week', 'date_month', 'date_year', 'spreadsheet', 'reportUpdated_at', 'active'));
    }

    public function update(Request $request, Report $report) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $reportID = $report->id;
         $data = request()->validate([
            'profile_id'=> 'required',
            'date_week'=> 'required',
            'date_month'=> 'required',
            'date_year'=> 'required',
        ]);

        //dd($data);

        if ($request->has('spreadsheet')) {
            //custom name branding
            $sfiBrand = "SFI_Report_";
            //generate random numbers
            $randString = rand(10000000000,99999999999);
            //request file
            $file = $request->file('spreadsheet');
            //Get file name
            $fileName = $file->getClientOriginalName();
            //rename file
            $fileName = $sfiBrand. time(). $randString. '_'. $fileName;
            //upload file
            $file->move(public_path('/uploads/reports/'), $fileName);
    
                Report::where('id', $reportID)->update(array_merge(
                    $data,
                    ['spreadsheet' => $fileName]
                ));
            }else {
                Report::where('id', $reportID)->update(array_merge(
                    $data,
                ));
            }
    

        return redirect()->back()->with('status', 'Report has been updated!');
    }
    
    public function index() {
        $active = 'report';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $fetchAllReportsArea = Report::orderBy('area', 'ASC')->get();

        $currentUserId = Auth::user()->id;
        $profiles = Profile::orderBy('id', 'DESC')
                            ->where('user_id', $currentUserId)
                            ->get();

        return view('reports.index', compact('profiles', 'fetchAllReportsArea', 'active'));
    }

    public function view(Report $report) {
        $active = 'report';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $fetchAllReportsArea = Report::orderBy('area', 'ASC')->get();

        $reportID = $report->id;

        $profile = Profile::find($reportID);
        $profileArea = $profile->area;
        $profileCity = $profile->city;
        $profileCountry = $profile->country;

        $reports = Report::orderBy('id', 'DESC')
                                ->where('profile_id', $reportID)
                                ->get();

        return view('reports.view', compact('reports', 'reportID', 'profileArea', 'profileCity', 'profileCountry', 'fetchAllReportsArea', 'active'));
    }

    public function search(Request $request) {
        $active = 'report';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $fetchAllReportsArea = Report::orderBy('area', 'ASC')->get();

        //$getAllAttendanceAreas = Attendance::orderBy('area')->get();
        //Get all request
        $selected_month = $request->get('selected_month');
        $selected_year = $request->get('selected_year');
        $selected_area = $request->get('selected_area');

        //dd($selected_month);
        //dd($selected_year);
        //dd($selected_area);

        $reports = Report::where('date_month', $selected_month)
                              ->where('date_year', $selected_year)
                              ->where('area', $selected_area)
                              ->get();

                              //dd("$reports");

        return view('reports.search', compact('reports', 'selected_month', 'selected_year', 'selected_area', 'fetchAllReportsArea', 'active'));
    }
}
