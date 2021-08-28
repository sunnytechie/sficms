<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard() {
        $allEmailsCount = Contact::all()->count();
        $articlesToBeApproved = Article::where('status', Null)->orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('articlesToBeApproved', 'allEmailsCount'));
    }
}
