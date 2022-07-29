<?php

namespace App\Mail;

use App\Models\Period;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExamSelectionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $maildata, $period, $email, $registrar;

    public function __construct($maildata, $registrar)
    {
        $this->maildata = $maildata;
        $this->registrar = $registrar;
        $this->email    =   $registrar->email;
        $this->period = Period::firstWhere('is_active', true);
    }

    public function build()
    {
        return $this
            ->with(
                [
                    'period'    =>  $this->period,
                    'maildata'  =>  $this->maildata,
                    'registrar' =>  $this->registrar,
                ]
            )
            ->to($this->email)
            ->subject('Pengumuman kelulusan seleksi berkas Asisten Praktikum')
            ->markdown('emails.selection.exam-selection.index')
            // ->action('Login Sekarang', route('login'))
            //
        ;
    }
}
