<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\ConferenceRegistration;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConferenceRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

	public $order;
	public $tickets;

    public function __construct(Order $order, $tickets)
    {
		$this->order = $order;
		$this->tickets = $tickets;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.conference.registration');
    }
}
