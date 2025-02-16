<?php

namespace App\Listeners;

use App\Events\LowStockNotification;
use App\Notifications\LowStockAlert;
use App\Models\User;

class SendLowStockNotification
{
    public function handle(LowStockNotification $event)
    {
        // Kirim notifikasi ke semua admin
        $admins = User::where('is_admin', true)->get();

        foreach ($admins as $admin) {
            $admin->notify(new LowStockAlert($event->product));
        }
    }
}
