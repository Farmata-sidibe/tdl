<?php

namespace App\Observers;

use App\Models\Liste;
use Illuminate\Support\Str;

class ListeObserver
{
    /**
     * Handle the Liste "created" event.
     */
    public function creating(Liste $liste)
    {
        // $liste->slug = Str::slug($liste->user->name . ' ' . $liste->partner);
    }

    /**
     * Handle the Liste "updated" event.
     */
    public function updating(Liste $liste)
    {
        // if ($liste->isDirty(['user_id', 'partner'])) {
        //     $liste->slug = Str::slug($liste->user->name . ' ' . $liste->partner);
        // }
    }

    /**
     * Handle the Liste "deleted" event.
     */
    public function deleted(Liste $liste): void
    {
        //
    }

    /**
     * Handle the Liste "restored" event.
     */
    public function restored(Liste $liste): void
    {
        //
    }

    /**
     * Handle the Liste "force deleted" event.
     */
    public function forceDeleted(Liste $liste): void
    {
        //
    }
}
