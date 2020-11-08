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
        $now = Carbon::now();
        $provide_helper = ProvideHelp::where([['amount', '!=', 1000], ['id', '!=',$this->provide_help->id]])->orWhere([['merge_status', 0], ['id', '!=',$this->provide_help->id]])->first();

        if (!$provide_helper) {
            $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();
            if ($this->provide_help->amount > 50000) {
                $admin_two = User::where([['role', 'admin'], ['is_special', 1], ['id', '!=', $admin->id]])->get()->random();
                $get_help = $admin->gethelp()->create([
                    'amount' => $this->provide_help->amount * 0.7,
                    'merge_status' => 1,
                    'awaiting_to_receive' => 1,
                    'maturity_period' => $now,
                ]);

                $get_help_2 = $admin_two->gethelp()->create([
                    'amount' => $this->provide_help->amount * 0.3,
                    'merge_status' => 1,
                    'awaiting_to_receive' => 1,
                    'maturity_period' => $now,
                ]);

                $this->provide_help->gethelp()->sync([$get_help->id, $get_help_2->id]);
            } else {
                $get_help = $admin->gethelp()->create([
                    'amount' => $this->provide_help->amount,
                    'merge_status' => 1,
                    'awaiting_to_receive' => 1,
                    'maturity_period' => $now,
                ]);

                $this->provide_help->gethelp()->sync([$get_help->id]);
            }

        }

    }
}
