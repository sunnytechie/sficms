<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabankController extends Controller
{
    public function import(){
        return view('databank.import');
    }
}
