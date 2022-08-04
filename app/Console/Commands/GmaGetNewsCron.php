<?php

namespace App\Console\Commands;

use App\Services\Requests\GmaNews;
use App\Services\Requests\TelegramBot;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\GmaNew;

class GmaGetNewsCron extends Command
{
    public $gmaNewsRequest;
    public $telegramBot;

    public function __construct(GmaNews $gmaNewsRequest, TelegramBot $telegramBot)
    {
        $this->gmaNewsRequest = $gmaNewsRequest;
        $this->telegramBot = $telegramBot;
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Gma:getNews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Request $request)
    {
        // getting news_stories
        $data = json_decode($this->gmaNewsRequest->getList($request), true);
        foreach ($data as $news) {
            $check = GmaNew::find($news['id']);
            if (!$check) {
                $this->saveGmaNews($news);
                $this->telegramBot->sendMessage('327943312', $news['title'], '5066306304:AAEukNjKYnWJ7CzQGF5p6iCqzmrS7gPVPLM');
            } else {
                $this->info("================ not new =================\n\n");
                $this->info($news['title']);
                $this->info($news['date']);
                $this->info("================ not new =================\n\n");
            }
            $this->info("================ gmaNewsRequest->getList =================\n\n");
        }
        return 0;
    }

    private function saveGmaNews($news)
    {
        $newNews = new GmaNew();
        $newNews->id = $news['id'];
        $newNews->title = $news['title'];
        $newNews->date = $news['date'];
        $newNews->teaser = $news['teaser'];
        $newNews->photo_id = $news['photo_id'];
        $newNews->base_url = $news['base_url'];
        $newNews->image_filename = $news['image_filename'];
        $newNews->type = $news['type'];
        $newNews->photo_credit = $news['photo_credit'];
        $newNews->sec_id = $news['sec_id'];
        $newNews->ssec_id = $news['ssec_id'];
        $newNews->ssec_photo = $news['ssec_photo'];
        $newNews->youtube_id = $news['youtube_id'];
        $newNews->show_id = $news['show_id'];
        $newNews->thumbnail_status = $news['thumbnail_status'];
        $newNews->permanent_url = $news['permanent_url'];
        $newNews->tags = $news['tags'];
        $newNews->photo_title = $news['photo_title'];
        $newNews->sec_name = $news['sec_name'];
        $newNews->sec_stub = $news['sec_stub'];
        $newNews->sec_url_stub = $news['sec_url_stub'];
        $newNews->color_code = $news['color_code'];
        $newNews->ssec_name = $news['ssec_name'];
        $newNews->ssec_stub = $news['ssec_stub'];
        $newNews->show_stub = $news['show_stub'];
        $newNews->link = $news['link'];
        $newNews->date_time = $news['date_time'];
        $newNews->is_publish = 0;
        $newNews->save();
    }
}
