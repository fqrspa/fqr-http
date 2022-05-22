<?php

namespace App\Mail\register;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FQRResendActivationSendEMailParameter extends Mailable
{
    use Queueable, SerializesModels;
    public $parameters; //Contedra los parametros

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        //
        $this->parameters = $parameters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            $this->view($this->parameters->emailTemplate);

    }
}
