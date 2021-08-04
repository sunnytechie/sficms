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
            $country_ids = $country->get('id');
            //state saved
            State::updateOrCreate([
                'name' => $row[4],
            ]);
            $size = count($country_ids); // it saves more memory to set the array length to a variable with the for loop
            for ($i = 0; $i < $size; $i++) {
                State::where('name', $row[4])->update(['countries_id' => $country_ids[$i]['id']]);
            }
            //area saved
            $area = Area::updateOrCreate([
                'name' => $row[3]
            ]);

            $state_ids = State::get('id');
            $stateArraySize = count($state_ids);
            for ($i = 0; $i < $size; $i++) {
                Area::where('name', $row[3])->update(['countries_id' => $country_ids[$i]['id'], 'state_id' => $state_ids[$i]['id']]);
            }
        }
    }
}
