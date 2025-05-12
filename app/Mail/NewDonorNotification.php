<?php

namespace App\Mail;

use App\Models\Donor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewDonorNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $donor;

    /**
     * Create a new message instance.
     */
    public function __construct(Donor $donor)
    {
        $this->donor = $donor;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Blood Donor Joined!')
                    ->markdown('emails.new_donor_notification');
    }
}
