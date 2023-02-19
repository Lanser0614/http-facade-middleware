<?php

namespace Lanser\HttpFacadeMiddleware\Examples;

use Carbon\Carbon;
use Exception;
use Lanser\HttpFacadeMiddleware\AbstractMiddleware\AbstractRequestOption;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExampleGuzzleMiddleware extends AbstractRequestOption
{
    protected function getRequestOptions(RequestInterface $request, ResponseInterface $response, Exception $reason = null): void
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $myfile = fopen('./logs/'.$date.".txt", "w");
        fwrite($myfile, json_encode($request->getBody()->getContents()));
        fwrite($myfile, json_encode($response->getBody()->getContents()));
    }
}