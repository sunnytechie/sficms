<?php

namespace App\Http\Controllers;

use App\Imports\EmailsIMport;
use App\Models\Area;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Chapter;
use App\Models\State;
use PragmaRX\Countries\Package\Countries;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '5' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        return view('Email.composeMail');
    }

    public function listEmails()
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '5' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $contacts = Contact::all();

        return view('Email.list', compact('contacts'));
    }

    public function addContact()
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '5' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $countries = new countries();
        $majorContries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name');
        $areas = Area::all();
        $chapters = Chapter::all();
        return view('Email.addcontact', compact('majorContries', 'states', 'areas', 'chapters'));
    }

    public  function editContact($id)
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '8' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $countries = new countries();
        $majorContries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name');
        $contact = Contact::findOrFail($id);
        return view('Email.edit', compact('contact', 'majorContries'));
    }

    public function store(Request $request)
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '5' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|unique:contacts,email',
            'country' => 'required',
            'state' => 'required',
            'area'  => 'required',
            'chapter' => 'required',
            'category' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->chapter = $request->chapter;
        $contact->state = $request->state;
        $contact->area = $request->area;
        $contact->country = $request->country;
        $contact->category = $request->category;
        $contact->user_id = Auth::user()->id;
        $contact->save();

        return back()->with('msg', 'Your personal information upload Successfull !!!');
    }

    public function deleteContact($id)
    {
        $authInteger = Auth::user()->user_type;
        if ($authInteger != '8' && $authInteger != '1') {
            return redirect()->route('auth.error')->with('Errormsg', 'You dont have the Authorization to view this file !!!');
        }
        Contact::find($id)->delete();
        return back()->with('msg', 'Contact was successfully Deleted. Thank you !!!');
    }


    public  function importCSV(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new EmailsIMport,  $file);
        return back()->with('msg', 'Import Upload was successfull');
    }
}
