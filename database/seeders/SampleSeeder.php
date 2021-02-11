<?php

namespace Database\Seeders;

use App\Models\Test\SampleTable;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 5000; $i++){
            DB::table('sample_table')->insert([
                'sampleName' => Str::random(10),
                'sampleEmail' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
                'sampleAddress' => Str::random(12),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
