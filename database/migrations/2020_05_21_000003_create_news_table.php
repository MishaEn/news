<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rss_feed_id');
            $table->string('author');
            $table->string('category');
            $table->string('title');
            $table->text('description');
            $table->string('url')->nullable();
            $table->dateTime('publication_date');
            $table->timestamps();
        });
        Schema::table('news', function (Blueprint $table) {
            $table->foreign('rss_feed_id')->references('id')->on('rss_feeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
