<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\StateResource;
use App\Mail\Email;
use App\Models\Contact;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use  App\Models\State;

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

        return StateResource::collection(State::all());
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

        return ContactResource::collection(Contact::all());
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
        if ($request->has('email') && $request->has('message') && $request->has('title')) {

            $details = [
                'title' => $request->title,
                'message' => $request->message
            ];

            foreach ($request->email as $mails) {
                Mail::to($mails)->send(new Email($details));
            }

            // foreach ($request->email as $email) {
            //     $id = contacts::where('email', $email)->first();
            //     $ContactIds[] = $id->id;
            // }

            // $mailModel = new messages();
            // $mailModel->message = $request->message;
            // $mailModel->title = $request->title;
            // $mailModel->user_id = Auth::id();
            // $mailModel->save();

            //add the relationship to for the many to many on the pivot table
            // $mailModel->contacts()->syncWithoutDetaching($ContactIds);

            return response()->json(['success' => 'Hurray..Mail was successfully sent']);
        }
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
        $result_id = $details::where('name', $item)->get()->first()->id;
        //get the id of the item name from the database

        $majorResult =  $details::where('id', $result_id)->get()->first(); // then find the primary key id of that item name from the database then find the contacts related to that item name
    
        if ($result_id) {
            return ResultResource::collection($majorResult->contacts);
        } else {

            return response()->json(['success' => 'There are no contacts from the area choosen !'], 500);
        }
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
