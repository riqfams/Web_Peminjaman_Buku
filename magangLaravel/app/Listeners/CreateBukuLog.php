<?php

namespace App\Listeners;

use App\Events\BukuCreated;
use App\Models\ActivityLog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateBukuLog
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
    public function handle(BukuCreated $event): void
    {
        ActivityLog::create([
            'description' => 'create buku '.$event->buku->judul
        ]);
    }
}
