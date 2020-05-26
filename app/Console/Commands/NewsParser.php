<?php

namespace App\Console\Commands;

use App\News;use Carbon\Carbon;
use App\RssFeed;
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
        $rssList = RssFeed::all();
        foreach($rssList as $rss){
            $rss_id = $rss->id;
            $rss_name = $rss->rss_name;
            $rss_url = $rss->rss_url;
            $data = simplexml_load_file($rss_url);
            foreach($data as $item){
                foreach($item->item as $value){

                    //$this->info(News::findOrFail('title', $value->title));
                    $news = News::create(
                        [
                            'rss_feed_id' => $rss_id,
                            'author' => $value->author,
                            'category' => $value->category,
                            'title' => $value->title,
                            'description' => $value->description,
                            'url' => $value->link,
                            'publication_date' => Carbon::parse($value->pubddate)->format('Y-m-d H:i:s')
                        ]
                    );
                }

            }
            $this->info($rss_name.' - добавлено');
        }
        $this->info('success');

   /*     $headers = ['Name', 'Email'];

        $users = User::all(['name', 'email'])->toArray();

        $this->table($headers, $users);*/
    }
}
