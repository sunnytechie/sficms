<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Chapter;
use App\Models\State;
use PragmaRX\Countries\Package\Countries;

use Illuminate\Http\Request;


class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('email.composeMail');
    }

    public function listEmails()
    {
        $contacts = Contact::all();

        return view('email.list', compact('contacts'));
    }

    public function addContact()
    {
        $countries = new countries();
        $majorContries = $countries->all();
        $states = $countries->where('name.common', 'Nigeria')
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name');
        $areas = Area::all();
        $chapters = Chapter::all();
        return view('email.addContact', compact('majorContries', 'states', 'areas', 'chapters'));
    }

    public function store(Request $request)
    {

        dd($request->all());
         $request->validate([
            'FirstName' => 'required',
            'LastName' => 'required',
            'title' => 'required',
            'email' => 'required|unique:contacts,email',
            'country' => 'required',
            'state' => 'required',
            'area'  => 'required',
            'chapter' => 'required',

        ]);

        $country_id = Country::where('name', $request->country)->get()->id();
        dd($country_id);
        $country = new Country();
        $country->name = $request->country;
        $country->save();

        $state_id = State::where('name', $request->state)->get()->id();
        $state = new State();
        $state->name = $request->state;
        $state->country_id = $country_id;
        $state->save();

        $area_id = Area::where('name', $request->state)->get()->id();
        $area = new Area();
        $area->name = $request->area;
        $area->state_id = $state_id;
        $area->countries_id = $country_id;
        $area->save();

        $chapter = new Chapter();
        $chapter->name = $request->chapter;
        $chapter->country_id = $country_id;
        $chapter->state_id = $state_id;
        $chapter->areas_id =  $area_id;
        $chapter->save();

        $contact = new Contact();
        $country->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->chapters_id = $chapter->id;
        $contact->states_id = $state->id;
        $contact->areas_id = $area->id;
        $contact->country_id = $country->id;
        $contact->save();

        return back()->with('msg', 'Successfull !!!');

    }
}
