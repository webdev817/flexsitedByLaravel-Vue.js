<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "";
        if( $this->data['description'] == " You have a new chat message.")
        {
            $subject = "You have a new chat message";
        }
        else{
            $subject = "Your Project Has Been Updated";

        }
        return $this->subject($subject)
                    ->view('emails.projectUpdateEmail',$this->data);
    }
}
