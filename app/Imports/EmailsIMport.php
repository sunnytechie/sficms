<?php

namespace App\Imports;

use App\Models\Area;
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
            //country saved
            $country = Country::where('name', $row[5])->updateOrCreate(['name' => $row[5]]);
            $country_ids = $country->get('id')->toArray();


            $size = count($country_ids); // it saves more memory to set the array length to variable with the for loop
            $states = State::where('name', $row[4])->first();//this checks if the state already exis

            if ($states === null) {
                State::updateOrCreate(['name' => $row[4]]);
                for ($i = 0; $i < $size; $i++) {
                    State::updateOrCreate(['name' => $row[4]], ['countries_id' => $country_ids[$i]['id']]);
                }
            }
        }
    }
}
