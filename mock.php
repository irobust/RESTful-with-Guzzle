<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;

$mock = new MockHandler([
	new Response(200),
	new Response(200, ['X-Foo' => 'test']),
	new ClientException('Error', new Request('GET', 'test')),
]);

$handler = HandlerStack::create($mock);
$client = new Client(['handler' => $handler]);

echo $client->request('GET', '/')->getStatusCode() . "\r\n";
var_dump($client->request('GET', '/')->getHeader('X-Foo'));
echo $client->request('GET', '/')->getStatusCode() . "\r\n";

