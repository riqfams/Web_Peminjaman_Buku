<?php

namespace App\Listeners;

use App\Events\UserDeleted;
use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteUserLog
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
    public function handle(UserDeleted $event): void
    {
        ActivityLog::create([
            'description' => 'delete user '.$event->user->name
        ]);
    }
}
