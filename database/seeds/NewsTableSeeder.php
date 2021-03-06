<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\News::class, 50)->create()->each(function ($news) {
            $news->posts()->save(factory(App\News::class)->make());
        });
    }
}
