<?php

namespace App\Observers;

use App\Models\BilgiTalepleri;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class BilgiTalepleriActionObserver
{
    public function created(BilgiTalepleri $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'BilgiTalepleri'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(BilgiTalepleri $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'BilgiTalepleri'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(BilgiTalepleri $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'BilgiTalepleri'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
