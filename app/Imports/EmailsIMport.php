<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Collection;
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
        foreach ($ro as $row) {
            Contact::create([
                'name' => $row[1],
                // 'chapter' => $row[2],
                // 'area' => $row[3],
                // 'state' => $row[4],
                // 'country' => $row[5],
                'email' => $row[6],
                'user_id' => $row[7],
            ]);
        }
    }
}
