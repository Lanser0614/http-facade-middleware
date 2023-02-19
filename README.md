# http-facade-middleware

# INSTALL

composer require lanser/http-facade-middleware:dev-main

# With GuzzleHttp Client

$stack = HandlerStack::create(new CurlHandler());

$stack->push(new ExampleGuzzleMiddleware());

$client = new Client([
'base_uri' => 'https://dummyjson.com',
'handler' => $stack,
]);

$res = $client->get("/products/1");

# With Laravel Http Facade

      Http::baseUrl('https://dummyjson.com')
        ->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])
        ->withMiddleware(new ExampleGuzzleMiddleware())
          ->get("/products/1")->json();