<?php

namespace App\Traits;

trait GuzzleHttpHelperTrait
{
    /**
     * Prepare Request Options.
     *
     * @param string $requestOption (formParams | query)
     *
     * @return Illuminate\Http\Response
     */
    public function prepareRequestOptions($requestData, $requestOption = null)
    {
        $returnData = [];
        if ($requestOption != null) {
            $returnData[$requestOption] = $requestData->all();
        }
        $returnData['headers'] = [
            'X-Access-Token' => $requestData->hasHeader('X-Access-Token') ? $requestData->header('X-Access-Token') : null,
            'X-Token-ID' => $requestData->hasHeader('X-Token-ID') ? $requestData->header('X-Token-ID') : null,
            'Authorization' => $requestData->hasHeader('Authorization') ? $requestData->header('Authorization') : null,
        ];

        return $returnData;
    }
}
