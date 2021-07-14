<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SampleNotification extends Notification
{
    use Queueable;
    private $testData; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($testData)
    {
        $this->testData = $testData;
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
            ->from('support@castle-tech.com.au')
            ->greeting($this->testData['name'])
            ->line($this->testData['body'])
            ->action($this->testData['offerText'], $this->testData['offerUrl'])
            ->line($this->testData['thanks']);
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
            'offer_id' => $this->testData['offer_id']
        ];
    }
}
