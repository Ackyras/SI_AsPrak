<?php

namespace App\Notifications\Registrar;

use App\Models\Period;
use App\Models\Registrar;
use Illuminate\Bus\Queueable;
use App\Mail\FileSelectionNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PassFileSelection extends Notification implements ShouldQueue
{
    use Queueable;

    private $user, $registrar, $period;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        $user,
        $registrar
    ) {
        //
        $this->user = $user;
        $this->registrar = $registrar;
        $this->period = Period::firstWhere('is_active', true);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $maildata['title']      = 'Pengumuman Hasil Seleksi Berkas';
        $maildata['receiver']   = $this->registrar->name;
        $maildata['subject']    = 'Seleksi Asisten Praktikum';
        $maildata['registrar_email']    = $this->user['email'];
        $maildata['registrar_password'] = $this->user['password'];
        $maildata['period']     =   $this->period->name;
        $maildata['subjects']   =   $this->registrar->period_subjects;
        // dd($this->registrar);
        return (new FileSelectionNotification($maildata, $this->registrar));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
