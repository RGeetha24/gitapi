<?php

namespace App\Jobs;

namespace App\Jobs\GitHubWebhooks;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\GitHubWebhooks\Models\GitHubWebhookCall;

class Pingwebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public GitHubWebhookCall $gitHubWebhookCall;
    public function __construct( public GitHubWebhookCall $webhookCall)
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $this->webhookCall->payload();
    }
}
