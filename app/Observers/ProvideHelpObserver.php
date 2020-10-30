<?php

namespace App\Observers;

use App\Models\ProvideHelp;

class ProvideHelpObserver
{
    /**
     * Handle the provide help "created" event.
     *
     * @param  \App\Models\ProvideHelp  $provideHelp
     * @return void
     */
    public function created(ProvideHelp $provideHelp)
    {
        $date = $provideHelp->created_at->addHours(12);
        // $date = $provideHelp->created_at->addMinutes(1);
        $provideHelp->update([
            'expiration_date' => $date
        ]);
    }

    /**
     * Handle the provide help "updated" event.
     *
     * @param  \App\Models\ProvideHelp  $provideHelp
     * @return void
     */
    public function updated(ProvideHelp $provideHelp)
    {
        //
    }

    /**
     * Handle the provide help "deleted" event.
     *
     * @param  \App\Models\ProvideHelp  $provideHelp
     * @return void
     */
    public function deleted(ProvideHelp $provideHelp)
    {
        //
    }

    /**
     * Handle the provide help "restored" event.
     *
     * @param  \App\Models\ProvideHelp  $provideHelp
     * @return void
     */
    public function restored(ProvideHelp $provideHelp)
    {
        //
    }

    /**
     * Handle the provide help "force deleted" event.
     *
     * @param  \App\Models\ProvideHelp  $provideHelp
     * @return void
     */
    public function forceDeleted(ProvideHelp $provideHelp)
    {
        //
    }
}
