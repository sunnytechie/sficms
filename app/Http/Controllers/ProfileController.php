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
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $active = 'profile';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $current_user = Auth::user()->id;
        $yourProfiles = Profile::orderBy('created_at', 'DESC')->where('user_id', $current_user)->get();

        return view('profile.index', compact('yourProfiles', 'active'));
    }

    public function show(Profile $profile) {
        $active = 'profile';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $now = Carbon::now();
        $monthName = $now->format('F');
        //dd(value($monthName));
        
        $profileId = $profile->id;

        $fetchWeeklyActivity = Report::where('date_month', $monthName)
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
       return view('profile.show', compact('active', 'profileId', 'fetchWeeklyActivity', 'profileName', 'profileEmail', 'profilePhone', 'profileCountry', 'profileCity', 'profileArea', 'profileAvatar', 'profileCreatedAt'));
    }

    public function new() {
        $active = 'profile';
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

        return view('profile.new', compact('all', 'locationsArea', 'locationsCity', 'active'));
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
        $imagePath = request('avatar')->store('avatars', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
        $image->save();
        
        Profile::create([
            'user_id' => $user_id,
            'avatar' => $imagePath,
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

    public function edit(Profile $profile) {
        $active = 'profile';
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

        $profileID = $profile->id;
        $profileName = $profile->name;
        $profileEmail = $profile->email;
        $profilePhone = $profile->phone;
        $profileCountry = $profile->country;
        $profileCity = $profile->city;
        $profileArea = $profile->area;
        $profileAvatar = $profile->avatar;
        $profileCreatedAt = $profile->created_at;
        $profileZipCode = $profile->zip_code;

        return view('profile.edit', compact('active', 'profile', 'profileID', 'profileName', 'profileEmail', 'profilePhone', 'profileCountry', 'profileCity', 'profileArea', 'profileAvatar', 'profileCreatedAt', 'all', 'locationsArea', 'locationsCity', 'profileZipCode'));
    }

    public function update(Request $request, Profile $profile) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $profileID = $profile->id;
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'area' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
        ]);

        //dd(value($data));

        if ($request->has('avatar')) {
            $imagePath = request('avatar')->store('avatars', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();

            Profile::where('id', $profileID)->update(array_merge(
                $data,
                ['avatar' => $imagePath]
            ));
        }
        else {
            Profile::where('id', $profileID)->update(array_merge(
                $data,
            ));
        }

        Profile::where('id', $profileID)->update(array_merge(
            $data,
        ));

        return redirect()->back()->with('status', 'The Profile details has been updated!');
    }
}
