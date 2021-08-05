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

        foreach ($ro as $row) {
            //country saved
            $country = Country::where('name', $row[5])->updateOrCreate(['name' => $row[5]]);
            $country_ids = $country->get('id')->toArray();

            $size = count($country_ids); // it saves more memory to set the array length to variable with the for loop
            //states saved
            $states = State::where('name', $row[4])->first(); //this checks if the state already exis
            if ($states === null) {
                State::updateOrCreate(['name' => $row[4]]);
                for ($i = 0; $i < $size; $i++) {
                    State::updateOrCreate(['name' => $row[4]], ['countries_id' => $country_ids[$i]['id']]);
                }
            }

            //Area saved
            $states_ids = State::get('id')->toArray();

            // dd($states_ids);
            $areas = Area::where('name', $row[3])->first(); //this checks if the area already exist
            if ($areas === null) {
                Area::updateOrCreate(['name' => $row[3]]);
                for ($i = 0; $i < $size; $i++) {

                    Area::updateOrCreate(['name' => $row[3]], ['countries_id' => $country_ids[$i]['id'], 'state_id' => $states_ids[$i]['id']]);
                    // dd($states_ids[$i]['id']);
                }
            }
            //chapter saved
            $areas_id = Area::get('id')->toArray();
            $chapters = Chapter::where('name', $row[2])->first(); //this checks if the chapter already exist
            if ($chapters === null) {
                Chapter::updateOrCreate(['name' => $row[2]]);
                for ($i = 0; $i < $size; $i++) {
                    Chapter::updateOrCreate(['name' => $row[2]], ['country_id' => $country_ids[$i]['id'], 'state_id' => $states_ids[$i]['id'], 'areas_id' => $areas_id[$i]['id']]);
                }
            }
            //contact saved
            $chapters_id = Chapter::get('id')->toArray();
            $contacts = Contact::where('name', $row[1])->first(); //this checks if the contact already exist
            if ($contacts === null) {
                Contact::updateOrCreate(['name' => $row[1], 'email' => $row[6], 'user_id' => Auth::user()->id]);
                for ($i = 0; $i < $size; $i++) {
                    Contact::updateOrCreate(['name' => $row[1]], ['country_id' => $country_ids[$i]['id'], 'states_id' => $states_ids[$i]['id'], 'areas_id' => $areas_id[$i]['id'], 'chapters_id' => $chapters_id[$i]['id']]);
                }
            }
        }
    }
}
