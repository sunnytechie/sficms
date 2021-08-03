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
        foreach ($rows as $row) {

            Contact::create([
                'id' => $row['id'],
                'name' => $row['name'],
                // 'chapter' => $row[2],
                // 'area' => $row[3],
                // 'state' => $row[4],
                // 'country' => $row[5],
                'email' => $row['email'],
                'user_id' => $row['user_id'],

            ]);
        }
    }
}
