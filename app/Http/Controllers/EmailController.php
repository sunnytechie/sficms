<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Chapter;
use App\Models\State;
use PragmaRX\Countries\Package\Countries;

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

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'email' => 'required|unique:contacts,email',
            'country' => 'required',
            'state' => 'required',
            'area'  => 'required',
            'chapter' => 'required',

        ]);

        $country = new Country();
        $country->name = $request->country;
        $country->save();

        $state = new State();
        $state->name = $request->state;
        $country_id = Country::where('name', $request->country)->first()->id;
        $state->countries_id = $country_id;
        $state->save();


        $area = new Area();
        $area->name = $request->area;
        $state_id = State::where('name', $request->state)->first()->id;
        $area->state_id = $state_id;
        $country_id = Country::where('name', $request->country)->first()->id;
        $area->countries_id = $country_id;
        $area->save();

        $chapter = new Chapter();
        $chapter->name = $request->chapter;
        $chapter->country_id = $country_id;
        $chapter->state_id = $state_id;
        if ($area_id = Area::where('name', $request->area)->first()->id) {
            $chapter->areas_id =  $area_id;
        }
        $chapter->save();

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->title = $request->title;
        $contact->email = $request->email;
        $contact->chapters_id = $chapter->id;
        $contact->states_id = $state->id;
        $contact->areas_id = $area->id;
        $contact->country_id = $country->id;
        $contact->user_id = Auth::user()->id;
        $contact->save();

        return back()->with('msg', 'Successfull !!!');
    }
}
