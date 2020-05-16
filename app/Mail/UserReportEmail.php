<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class UserReportEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(array $data)
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

      $pdf = \PDF::loadView('emails.pdf.users', $this->data);

      return $this->attachData($pdf->output(),'users.pdf')
      ->subject('Flexsited New Users')
      ->view('emails.userReportEmail',$this->data);
    }
}
