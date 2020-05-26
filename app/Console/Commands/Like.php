<?php

namespace App\Console\Commands;

use App\Events\LikeEvent;
use App\Like as LikeModel;
use Illuminate\Console\Command;

class Like extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $like = LikeModel::create([
            'user_id' => 1,
            'news_id' => 1,
        ]);
        event(new LikeEvent($like));
    }
}
