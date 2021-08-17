<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function index() {
        $users = User::orderBy('id', 'DESC')->get();
        return view('authentications.index', compact('users'));
    }

    public function show() {
        print "Show";
    }

    public function new() {
        print "New";
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

    public function destroy() {
        print "Destroy";
    }
}
