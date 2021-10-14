<?php

namespace App\Imports;

use App\Models\Area;
use App\Models\Databank;
use App\Models\Country;
use App\Models\State;
use App\Models\Chapter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;


class DatabankImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $y = $rows->toArray(); // convert collection to array
        $ro = array_splice($y, 1); // Remove headers

        foreach ($ro as $key => $row) {
            Databank::updateOrCreate(
                ['email' => $row[2]],

                [
                    'fullname' => $row[1],
                    'email' => $row[2],
                    'phone' => $row[3],
                    'area' => $row[4],
                    'position' => $row[5],
                    'occupation' => $row[6],
                    'member' => $row[7],
                    'category' => $row[8]
                ]
            );
        }
    }
}
