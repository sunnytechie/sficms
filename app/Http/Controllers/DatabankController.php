<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DatabankExport;
use App\Imports\DatabankImport;
use App\Models\Databank;
use Maatwebsite\Excel\Facades\Excel;

class DatabankController extends Controller
{

    public function index()
    {
        $active = 'databank';
        $categoryLists =   Databank::get()->pluck('category');

        return view('databank.alldata', compact('categoryLists', 'active'));
    }

    public function show($Catslug)
    {
        $active = 'databank';
        $databankInfo = Databank::where('category', $Catslug)->get();
        return view('databank.show', compact('databankInfo', 'Catslug', 'active'));
    }

    public function import()
    {
        $active = 'databank';
        return view('databank.import', compact('active'));
    }


    public  function importCSV(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new DatabankImport,  $file);

        return back()->with('msg', 'Import Upload was successfull');
    }

    public function export($catSlug)
    {
        //this is a little bit different fromt the normal excel export in that i am using the fromQuery query builder approach and not the default collection. I needed this because I do  not want to export the whole databank but only the selected category from the db
        //the $catSlug is the selected category aka, e.g, YDF, HOC, etc. For e.g, catSlug=YDF in the url to export the YDF category only
        //
        return (new DatabankExport($catSlug))->download($catSlug . 'Excel.xlsx'); // for e.g, YDFExcel.xlsx is the name of the file that will be exported
    }
}
