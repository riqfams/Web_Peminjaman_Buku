<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        ActivityLog::create([
            'description' => 'create user '.$event->user->name
        ]);
    }
}
