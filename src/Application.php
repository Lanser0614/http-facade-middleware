<?php


use GuzzleHttp\Client;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Lanser\HttpFacadeMiddleware\Examples\ExampleGuzzleMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';


// With GuzzleHttp\Client
/**
 * @return void
 */
function sendWithGuzzleExample(): void
{
    $stack = HandlerStack::create(new CurlHandler());
    $stack->push(new ExampleGuzzleMiddleware());
    $client = new Client([
        'base_uri' => 'https://dummyjson.com',
        'handler' => $stack,
    ]);

    try {
        $res = $client->get("/products/1");
    } catch (\GuzzleHttp\Exception\GuzzleException $e) {
    }
}

/**
 * @return void
 */
//function sendWithLaravelHttpFacade(): void
//{
//      Http::baseUrl('https://dummyjson.com')
//        ->withHeaders([
//            'Accept' => 'application/json',
//            'Content-Type' => 'application/json',
//        ])
//        ->withMiddleware(new ExampleGuzzleMiddleware())
//          ->get("/products/1")->json();
//}









