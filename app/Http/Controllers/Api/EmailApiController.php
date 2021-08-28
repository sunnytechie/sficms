<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\categoryResource;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\StateResource;
use App\Mail\Email;
use App\Models\Area;
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

        $country = Contact::get('country')->unique('country');

        return EmailResource::collection($country);
    }

    public function state()
    {
        $state =  Contact::get('state')->unique('state');

        return StateResource::collection($state);
    }

    public function area()
    {
        $area = Contact::get('area')->unique('area');

        return areaResource::collection($area);
    }


    public function chapter()
    {

        $chapter = Contact::get('chapter')->unique('chapter');

        return chapterResource::collection($chapter);
    }

    public function category()
    {
        $category = Contact::get('category')->unique('category');

        return categoryResource::collection($category);
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

            foreach ($request->email as $key => $mails) {

              $name = Contact::where('email', $mails)->first()->name;

                Mail::to($mails)->send(new Email($details, $name));
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

        $contacts = Contact::where($tableName, $item)->get();

        return ResultResource::collection($contacts);
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
