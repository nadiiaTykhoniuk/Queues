<?php

namespace App\Console\Commands;

use App\Jobs\ExampleBatch\ProcessPodcast;
use App\Models\Podcast;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Throwable;
use Illuminate\Bus\Batch;

class ViewPodcasts extends Command
{
    protected $signature = 'view:podcasts';
    protected $description = 'View Podcasts';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $processPodcasts = [];

        $podcasts = Podcast::all();
        foreach ($podcasts as $podcast) {
            $processPodcasts[] = new ProcessPodcast($podcast);
        }

        $batch = Bus::batch(
            $processPodcasts
        )->then(function (Batch $batch) {
            echo "We viewed all podcasts! \n";
        })->catch(function (Batch $batch, Throwable $e) {
            echo "Oh no! Internet connection interrupted! \n";
        })->finally(function (Batch $batch) {
            echo "The batch ". $batch->id . " finally finished dispatching! \n";
        })->dispatch();

        return $batch->id;
    }
}
