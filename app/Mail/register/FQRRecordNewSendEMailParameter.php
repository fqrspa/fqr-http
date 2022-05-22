<?php

namespace App\Mail\register;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FQRRecordNewSendEMailParameter extends Mailable
{
    use Queueable, SerializesModels;
    public $parameter; //Contedra los parametros

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameter)
    {
        //
        $this->parameter = $parameter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*
        return $this->from('sender@example.com')
                    ->view('mails.demo')
                    ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path('/images').'/demo.jpg', [
                              'as' => 'demo.jpg',
                              'mime' => 'image/jpeg',
                      ]);    }

*/
/*
        return $this->from(env('MAIL_USERNAME',''))
            ->view('my-fqr.mails.activar-cuenta')
            ->text('my-fqr.mails.activar-cuenta-plain')
            ;*/
            $this->view('register.mails.activar-cuenta')
            ->text('register.mails.activar-cuenta-plain');

    }
}
