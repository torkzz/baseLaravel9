<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalServiceTrait
{
    /**
     * Send a request to any service.
     *
     * @return string
     */
    public function performRequest($method, $requestUrl, $requestOptions = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl,
            [
                'form_params' => isset($requestOptions['formParams']) ? $requestOptions['formParams'] : null,
                'query' => isset($requestOptions['query']) ? $requestOptions['query'] : null,
                'headers' => isset($requestOptions['headers']) ? $requestOptions['headers'] : null,
            ]
        );

        return $response->getBody()->getContents();
    }
}
