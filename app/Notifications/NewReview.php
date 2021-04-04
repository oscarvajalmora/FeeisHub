<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class NewReview extends Notification
{
    use Queueable;

    private $review;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $review = $this->review;

        return (new SlackMessage)
            ->from('Ghost', ':ghost:')
            ->to('#bots')
            ->content("New feedback received! \nFrom: " . $review['reporter_name'] . "\nTo: " . $review['affected_name'] . " \nFeedback: " . ($review['feedback'] ? 'Positive' : 'Negative') . "\n<" . $review['detail_url'] . "|See details here>");
    }
}
