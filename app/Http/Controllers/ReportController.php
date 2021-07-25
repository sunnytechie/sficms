<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Attendance $attendance) {
        $profileId = $profile->id;
        $profile = $profile->id;
        $profileId = $profile->id;
        $profileId = $profile->id;
        $profileId = $profile->id;

        return view('reports.index');
    }
}
