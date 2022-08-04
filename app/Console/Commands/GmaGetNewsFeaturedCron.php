<?php

namespace App\Console\Commands;

use App\Services\Requests\GmaNews;
use App\Services\Requests\TelegramBot;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Models\GmaNewsFeatured;

class GmaGetNewsFeaturedCron extends Command
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
    protected $signature = 'Gma:getFeatureNews';

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
        $data = json_decode($this->gmaNewsRequest->getFeaturedList($request), true);
        foreach ($data as $news) {
            $check = GmaNewsFeatured::where('title', '=', $news['title'])->first();
            if (!$check) {
                $this->saveGmaNews($news);
                $this->telegramBot->sendMessage('327943312', $news['title'], '5066306304:AAEukNjKYnWJ7CzQGF5p6iCqzmrS7gPVPLM');
            } else {
                $this->info("================ not new =================\n\n");
                $this->info($news['title']);
                $this->info("================ not new =================\n\n");
            }
            $this->info("================ gmaNewsRequest->getList =================\n\n");
        }
        return 0;
    }
    
    private function saveGmaNews($news)
    {
        $newNews = new GmaNewsFeatured();
        $newNews->url = $news['url'];
        $newNews->image_url = $news['image_url'];
        $newNews->title = $news['title'];
        $newNews->zoom = $news['zoom'];
        $newNews->position = $news['position'];
        $newNews->save();
    }
}
