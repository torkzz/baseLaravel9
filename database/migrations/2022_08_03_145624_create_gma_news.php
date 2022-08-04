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
    // {
    //     "id": "840352",
    //     "title": "Teachers&rsquo; group urges Congress to override veto on tax-exempt honoraria bill",
    //     "date": "2022-08-03 17:45:08",
    //     "teaser": "The Alliance of Concerned Teachers Philippines on Wednesday called on Congress to override the presidential veto of the bill granting tax exemptions for the honoraria and allowances received by those who rendered election service, including teachers.",
    //     "photo_id": "385593",
    //     "base_url": "https://images.gmanews.tv/webpics/2022/08/",
    //     "image_filename": "240_act_080322_2022_08_03_17_32_49.jpg",
    //     "type": "story",
    //     "photo_credit": "",
    //     "sec_id": "1",
    //     "ssec_id": "3",
    //     "ssec_photo": "",
    //     "youtube_id": "",
    //     "show_id": "0",
    //     "thumbnail_status": "1",
    //     "permanent_url": "topstories/nation/840352/teachers-group-urges-congress-to-override-veto-on-tax-exempt-honoraria-bill/story/",
    //     "tags": "teachers eleksyon2022 beis board_of_election_inspectors allianceofconcernedteachers news",
    //     "photo_title": "ACT seeks override of tax-exempt honoraria veto",
    //     "sec_name": "News",
    //     "sec_stub": "news",
    //     "sec_url_stub": "topstories",
    //     "color_code": "cc0001",
    //     "ssec_name": "Nation",
    //     "ssec_stub": "nation",
    //     "show_stub": "",
    //     "link": "topstories/nation/840352/teachers-group-urges-congress-to-override-veto-on-tax-exempt-honoraria-bill/story/",
    //     "date_time": "Aug 03, 2022 05:45 pm"
    // },

    public function up()
    {
        Schema::create('gma_news', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('date', 100);
            $table->text('teaser');
            $table->string('photo_id');
            $table->text('base_url');
            $table->string('image_filename', 255);
            $table->string('type');
            $table->string('photo_credit');
            $table->string('sec_id');
            $table->string('ssec_id');
            $table->string('ssec_photo');
            $table->string('youtube_id');
            $table->string('show_id');
            $table->string('thumbnail_status');
            $table->text('permanent_url');
            $table->text('tags');
            $table->text('photo_title');
            $table->string('sec_name');
            $table->string('sec_stub');
            $table->string('sec_url_stub');
            $table->string('color_code');
            $table->string('ssec_name');
            $table->string('ssec_stub');
            $table->string('show_stub');
            $table->text('link');
            $table->string('date_time',100);
            $table->boolean('is_publish')->default(0);
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
        Schema::dropIfExists('gma_news');
    }
};
