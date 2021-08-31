<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SentMessagesController extends Controller
{

    public function index()
    {

        return view('Email.sentMsgs');
    }

}
