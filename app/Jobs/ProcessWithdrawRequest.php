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
        $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();
            $get_help = $admin->providehelp()->create([
                'amount' => $this->gethelp->amount,
                'merge_status' => 1,
             ]);
             $this->gethelp->update([
                 'merge_status' => 1
             ]);
             $this->gethelp->providehelp()->sync([$get_help->id]);
    }
}
