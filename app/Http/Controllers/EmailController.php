<?php

namespace App\Http\Controllers;
use App\Models\Contact;

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
            $contacts = Contact::all();

        return view('email.addcontact', compact('contacts'));
    }
}
