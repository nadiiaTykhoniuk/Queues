<?php

namespace App\Console\Commands;

use App\Jobs\ExampleChain\PushBrunchToServer;
use App\Jobs\ExampleChain\RunCodeQualityChecks;
use App\Jobs\ExampleChain\RunTests;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Throwable;

class Deploy extends Command
{
    protected $signature = 'deploy {server}';
    protected $description = 'Deploy';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Bus::chain([
            new RunCodeQualityChecks(),
            new RunTests('staging'),
            new PushBrunchToServer($this->argument('server')),
            function () {
                echo "Deployed successfully! \n";
            }
        ])->onQueue('deployments')->dispatch();

//        Bus::chain([
//            new RunCodeQualityChecks(),
//            new RunTests('staging'),
//            new PushBrunchToServer($this->argument('server'))
//        ])->catch(function (Throwable $e) {
//            echo "Deploy failed! \n";
//        })->dispatch();
    }
}
