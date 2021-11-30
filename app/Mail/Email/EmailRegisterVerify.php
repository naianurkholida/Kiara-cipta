<?php

namespace App\Mail\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailRegisterVerify extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $token;
    public $triger;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $token, $triger)
    {
        $this->email = $email;
        $this->token = $token;
        $this->triger = $triger;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->triger == "email_verify"){
            return $this->subject('Verifikasi Email')->view('front_page.email.email_register_verify');
        }else if($this->triger == "forgot_password"){
            return $this->subject('Lupa Password')->view('front_page.email.email_forgot_password');
        }
    }
}
