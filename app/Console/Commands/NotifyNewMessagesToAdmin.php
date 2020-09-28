<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Mail;
use App\User;
use App\SupportChat;
use App\Mail\ReportNewUserEmail;
use DB;

class NotifyNewMessagesToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NotifyNewMessagesToAdmin:run';

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

      
        
        $unreadSupportChats = SupportChat::join('users', 'users.id', '=', 'support_chats.createdBy')
                    ->select('support_chats.*')
                    ->where('users.role', '<>', 9)
                    ->whereNull('received_at')
                    ->get();
       
        foreach ($unreadSupportChats as $supportChat) 
        {
            $message = "[FLEXSITED]: New OnBoarding Chat Arrived!!!   Please communicate with your end user!";
            $sms = [
                'phone' => '678-741-1928',
                'message'=> $message,
            ];
            sendSMS($sms);      
            $supportChat->received_at = date('Y-m-d H:i:s');
        
            $supportChat->save();
        }         
    }
}
