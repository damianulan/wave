<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        $fullname = $user->firstname . ' ' . $user->surname;
        return $this->to($user->email, $fullname)
                    ->from('axial@damianulan.me', 'Axial')
                    ->subject('Verify Your Email')
                    ->markdown('emails.verifyEmail', [
                        'url' => route('auth.emailVerified', $user->id),
                        'name' => $user->name
                    ]);    
    }
}
