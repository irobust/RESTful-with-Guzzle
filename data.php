<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();

// *ตัวอย่าง 1*
$response = $client->request(
	'POST',
	'http://jsonplaceholder.typicode.com/posts',
	[
		'body' => 'foo',
	]
);

var_dump($response);
echo $response->getBody();


// *ตัวอย่าง 2*

// $response = $client->request(
// 	'POST',
// 	'http://jsonplaceholder.typicode.com/posts',
// 	[
// 		'json' => [
// 			'title' => 'Guzzle and REST',
// 			'body' => 'Guzzle makes working with REST APIs easy.',
// 			'userId' => 2,
// 		],
// 	]
// );

// var_dump($response);
// echo $response->getBody();