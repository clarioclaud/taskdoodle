<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Mail\LibraryExpire;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //$details = Subscription::with('book','user')->where('expired_at', Carbon::tomorrow())->get();
        //$date = date('Y-m-d',strtotime("+1 day",strtotime(date('Y-m-d'))));
        $details = DB::table('subscriptions')->where('expired_at',Carbon::tomorrow()->format('Y-m-d'))->get();
        if (count($details) > 0) {
            foreach ($details as $det) {
                $user = DB::table('users')->where('id',$det->user_id)->first();
                $book = DB::table('books')->where('id',$det->book_id)->first();
                Mail::to($user->email)->send(new LibraryExpire($user,$book));            
            }
        }         
    }
}
