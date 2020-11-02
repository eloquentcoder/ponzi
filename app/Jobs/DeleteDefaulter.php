<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\ProvideHelp;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteDefaulter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $provider;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($provider, $id)
    {
        $this->provider = $provider;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $provider = ProvideHelp::find($this->provider->id);
        if ($provider->confirmed == 0) {
            User::find($this->id)->update([
                'is_restricted' => 1
            ]);
        }

    }
}
