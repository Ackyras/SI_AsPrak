<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FileSelectionNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    public $maildata;

    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }
    
    public function build()
    {
        return $this->markdown('emails.selection.file-selection.index');
    }
}
