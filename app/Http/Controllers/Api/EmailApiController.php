<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\EmailResource;
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
    public function show($id)
    {
        //
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
