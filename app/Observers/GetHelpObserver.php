<?php

namespace App\Observers;

use App\Models\GetHelp;

class GetHelpObserver
{
    /**
     * Handle the get help "created" event.
     *
     * @param  \App\Models\GetHelp  $getHelp
     * @return void
     */
    public function created(GetHelp $getHelp)
    {
        $date = $getHelp->created_at->addMinutes(5);
        // $date = $provideHelp->created_at->addMinutes(1);
        $getHelp->update([
            'maturity_period' => $date
        ]);
    }

    /**
     * Handle the get help "updated" event.
     *
     * @param  \App\Models\GetHelp  $getHelp
     * @return void
     */
    public function updated(GetHelp $getHelp)
    {
        //
    }

    /**
     * Handle the get help "deleted" event.
     *
     * @param  \App\Models\GetHelp  $getHelp
     * @return void
     */
    public function deleted(GetHelp $getHelp)
    {
        //
    }

    /**
     * Handle the get help "restored" event.
     *
     * @param  \App\Models\GetHelp  $getHelp
     * @return void
     */
    public function restored(GetHelp $getHelp)
    {
        //
    }

    /**
     * Handle the get help "force deleted" event.
     *
     * @param  \App\Models\GetHelp  $getHelp
     * @return void
     */
    public function forceDeleted(GetHelp $getHelp)
    {
        //
    }
}
