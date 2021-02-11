<?php

namespace App\Jobs;

use App\Models\Test\SampleTable2;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessChunkData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $time_start = microtime(true);
        foreach ($this->data as $item) {
            $temp = new SampleTable2();
            $temp->id = $item->id;
            $temp->sampleName = $item->sampleName;
            $temp->sampleEmail = $item->sampleEmail;
            $temp->password = $item->password;
            $temp->sampleAddress = $item->sampleAddress;
            $temp->save();
        }
        $time_end = microtime(true);

        $execution_time = ($time_end - $time_start);
        error_log("Execution Time: [SUB Job]: " .$execution_time);
    }
}
