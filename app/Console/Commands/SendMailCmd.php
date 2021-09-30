<?php

namespace App\Console\Commands;

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
        return 0;
    }
}
