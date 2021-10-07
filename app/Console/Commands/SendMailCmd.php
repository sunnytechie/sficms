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
    protected $signature = 'sendmailto:contact';

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
        $this->now = date('Y-m-d H:i:s', strtotime(Carbon::now()->addHour()));
        logger($this->now);

        $msg = messages::get();
        if ($msg) {
            $msg->where('schedule_time', $this->now)->each(function ($message) {
                $emails =  unserialize($message->emails_to_be_sent);
                $details = [
                    $message->title,
                    $message->message,
                ];
                foreach ($emails as $email) {

                    $name = Contact::where('email', $email)->first()->name;

                    dispatch(new ScheduleOrSendMail($email, new Email($details, $name)));
                }
                $message->save();// update the status of the message to sent
            });
        }
    }
}
