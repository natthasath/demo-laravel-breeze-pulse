<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Jobs\SlowJob;
use Illuminate\Support\Facades\Queue;
use Exception;

class PulseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Cache Data
        Cache::put('example_key', 'example_value', now()->addMinutes(10));

        // Simulate a cache miss
        $value = Cache::get('non_existent_key', 'default_value');

        // Seed Slow Query Data (simulate a slow query on the users table)
        $start = microtime(true);
        DB::table('users')->where('id', '>', 0)->get(); // Adjust query as needed
        $end = microtime(true);
        $executionTime = $end - $start;

        // Log slow query for Pulse to monitor
        if ($executionTime > 1) { // Adjust threshold as needed
            Log::info('Slow Query Detected', [
                'execution_time' => $executionTime,
                'query' => 'SELECT * FROM users WHERE id > 0',
            ]);
        }

        // Dispatch a slow job to the queue
        SlowJob::dispatch();

        // Simulate a queue operation
        Queue::push(new SlowJob());

        // Simulate an exception
        try {
            throw new Exception('Simulated Exception for Testing');
        } catch (Exception $e) {
            Log::error('Exception Detected', ['exception' => $e->getMessage()]);
        }
    }
}
