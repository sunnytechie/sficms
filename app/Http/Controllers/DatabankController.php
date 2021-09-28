<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\DatabankImport;
use App\Models\Databank;
use Maatwebsite\Excel\Facades\Excel;

class DatabankController extends Controller
{

    public function index()
    {
        $categoryLists =   Databank::get()->pluck('category');

        return view('databank.alldata', compact('categoryLists'));
    }

    public function show($slug)
    {
        $databankInfo = Databank::where('category', $slug)->get();
        return view('databank.show', compact('databankInfo'));
    }

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
