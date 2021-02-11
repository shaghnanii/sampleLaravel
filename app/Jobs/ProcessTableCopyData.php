<?php

namespace App\Jobs;

use App\Models\Test\SampleTable;
use App\Models\Test\SampleTable2;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessTableCopyData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $oldData = SampleTable::all();
        $time_start = microtime(true);

        $chunks = $oldData->chunk(100);
        $time = 0;
        foreach ($chunks as $chunk) {
            $time+=5;
            $job = (new ProcessChunkData($chunk))->delay(Carbon::now()->addSeconds($time));
            dispatch($job);
        }
        $time_end = microtime(true);

        $execution_time = ($time_end - $time_start);

        error_log("Execution Time: [Main Job]: " .$execution_time);
    }
}
