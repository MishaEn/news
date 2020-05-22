<?php

use Illuminate\Database\Seeder;

class RssFeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rss_feeds')->insert([
            'rss_name' => 'Lenta.ru : Новости',
            'rss_url' => 'http://lenta.ru/l/r/EX/import.rss'
        ]);
        DB::table('rss_feeds')->insert([
            'rss_name' => 'Яндекс.Новости: Политика',
            'rss_url' => 'http://news.yandex.ru/politics.rss'
        ]);
        DB::table('rss_feeds')->insert([
            'rss_name' => 'Вести.Ru',
            'rss_url' => 'http://www.vesti.ru/vesti.rss'
        ]);
        DB::table('rss_feeds')->insert([
            'rss_name' => ' Новости Кузбасса',
            'rss_url' => 'http://kuzbassnews.ru/engine/rss.php'
        ]);
    }
}
