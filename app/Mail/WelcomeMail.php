<?php

namespace App\Mail;

use App\Models\About;
use App\Models\Brand;
use App\Models\Condition;
use App\Models\Mail;
use App\Models\Policy;
use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact_us_info_detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_us_info_detail)
    {
        $this->contact_us_info_detail = $contact_us_info_detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.welcome-mail');
//        return $this->html("Thanks for Contact with Us.");
    }
}
