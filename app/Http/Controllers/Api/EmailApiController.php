<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\StateResource;
use App\Models\Contact;
use App\Models\Country;
use Illuminate\Http\Request;

class EmailApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**  Start Location resource methods for their routes */
    public function country()
    {

        return EmailResource::collection(Country::all());
    }

    public function state()
    {

        return StateResource::collection(Country::all());
    }

    public function area()
    {

        return AreaResource::collection(Country::all());
    }


    public function chapter()
    {

        return ChapterResource::collection(Country::all());
    }

    public function allContact()
    {

        return ContactResource::collection(Country::all());
    }
    /**  End of Location resource methods for their routes */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item, $tableName)
    {
     /** this just the most important stuff  **/
      $details = "App\\Models\\" . $tableName; //so this code means that  the model name is like the object key name from the frontend . for example menu { Country } so  all class names must be like the incoming variables from the get parameter
        $result_id = $details::where('name', $item)->get()->find(1);
        return ResultResource::collection($result_id->contacts);
        //I can use eloquent relationships to do it though (thats what i think)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
