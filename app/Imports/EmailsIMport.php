<?php

namespace App\Imports;

use App\Models\Contact;
use App\Models\Country;
use App\Models\State;
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

            // Country::create([
            //     // 'name' => $row[1],
            //     // 'chapter' => $row[2],
            //     // 'area' => $row[3],
            //     // 'state' => $row[4],
            //     'name' => $row[5],
            //     // 'email' => $row[6],
            //     // 'user_id' => $row[7],
            // ]);

            $country = Country::where('name', $row[5])->updateOrCreate(['name' => $row[5]]);
            $country_ids = $country->get('id');

            foreach ($country_ids as $country_id) {
                State::updateOrCreate([
                    // 'name' => $row[1],
                    // 'chapter' => $row[2],
                    // 'area' => $row[3],
                    'name' => $row[4],
                    // 'name' => $row[5],
                    // 'email' => $row[6],
                    // 'user_id' => $row[7],
                    'countries_id' => $country_id->id,
                ]);
            }
        }
    }
}
