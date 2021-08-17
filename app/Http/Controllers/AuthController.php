<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index() {
        $users = User::orderBy('id', 'DESC')->get();
        return view('authentications.index', compact('users'));
    }

    public function store(Request $request) {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'user_type' => 'required',
            'password' => 'required',
        ]);

        
        //Finding Authentication level based on the user_type
        $userTypeValue = $request->input('user_type');

        switch ($userTypeValue) {
                case '1':
                $auth_level = "Super Admin";
                break;
                case '2':
                $auth_level = "Administrator";
                break;
                case '3':
                $auth_level = "Area President";
                break;
                case '4':
                $auth_level = "Head Office";
                break;
                case '5':
                $auth_level = "Customer Care";
                break;
                case '6':
                $auth_level = "Human Resource";
                break;
                case '7':
                $auth_level = "Reports";
                break;

                    default:
                    $auth_level = "None";
                        break;
        }

        User::create([
            'auth_level' => $auth_level,
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($request->password),
        ]);
        $users = User::orderBy('id', 'DESC')->get();

        return redirect()->route('auth.index')->with('status', 'New User created successfully!');
    }

    public function edit() {
        print "Edit";
    }

    public function update() {
        print "Update";
    }

    public function destroy(User $auth) {
        $authID = $auth->id;
        $auth = User::find($authID);
        $auth->delete(); //returns true/false

        return redirect()->back()->with('status', 'Result has been deleted from the database!');
    }
}
