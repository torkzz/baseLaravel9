<?php

namespace App\Services\Requests;

use App\Traits\ConsumeExternalServiceTrait;
use App\Traits\GuzzleHttpHelperTrait;

class GmaNews
{
    use ConsumeExternalServiceTrait;
    use GuzzleHttpHelperTrait;

    /**
     * The base uri to consume Gma News Service.
     *
     * @var string
     */
    public $basUri;

    /**
     * The specific request url extension/prefix to consume service.
     *
     * @var string
     */
    public $requestUrl;

    public function __construct()
    {
        $this->baseUri = "test.com/";
        $this->requestUrl = 'audit-log';
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
    public function getList($requestData)
    {
        return $this->performRequest('GET', "https://data2.gmanetwork.com/gno/microsites/eleksyon2022/news_stories.gz", $this->prepareRequestOptions($requestData, 'query'));
    }




}
