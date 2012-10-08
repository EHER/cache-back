<?php

require_once __DIR__.'/vendor/autoload.php';

use Respect\Rest\Router;

$app = new Router();

$httpStatusList = array(
    "200" => "HTTP/1.1 200 OK",
    "201" => "HTTP/1.1 201 Created",
    "202" => "HTTP/1.1 202 Accepted",
    "204" => "HTTP/1.1 204 No Content",
    "404" => "HTTP/1.1 404 Not Found",
    "500" => "HTTP/1.1 500 Internal Server Error",
);

$app->get('/status/*', function($statusCode) use($httpStatusList) {
        $header = "HTTP/1.1 404 Not Found";
        if (array_key_exists($statusCode, $httpStatusList)) {
            $header = $httpStatusList[$statusCode];
        }
        header($header);
});

$app->run();
