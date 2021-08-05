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
        return view('location\new');
    }

    public function store(Request $request) {
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
