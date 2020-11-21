<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\GetHelp;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessWithdrawRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $gethelp;
    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(GetHelp $gethelp, $id)
    {
        $this->gethelp = $gethelp;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::where('activated', true)
                    ->with('ProvideHelp')->whereHas('ProvideHelp', function($q) {
                        $q->where([['merge_status', 0], ['amount', $this->gethelp->amount]]);
                    })->first();
        if ($user) {
            $providehelp = $user->providehelp()->where([['merge_status', 0], ['amount', $this->gethelp->amount]])->first();
            $this->gethelp->providehelp()->sync([$providehelp->id]);
        }
    }
}
