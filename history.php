<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

$bucket = [];
$history = Middleware::history($bucket);
$stack = HandlerStack::create();
$stack->push($history);
$client = new Client(['handler' => $stack]);

$client->get('http://jsonplaceholder.typicode.com/posts/2');
$client->get('http://jsonplaceholder.typicode.com/posts/0', ['http_errors' => false]);

echo count($bucket) . "\r\n";

foreach ($bucket as $item) {
	echo $item['request']->getUri() . "\r\n";
	echo $item['response']->getBody() . "\r\n";
}