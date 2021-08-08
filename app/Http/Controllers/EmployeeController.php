<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('employee.index');
    }

    public function show() {
        return view('employee.show');
    }

    public function new() {
        $countries = new countries();
        $countries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
                            ->first()
                            ->hydrateStates()
                            ->states
                            ->sortBy('name');
        return view('employee.new', compact('states', 'countries'));
    }

    public function store(Request $request) {

        $data = request()->validate([
            'avatar' => ['required', 'image'],
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'area' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip_code' => '',
            avatar

            
        ]);
        return redirect()->route('employee.index', $reportId)->with('status', 'Report has been submitted!');
    }

    public function edit() {
        print "EDIT";
    }

    public function update() {
        print "Update";
    }

    public function destroy() {
        print "DESTROY";
    }
}
