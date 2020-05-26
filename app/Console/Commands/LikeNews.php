<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Like;
use App\News;
class LikeNews extends Command
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
        // Вызов события, пока просто выбирая первого пользователя
        $user = User::find(1);
        $news = News::find(1);
        $message = Like::create([
            'user_id' => $user->id,
            'news_id' => $news->id
        ]);

        event(new \App\Events\LikeEvent($news, $user, $message));
    }
}
