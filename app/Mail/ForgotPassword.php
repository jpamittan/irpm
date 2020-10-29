<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $inputs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name = "", array $inputs = [])
    {
        $this->name = $name;
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ForgotPassword
    {
        return $this->subject('New Password')
            ->view('emails.resetPassword');
    }
}
