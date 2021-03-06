<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\categoryResource;
use App\Http\Resources\ChapterResource;
use App\Http\Resources\ContactResource;
use App\Http\Resources\EmailResource;
use App\Http\Resources\ResultResource;
use App\Http\Resources\StateResource;
use App\Jobs\ScheduleOrSendMail;
use App\Mail\Email;
use App\Models\Area;
use App\Models\Contact;
use App\Models\Country;
use App\Models\messages;
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

        $msg = new messages(); // there is a reason while I actually instanciated the message class above the if statement so that i can able to chain the methods (esp $msg-save(), etc) without having if statement scope issues or interferance

        if ($request->has('email') && $request->has('message') && $request->has('title')) {

            $details = [
                'title' => $request->title,
                'message' => $request->message
            ];

            $msg->message = $request->message;
            $msg->title = $request->title;
            $msg->user_id = 1; //ideal method not working because of api authentication issues/// should actually be fixed with a package like passport or so
            $msg->save();
            //collecting the ids from the mail table esp as an array of integers
            foreach ($request->email as $email) {
                $id = Contact::where('email', $email)->first();
                $ContactIds[] = $id->id;
            }
            $msg->contacts()->syncWithoutDetaching($ContactIds); // behind the scene, this code does  insert into `contacts_messages` (`contact_id`, `messages_id`) values (5, 1)


            if ($request->when == 'not now') //make sense ...clean code {
            {
                foreach ($request->email as $key => $mails) {

                    $name = Contact::where('email', $mails)->first()->name;

                    dispatch(new ScheduleOrSendMail($mails, new Email($details, $name)));
                }

                return response()->json(['success' => 'Hurray..Mail was successfully sent']);
            } else {

                $scheduleDate =  date('Y-m-d H:i', strtotime($request->scheduleTime));
                $msg->schedule_time = $scheduleDate;
                $msg->save();
                return response()->json(['success' => 'Mail will be sent at this date', 'dateOfDelivery' => $scheduleDate]);
            }
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
    public function schedule(Request $request, $id)
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
