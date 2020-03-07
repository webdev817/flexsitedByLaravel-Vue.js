<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Storage;


class ExceptionOccured extends Mailable
{
    use Queueable, SerializesModels;


    public $content;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$data)
    {
           $this->content = $content;
           $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        try {
          $fileName = Str::random(10);

          $fileName = $fileName . ".json";
          Storage::put($fileName,$this->data);
          $file = Storage::disk('local')->path($fileName);

        } catch (\Exception $e) {
           
        }

        return $this->view('emails.exception')
            ->attach($file)
            ->with('content', $this->content);
    }
}
