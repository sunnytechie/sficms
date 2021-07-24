<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile.index');
    }

    public function show() {
        print "Show";
    }

    public function new() {
        return view('profile.new');
    }

    public function store() {
        print "Store";
    }

    public function edit() {
        print "Edit";
    }

    public function update() {
        print "Update";
    }
}
