<?php

namespace App\Jobs\ExampleChain;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PushBrunchToServer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    private $server;
    public function __construct(string $server)
    {
        $this->server = $server;
    }

    public function handle()
    {
        echo "Push branch to " . $this->server . "\n";
    }
}
