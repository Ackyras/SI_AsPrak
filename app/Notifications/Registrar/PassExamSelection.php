<?php

namespace App\Notifications\Registrar;

use App\Models\Period;
use Illuminate\Bus\Queueable;
use App\Mail\ExamSelectionNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PassExamSelection extends Notification implements ShouldQueue
{
    use Queueable;

    private $registrar, $period;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        $registrar
    ) {
        //
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
        $maildata['title']      = 'Pengumuman Hasil Seleksi Akhir';
        $maildata['receiver']   = $this->registrar->name;
        $maildata['subject']    = 'Seleksi Asisten Praktikum';
        $maildata['period']     =   $this->period->name;
        return (new ExamSelectionNotification($maildata, $this->registrar));
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
