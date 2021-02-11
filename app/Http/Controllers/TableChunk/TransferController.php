<?php

namespace App\Http\Controllers\TableChunk;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessTableCopyData;
use App\Models\Test\SampleTable;
use App\Models\Test\SampleTable2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isType;

class TransferController extends Controller
{
    public function transfer()
    {
        $job = (new ProcessTableCopyData())->delay(Carbon::now()->addSeconds(5));
        dispatch($job);

//        $time_start = microtime(true);
////        start loop/function/process here
//        $time_end = microtime(true);
//        $execution_time = ($time_end - $time_start);

        return "SampleTable is now copying to the SampleTable2 in backgorund...";
    }
}
