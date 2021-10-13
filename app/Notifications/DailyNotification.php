<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class DailyNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $total_sale = 0;
    protected $ad_cost = 0;
    protected $products_cost = 0;
    protected $total_profit = 0;

    public function __construct($total_sale, $ad_cost,$products_cost)
    {
        $this->total_sale = $total_sale;
        $this->ad_cost = $ad_cost;
        $this->products_cost = $products_cost;
        $this->total_profit = $total_sale - ( $ad_cost - $products_cost );
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
            //
        ];
    }

    public function toSlack($notifiable){
        $content = "Today's sale was : $this->total_sale. \n";
        $content .= "Today's ad cost was : $this->ad_cost. \n";
        $content .= "Today's sold products cost was :  $this->products_cost.\n";
        $content .= "Today's profit was : $this->total_profit.\n";
        return (new SlackMessage)
            ->content($content);
    }
}
