<?php

namespace App\Mail;

use App\Models\Period;
use App\Models\Registrar;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileSelectionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $maildata, $period, $email;

    public function __construct($maildata, $registrar)
    {
        $this->maildata = $maildata;
        $this->email    =   $registrar->email;
        $this->period = Period::firstWhere('is_active', true);
    }

    public function build()
    {
        // dd($this->maildata);]
        Log::emergency($this->email);
        return $this
            ->with(
                [
                    'period'    =>  $this->period,
                    'maildata'  =>  $this->maildata
                ]
            )
            ->to($this->email)
            ->subject('Pengumuman kelulusan seleksi berkas Asisten Praktikum')
            ->markdown('emails.selection.file-selection.index')
            // ->action('Login Sekarang', route('login'))
            //
        ;
    }
}
