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
      $this->data['street'] = '1755 NORTH BROWN';
      $this->data['location'] = 'ROAD SUITE 200, LAWRENCEVILLE, GA 30043';
      $this->data['phone'] = '678-741-1928';
      $this->data['url'] = url('/');

      $pdf = PDF::loadView('cashier::receipt', $this->data);

      return $this->attachData($pdf->output(),'Invoice.pdf')
      ->subject('Thanks for your payment')
      ->view('emails.invoicePaidEmail');
    }
}
