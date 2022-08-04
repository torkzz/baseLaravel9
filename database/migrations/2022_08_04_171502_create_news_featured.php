<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gma_news_featured', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->text('image_url');
            $table->text('title');
            $table->string('zoom', 100);
            $table->string('position', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gma_news_featured');
    }
};
