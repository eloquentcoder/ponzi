<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\ProvideHelp;
use Illuminate\Console\Command;

class DeleteDefaulters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:defaulters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete All Users who have not paid';

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
        $providers = ProvideHelp::where('confirmed', 0)->whereDate('expiration_date', '>=', $now)->get();
        foreach ($providers as $value) {
           $value->user->delete();
        }
        $this->info('Defaulters Deleted Sucessfully');
    }
}
