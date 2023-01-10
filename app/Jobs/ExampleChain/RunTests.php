<?php

namespace App\Jobs\ExampleChain;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Flysystem\Exception;
use PHPUnit\Framework\Constraint\ExceptionMessage;

class RunTests implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $env;
    public function __construct(string $env)
    {
        $this->env = $env;
    }

    public function handle()
    {
        echo "Run tests on " . $this->env . "\n";

        //abort(500);
        //dd();
    }
}
