<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\RequestException;
$client = new Client();

// *ตัวอย่าง 1*
$response = $client->requestAsync(
	'GET',
	'http://jsonplaceholder.typicode.com/posts/1'
);

var_dump($response);
echo $response->getBody();



// *ตัวอย่าง 2 -- Promise and Async*

// $promise = $client->requestAsync(
// 	'GET',
// 	'http://jsonplaceholder.typicode.com/posts/1'
// );

// $promise->then(
// 	function (Response $resp) {
// 		echo $resp->getBody();
// 	},
// 	function (RequestException $e) {
// 		echo $e->getMessage();
// 	}
// );
// $promise->wait();