<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\User;
use App\Models\Employee;
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
        //count articles
        $articles = Article::count();
        //dd(value($articles));
        //count contacts
        $contacts = Contact::count();
        //count employees
        $employees = Employee::count();
        //count profiles
        $profiles = Profile::count();
        //count users
        $users = User::count();

        
        $active = 'dashboard';
        $allEmailsCount = Contact::all()->count();
        $articlesToBeApproved = Article::where('status', Null)->orderBy('created_at', 'desc')->paginate(10);
        return view('home', compact('articlesToBeApproved', 'allEmailsCount', 'active', 'articles', 'contacts', 'employees', 'profiles', 'users'));
    }
}
