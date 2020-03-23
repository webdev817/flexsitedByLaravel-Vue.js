<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;


class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
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
      $this->data['owner'] = $this->data['user'];

      $this->data['vendor'] = config('mawaisnow.title');
      $this->data['product'] = '';
      $this->data['street'] = 'Burnsville, MN 1111';
      $this->data['location'] = '1111 E 117th St';
      $this->data['phone'] = '111-111-1111';
      $this->data['url'] = url('/');

      $pdf = PDF::loadView('cashier::receipt', $this->data);

      return $this->attachData($pdf->output(),'Invoice.pdf')
      ->subject('Thanks for your payment')
      ->view('emails.invoicePaidEmail');
    }
}
