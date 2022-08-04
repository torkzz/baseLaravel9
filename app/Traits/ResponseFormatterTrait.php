<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponseFormatterTrait
{
    /**
     * Header Content-Type value.
     *
     * @var string
     */
    protected $contentType = 'application/json';

    /**
     * Build success response.
     *
     * @param string|array $data
     *
     * @return Illuminate\Http\Response
     */
    public function success($data, int $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', $this->contentType);
    }

    /**
     * Build error response.
     *
     * @param string|array $message
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function error($message, int $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error response.
     *
     * @param string|array $message
     * @param int          $code
     *
     * @return Illuminate\Http\Response
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', $this->contentType);
    }

    /**
     * String (Json Format) to Array converter.
     *
     * @param string|array $data
     *
     * @return Illuminate\Http\Response
     */
    public function arrayFormat($data)
    {
        return json_decode(response($data)->header('Content-Type', $this->contentType)->content(), true);
    }

    /**
     * String (Json Format) to Json converter.
     *
     * @param string|array $data
     *
     * @return Illuminate\Http\Response
     */
    public function jsonFormat($data)
    {
        return response($data)->header('Content-Type', $this->contentType);
    }
}
