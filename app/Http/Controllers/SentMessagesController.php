<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\messages;
use Illuminate\Http\Request;

class SentMessagesController extends Controller
{

    public function index()
    {
        $active = 'email';
       $messages = messages::all();
        return view('Email.sentMsgs', compact('messages', 'active'));
    }


}
