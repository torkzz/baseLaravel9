<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Requests\GmaNews;
use Illuminate\Support\Arr;
use App\Traits\ResponseFormatterTrait;
use GuzzleHttp\Psr7\Response;

class GmaNewsController extends Controller
{
    use ResponseFormatterTrait;

    public $auditLog;
    public $request;
    public $gmaNewsRequest;

    public function __construct(Request $request, GmaNews $gmaNewsRequest)
    {
        $this->gmaNewsRequest = $gmaNewsRequest;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function test() 
    {
        $newsRequestData = $this->arrayFormat($this->gmaNewsRequest->getList($this->request));
        foreach ($newsRequestData as $key => $news) {
            $news['title'] = html_entity_decode($news['title']);
            dd($news);
        }
        return response($this->gmaNewsRequest->getList($this->request) , 200)->header('Content-Type', 'text/json');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
