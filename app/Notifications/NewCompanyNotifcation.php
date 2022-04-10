<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCompanyNotifcation extends Notification
{
    use Queueable;
    private $companyData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($companyData)
    {
        $this->companyData = $companyData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->companyData['name'])
                    ->line('You created new company!')
                    ->line($this->companyData['email'])
                    ->action('Check website', $this->companyData['website'])
                    ->line('Thank you for using our application!');
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
            'name' => $this->companyData['name'],
            'email' => $this->companyData['email'],
            'website' => $this->companyData['website']
        ];
    }
}
