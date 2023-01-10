<?php

namespace App\Jobs\ExampleMiddleware;

use App\Jobs\Middleware\RateLimited;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobExample implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function getJobGroup() {
        // using default group name
        return "default";
    }

    public function middleware() {
        return [new RateLimited()];
    }

    public function handle()
    {
        // Leaving this simple just for example
        echo "Doing some exciting work";
    }
}
