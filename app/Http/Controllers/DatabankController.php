<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\DatabankImport;
use Maatwebsite\Excel\Facades\Excel;

class DatabankController extends Controller
{
    public function import()
    {
        return view('databank.import');
    }


    public  function importCSV(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DatabankImport,  $file);
        return back()->with('msg', 'Import Upload was successfull');
    }
}
