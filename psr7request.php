<?php
require 'vendor/autoload.php';
use GuzzleHttp\Psr7\Request;

$request = new Request('GET', 'http://jsonplaceholder.typicode.com/posts/1');

echo $request->getUri() . "\r\n";
echo $request->getUri()->getScheme() . "\r\n";
echo $request->getUri()->getPort() . "\r\n";
echo $request->getUri()->getHost() . "\r\n";
echo $request->getUri()->getPath() . "\r\n";