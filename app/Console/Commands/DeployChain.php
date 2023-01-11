<?php

namespace App\Console\Commands;

use App\Jobs\ExampleChain\PushBrunchToServer;
use App\Jobs\ExampleChain\RunCodeQualityChecks;
use App\Jobs\ExampleChain\RunTests;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Throwable;

class DeployChain extends Command
{
    protected $signature = 'deploy:chain {server}';
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
        ])->onConnection('sync')->onQueue('deployments')->dispatch();

//        Bus::chain([
//            new RunCodeQualityChecks(),
//            new RunTests('staging'),
//            new PushBrunchToServer($this->argument('server'))
//        ])->catch(function (Throwable $e) {
//            echo "DeployChain failed! \n";
//        })->onConnection('sync')->dispatch();
    }
}
