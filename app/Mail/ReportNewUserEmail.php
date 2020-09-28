<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class ReportNewUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data; 
   
    public function __construct(array $data)
    {
        $this->data = $data;  //initializing the parameter's values to the public properties
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $pdf = \PDF::loadView('emails.pdf.newAccount', ['data' => $data]);
        return $this->attachData($pdf->output(),'newAccouts.pdf')
                    ->subject('Registration Summary For '. now())
                    ->view('emails.newAccountsEmail');
    }
}
