<?php

namespace App\Imports;

use App\Models\Area;
use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
use App\Models\Chapter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;


class EmailsIMport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $y = $rows->toArray();
        $ro = array_splice($y, 1); // Remove headers

        foreach ($ro as $key => $row) {
            Contact::updateOrCreate(
                ['email' => $row[3]],

                [
                    'name' => $row[1],
                    'chapter' => $row[5],
                    'area' => $row[6],
                    'state' => $row[7],
                    'country' => $row[8],
                    'category' => $row[4]
                ]
            );
        }
    }
}
