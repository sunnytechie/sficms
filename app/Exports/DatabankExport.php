<?php

namespace App\Exports;

use App\Models\Databank;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class DatabankExport implements FromQuery

{
    use Exportable;

    public function __construct($catSlug)
    {
            $this->catSlug = $catSlug;
    }

    public function query(){
        return Databank::query()->where('category',  $this->catSlug);
    }
}
