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

        $data = request()->validate([
            'area' => 'required',
            'chapter' => 'required',
            'city' => 'unique:locations|max:255',
        ]);

        Location::create([
            'area' => $data['area'],
            'city' => $data['city'],
            'chapter' => $data['chapter'],
            ]);

        return back()->with('status_upload', 'Location is succesfully saved.*');
    }
}
