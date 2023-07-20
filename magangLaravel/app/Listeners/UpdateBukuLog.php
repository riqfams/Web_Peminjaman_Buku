<?php

namespace App\Listeners;

use App\Events\BukuUpdated;
use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateBukuLog
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
    public function handle(BukuUpdated $event): void
    {
        ActivityLog::create([
            'description' => 'update buku '.$event->buku->judul
        ]);
    }
}
