<?php

namespace App\Listeners;

use App\Events\BukuDeleted;
use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteBukuLog
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
    public function handle(BukuDeleted $event): void
    {
        ActivityLog::create([
            'description' => 'delete buku '.$event->buku->judul
        ]);
    }
}
