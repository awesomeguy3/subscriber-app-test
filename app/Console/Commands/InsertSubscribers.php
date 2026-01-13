<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class InsertSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $key = 'subscribers';

    // We can change this to the batch size we want
    protected $batchSize = 2;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $redisData = collect(Redis::lpop($this->key, $this->batchSize));

        Subscriber::query()->insert($redisData->map(function ($item) {
            return json_decode($item, true);
        })->all());
    }
}
