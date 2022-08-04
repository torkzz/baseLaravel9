<?php

namespace App\Services\Requests;

use App\Traits\ConsumeExternalServiceTrait;
use App\Traits\GuzzleHttpHelperTrait;

class TelegramBot
{
    use ConsumeExternalServiceTrait;
    use GuzzleHttpHelperTrait;

    /**
     * The base uri to consume Gma News Service.
     *
     * @var string
     */
    public $basUri;
    public $token="";

    /**
     * The specific request url extension/prefix to consume service.
     *
     * @var string
     */
    public $requestUrl;

    public function __construct()
    {
    
    }

    // /**
    //  * Display list of Gma News.
    //  *
    //  * @return JsonReponse
    //  */
    // public function getList($requestData)
    // {
    //     return $this->performRequest('GET', $this->requestUrl, $this->prepareRequestOptions($requestData, 'query'));
    // }

    /**
     * Display Latest News
     *
     * @return JsonReponse
     */
    public function sendMessage($chatID,$message, $token)
    {
        echo "sending message to " . $chatID . "\n";
        $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
        $url = $url . "&text=" . urlencode($message);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        // return $this->performRequest('GET', "https://data2.gmanetwork.com/gno/microsites/eleksyon2022/news_stories.gz", $this->prepareRequestOptions($requestData, 'query'));
    }




}
