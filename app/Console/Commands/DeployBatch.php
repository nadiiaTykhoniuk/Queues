<?php

namespace App\Console\Commands;

use App\Jobs\ExampleChain\PushBrunchToServer;
use App\Jobs\ExampleChain\RunCodeQualityChecks;
use App\Jobs\ExampleChain\RunTests;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class DeployBatch extends Command
{
    protected $signature = 'deploy:batch';
    protected $description = 'Deploy';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $batch = Bus::batch([
            [
                new RunCodeQualityChecks(),
                new RunTests('staging'),
                new PushBrunchToServer('staging'),
                function () {
                    echo "Successfully deployed to staging! \n";
                }
            ],
            [
                new RunCodeQualityChecks(),
                new RunTests('production'),
                new PushBrunchToServer('production'),
                function () {
                    echo "Successfully deployed to production! \n";
                }
            ]
        ])->onConnection('sync')->onQueue('deployments')->dispatch();

        return $batch->id;
    }
}
