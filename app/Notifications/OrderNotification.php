<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Status pesanan #'.$this->order->id.' telah diperbarui menjadi '.$this->order->status,
            'url' => route('orders.show', $this->order),
            'order_id' => $this->order->id,
            'status' => $this->order->status
        ];
    }
}