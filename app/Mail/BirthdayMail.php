<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BirthdayMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $person;
    //public $maxExceptions = 3;
    public $tries = 3;

    public function __construct($person)
    {
        $this->person = $person;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = \env('MAIL_FROM_ADDRESS');
        $name = \env('MAIL_FROM_NAME');
        $subject = 'Hoje é um dia especial';
        //Log::debug("Email de aniversário enviado");
        return $this->markdown('mail.birthday')
                    ->from($address, $name)
                    ->bcc(\env('MAIL_ADMIN_ADDRESS'), \env('MAIL_ADMIN_NAME'))
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->text('mail.birthday_text')
                    ->with(
                        [ 
                            'person' => $this->person,
                            'url' => 'https://emaus.org.br',
                        ]
                    );
    }
}
