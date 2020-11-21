<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ProvideHelp;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessGH implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $provide_help;
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($provide_help, $id)
    {
        $this->provide_help = $provide_help;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $now = Carbon::now(); $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();

            $user = User::where('activated', true)
                    ->with('GetHelp')->whereHas('GetHelp', function($q) {
                        $q->where([['merge_status', 0], ['amount', $this->provide_help->amount], ['awaiting_to_receive', 1]]);
                    })->first();
            // $get_help = $admin->gethelp()->create([
            //         'amount' => $this->provide_help->amount,
            //         'merge_status' => 1,
            //         'awaiting_to_receive' => 1,
            //         'maturity_period' => $now,
            // ]);
            if ($user) {
                $get_help = $user->gethelp()->where([['merge_status', 0], ['amount', $this->gethelp->amount], ['awaiting_to_receive', 1]])->first();

                $this->provide_help->gethelp()->sync([$get_help->id]);
                $get_help->update([
                    'merge_status' => 1,
                ]);

                $this->provide_help->update([
                        'merge_status' => 1
                ]);
            }



    }
}
