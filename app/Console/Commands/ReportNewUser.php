<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use App\User;
use App\Mail\ReportNewUserEmail;
use DB;


class ReportNewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReportNewUsers:run';

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
     * @return mixed
     */
    public function handle()
    {

        $users = User::whereDate('created_at', '=', Carbon::yesterday())->get();
        $data = array();
        $amount = '';
        foreach ($users as $user) {
            $subscription = $user->subscriptions;

            if ($subscription =='[]') {
                $plan = null;
                $amount = "0";
            }
            else {
                
                $plan = $subscription[0]->stripe_plan;
                $upcomingInvoice = $user->upcomingInvoice(
                    [
                        'subscription'=>$subscription[0]->stripe_id
                    ]
                ); 
                $amount = $upcomingInvoice->total();                
            }
             $data1 = [
              'plan' => $plan,
              'user' => $user,
              'amount'=>$amount,
            ];
            array_push($data, $data1);           
        }

        Mail::to('hello@flexsited.com')->send(new ReportNewUserEmail($data)); 
    }
}
