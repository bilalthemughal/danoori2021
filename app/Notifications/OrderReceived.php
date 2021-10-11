<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;

class OrderReceived extends Notification
{
    use Queueable;
    public $order = [];
    public $products = [];
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $products)
    {
       $this->order = $order; 
       $this->products = $products;
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

    public function toSlack($notifiable)
    {
        $content = "You have received an order of amount : ". number_format($this->order->total) .".\n Products: ";
        foreach($this->products as $product){
            $content .= $product['name']. " * " . $product['qty'] . " , ";
            $content .= $product['small_photo_path'] . " , ";
        }
        $content .= "\nName : " . $this->order->name . "\nAddress: " . $this->order->address . ", " . $this->order->city . "\nPhone Number: " . $this->order->phone_number;
        return (new SlackMessage)
            ->content($content);
    }
}
