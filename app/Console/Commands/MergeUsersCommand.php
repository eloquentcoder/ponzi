<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\MergeServices;
use Illuminate\Console\Command;

class MergeUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'merge:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Users Automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return
     */
    public function handle()
    {
        $now = Carbon::now();
        $getters = GetHelp::where([['merge_status', 0], ['awaiting_to_receive', 1]])->whereDate('maturity_period', '>=', $now)->chunk(100, function($getters) {
            foreach ($getters as $value) {
                MergeServices::mergeGetters($value);
            }
        });
        $this->info('Merged Sucessfully');
    }
}
