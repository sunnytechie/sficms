<?php

namespace App\Exports;

use App\Models\Databank;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatabankExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Databank::all();
    }
}
