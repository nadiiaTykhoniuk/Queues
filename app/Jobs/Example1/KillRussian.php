<?php

namespace App\Jobs\Example1;

use App\Jobs\Middleware\RateLimited;
use App\Models\Russian;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class KillRussian implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $russian;
    public $uniqueFor = 360;
    //public $delay = 10;
    public $timeout = 30;
    public $tries = 5;
    public $maxExceptions = 3;

    public function __construct(Russian $russian)
    {
        $this->russian = $russian;
    }

    public function handle()
    {
        //sleep(300);
        //abort(500);
        $this->russian->kill();
    }

    public function uniqueId()
    {
        return $this->russian->id;
    }

    public function retryUntil()
    {
        return now()->addSeconds(10);
    }

    public function getJobGroup() {
        return "default";
    }

    public function middleware()
    {
        return [new RateLimited()];
    }
}
