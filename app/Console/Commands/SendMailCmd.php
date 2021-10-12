<?php

namespace App\Console\Commands;

use App\Jobs\ScheduleOrSendMail;
use App\Mail\Email;
use App\Models\Contact;
use App\Models\messages;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMailCmd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmailto:contacts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For scheduling mails that are to be sent ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->now = date('Y-m-d H:i', strtotime(Carbon::now()->addHour()));
        $msg = messages::get();
        if ($msg) {
            $msg->where('schedule_time',  $this->now)->each(function ($message) {

                $details = [
                    'title' => $message->title,
                    'message' => $message->message,
                ];
                //get the mails to be senct using the  One to Many relationship of messages and contacts
                foreach ($message->contacts as $contact) {
                    $name = Contact::where('email', $contact->email)->first()->name;

                    dispatch(new ScheduleOrSendMail($contact->email, new Email($details, $name)));
                }
                $message->delivered = "YES";
                $message->save(); // update the status of the message to sent
            });
        }
    }
}
