<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $allEmailsCount = Contact::all()->count();
        $articlesToBeApproved = Article::where('status', Null)->orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('articlesToBeApproved', 'allEmailsCount'));
    }
}
