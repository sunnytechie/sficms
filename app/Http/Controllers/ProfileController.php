<?php

namespace App\Http\Controllers;


use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Report;
use App\Models\Attendance;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $current_user = Auth::user()->id;
        $yourProfiles = Profile::orderBy('created_at', 'DESC')->where('user_id', $current_user)->get();

        return view('profile.index', compact('yourProfiles'));
    }

    public function show(Profile $profile) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $now = Carbon::now();
        // First day of the month.
        $beginMonthDate = date('Y-m-01', strtotime($now));
        // Last day of the month.
        $endMonthDate = date('Y-m-t', strtotime($now));
        $profileId = $profile->id;

        $fetchWeeklyActivity = Report::whereBetween('created_at', [$beginMonthDate, $endMonthDate])
                                        ->where('profile_id', $profileId)
                                        ->get();

        $profileName = $profile->name;
        $profileEmail = $profile->email;
        $profilePhone = $profile->phone;
        $profileCountry = $profile->country;
        $profileCity = $profile->city;
        $profileArea = $profile->area;
        $profileAvatar = $profile->avatar;
        $profileCreatedAt = $profile->created_at;
       return view('profile.show', compact('profileId', 'fetchWeeklyActivity', 'profileName', 'profileEmail', 'profilePhone', 'profileCountry', 'profileCity', 'profileArea', 'profileAvatar', 'profileCreatedAt'));
    }

    public function new() {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $currentUser = Auth::user()->id;
        $countries = new Countries();
        $all = $countries->all();
        $locationsArea = Location::where('area', '!=', '')
                                   ->where('user_id', $currentUser)
                                   ->get();

        $locationsCity = Location::where('city', '!=', '')
                                   ->where('user_id', $currentUser)
                                   ->get();

        return view('profile.new', compact('all', 'locationsArea', 'locationsCity'));
    }

    public function store(Request $request) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $user_id = Auth::user()->id;

        $data = request()->validate([
            'avatar' => ['required', 'image'],
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'area' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => '',
        ]);

        

        //Images for Thumbnails 300x300
        $thumbnailPath = cloudinary()->upload($request->file('avatar')->getRealPath(), [
            'folder' => 'sficms',
            'transformation' => [
                'width' => 300,
                'height' => 300,
                "crop" => "crop"
            ]
        ])->getSecurePath();


        Profile::create([
            'user_id' => $user_id,
            'avatar' => $thumbnailPath,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'area' => $data['area'],
            'city' => $data['city'],
            'country' => $data['country'],
            'zip_code' => $data['zip_code'],
            ]);


            return redirect('/accounts/list')->with('status', 'A New Profile has been added to your account!');
    }

    public function edit() {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        print "Edit";
    }

    public function update() {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        print "Update";
    }
}
