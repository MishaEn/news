<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class NewsParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:newsParser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Парсер новостей';

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
        $url = 'http://www.kommersant.ru/RSS/corp.xml';
        $rss = simplexml_load_file($url);
        foreach($rss as $item){
            $this->info($item->title);
            foreach($item->item as $value){
                $this->info($value->title);
            }

        }

   /*     $headers = ['Name', 'Email'];

        $users = User::all(['name', 'email'])->toArray();

        $this->table($headers, $users);*/
    }
}
