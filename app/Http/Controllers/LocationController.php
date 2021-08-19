<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;

class LocationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new() {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        return view('location\new');
    }

    public function store(Request $request) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '3' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $currentUser = Auth::user()->id;
        $data = request()->validate([
            'area' => 'required',
            'city' => 'required',
        ]);

        Location::create([
            'area' => $data['area'],
            'city' => $data['city'],
            'user_id' => $currentUser,
            ]);

        return back()->with('status_upload', 'Location is succesfully saved.*');
    }
}
