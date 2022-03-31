<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Location;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $active = 'employee';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1' && $authInteger != '4') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $employees = Employee::get();
        return view('employee.index', compact('employees', 'active'));
    }

    public function show(Employee $employee) { 
        $active = 'employee';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1' && $authInteger != '4') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $employeeID = $employee->id;
        $employee_avatar = $employee->avatar;
        $employee_name = $employee->name;
        $employee_email = $employee->email;
        $employee_external_id = $employee->external_id;
        $employee_address = $employee->address;
        $employee_phone = $employee->phone;
        $employee_birthdate = $employee->birthdate;
        $employee_state = $employee->state;
        $employee_marital_status = $employee->marital_status;
        $employee_country = $employee->country;
        $employee_contact = $employee->contact;
        $employee_sex = $employee->sex;
        $employee_about = $employee->about;
        $employee_health = $employee->health;
        $employee_position = $employee->positon;
        $employee_department = $employee->department;
        $employee_unit = $employee->unit;
        $employee_unit_head = $employee->unit_head;
        $employee_office_building = $employee->office_building;
        $employee_supervisor_name = $employee->supervisor_name;
        $employee_nextkin_name = $employee->nextkin_name;
        $employee_nextkin_address = $employee->nextkin_address;
        $employee_nextkin_phone = $employee->nextkin_phone;
        $employee_nextkin_country = $employee->nextkin_country;
        $employee_nextkin_email = $employee->nextkin_email;
        $employee_nextkin_state = $employee->nextkin_state;
        $employee_nextkin_relationship = $employee->nextkin_relationship;
        $employee_nextkin_sex = $employee->nextkin_sex;
        
        return view('employee.show', compact('employeeID', 'employee_avatar', 'employee_name', 'employee_email', 'employee_external_id', 'employee_address', 'employee_phone', 'employee_birthdate', 'employee_state', 'employee_marital_status', 'employee_country', 'employee_contact', 'employee_sex', 'employee_about', 'employee_health', 'employee_position', 'employee_department', 'employee_unit', 'employee_unit_head', 'employee_office_building', 'employee_supervisor_name', 'employee_nextkin_name', 'employee_nextkin_address', 'employee_nextkin_phone', 'employee_nextkin_country', 'employee_nextkin_email', 'employee_nextkin_state', 'employee_nextkin_relationship', 'employee_nextkin_sex', 'active'));
    }

    public function new() {
        $active = 'employee';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1' && $authInteger != '4') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $countries = new countries();
        $countries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
                            ->first()
                            ->hydrateStates()
                            ->states
                            ->sortBy('name');
        return view('employee.new', compact('states', 'countries', 'active'));
    }

    public function store(Request $request) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }
        
        $data = request()->validate([
            'avatar' => ['required', 'image'],
            'name' => 'required',
            'email' => '',
            'external_id' => '',
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => '',
            'state' => 'required',
            'marital_status' => 'required',
            'country' => 'required',
            'contact' => '',
            'sex' => 'required',
            'about' => '',
            'health' => '',
            'position' => 'required',
            'department' => 'required',
            'unit' => '',
            'unit_head' => '',
            'office_building' => 'required',
            'supervisor_name' => 'required',
            'nextkin_name' => '',
            'nextkin_address' => '',
            'nextkin_phone' => '',
            'nextkin_country' => '',
            'nextkin_email' => '',
            'nextkin_state' => '',
            'nextkin_relationship' => '',
            'nextkin_sex' => '',
        ]);

        //Images for Thumbnails 300x300
        $imagePath = request('avatar')->store('avatars', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
        $image->save();

        Employee::create([
            'avatar' => $imagePath,
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'external_id'=> $data['external_id'],
            'address'=> $data['address'],
            'birthdate'=> $data['birthdate'],
            'state'=> $data['state'],
            'marital_status'=> $data['marital_status'],
            'country'=> $data['country'],
            'contact'=> $data['contact'],
            'sex'=> $data['sex'],
            'about'=> $data['about'],
            'health'=> $data['health'],
            'positon'=> $data['position'],
            'department'=> $data['department'],
            'unit'=> $data['unit'],
            'unit_head'=> $data['unit_head'],
            'office_building'=> $data['office_building'],
            'supervisor_name'=> $data['supervisor_name'],
            'nextkin_name'=> $data['nextkin_name'],
            'nextkin_address'=> $data['nextkin_address'],
            'nextkin_phone'=> $data['nextkin_phone'],
            'nextkin_country'=> $data['nextkin_country'],
            'nextkin_email'=> $data['nextkin_email'],
            'nextkin_state'=> $data['nextkin_state'],
            'nextkin_relationship'=> $data['nextkin_relationship'],
            'nextkin_sex'=> $data['nextkin_sex'],
            ]);


        return redirect()->route('index.employee')->with('status', 'New Employee profile created successfully!');
    }

    public function edit(Employee $employee) {
        $active = 'employee';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1' && $authInteger != '4') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $countries = new countries();
        $countries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
                            ->first()
                            ->hydrateStates()
                            ->states
                            ->sortBy('name');
                            
                            $employeeID = $employee->id;
                            $employee_avatar = $employee->avatar;
                            $employee_name = $employee->name;
                            $employee_email = $employee->email;
                            $employee_external_id = $employee->external_id;
                            $employee_address = $employee->address;
                            $employee_phone = $employee->phone;
                            $employee_birthdate = $employee->birthdate;
                            $employee_state = $employee->state;
                            $employee_marital_status = $employee->marital_status;
                            $employee_country = $employee->country;
                            $employee_contact = $employee->contact;
                            $employee_sex = $employee->sex;
                            $employee_about = $employee->about;
                            $employee_health = $employee->health;
                            $employee_position = $employee->positon;
                            $employee_department = $employee->department;
                            $employee_unit = $employee->unit;
                            $employee_unit_head = $employee->unit_head;
                            $employee_office_building = $employee->office_building;
                            $employee_supervisor_name = $employee->supervisor_name;
                            $employee_nextkin_name = $employee->nextkin_name;
                            $employee_nextkin_address = $employee->nextkin_address;
                            $employee_nextkin_phone = $employee->nextkin_phone;
                            $employee_nextkin_country = $employee->nextkin_country;
                            $employee_nextkin_email = $employee->nextkin_email;
                            $employee_nextkin_state = $employee->nextkin_state;
                            $employee_nextkin_relationship = $employee->nextkin_relationship;
                            $employee_nextkin_sex = $employee->nextkin_sex;

        return view('employee.edit', compact('states', 'countries', 'employeeID', 'employee_avatar', 'employee_name', 'employee_email', 'employee_external_id', 'employee_address', 'employee_phone', 'employee_birthdate', 'employee_state', 'employee_marital_status', 'employee_country', 'employee_contact', 'employee_sex', 'employee_about', 'employee_health', 'employee_position', 'employee_department', 'employee_unit', 'employee_unit_head', 'employee_office_building', 'employee_supervisor_name', 'employee_nextkin_name', 'employee_nextkin_address', 'employee_nextkin_phone', 'employee_nextkin_country', 'employee_nextkin_email', 'employee_nextkin_state', 'employee_nextkin_relationship', 'employee_nextkin_sex', 'active'));
    }

    public function update(Request $request, Employee $employee) {
        $active = 'employee';
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $employeeID = $employee->id;
        $data = request()->validate([
            'name' => 'required',
            'email' => '',
            'external_id' => '',
            'address' => 'required',
            'phone' => 'required',
            'birthdate' => '',
            'state' => 'required',
            'marital_status' => 'required',
            'country' => 'required',
            'contact' => '',
            'sex' => 'required',
            'about' => '',
            'health' => '',
            'positon' => 'required',
            'department' => 'required',
            'unit' => '',
            'unit_head' => '',
            'office_building' => 'required',
            'supervisor_name' => 'required',
            'nextkin_name' => '',
            'nextkin_address' => '',
            'nextkin_phone' => '',
            'nextkin_country' => '',
            'nextkin_email' => '',
            'nextkin_state' => '',
            'nextkin_relationship' => '',
            'nextkin_sex' => '',
        ]);

        if ($request->has('avatar')) {
            $imagePath = request('avatar')->store('avatars', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(300, 300);
            $image->save();

            Employee::where('id', $employeeID)->update(array_merge(
                $data,
                ['avatar' => $imagePath]
            ));
        }else {
            Employee::where('id', $employeeID)->update(array_merge(
                $data,
            ));
        }

        Employee::where('id', $employeeID)->update(array_merge(
            $data,
        ));

        return redirect()->back()->with('status', 'Employee has been updated!');
    }

    public function destroy(Employee $employee) {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '6' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $employeeID = $employee->id;
        $employee = Employee::find($employeeID);
        $employee->delete(); //returns true/false

        return redirect()->back()->with('status', 'Result has been deleted from the database!');
    }
}
