<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();

$response = $client->request(
	'GET',
	'http://jsonplaceholder.typicode.com/posts/1'
);

// ตัวอย่าง 1

if ($response->hasHeader('content-type')) {
	echo implode(', ', $response->getHeader('content-type')) . "\r\n";
}

// ตัวอย่าง 2

// if ($response->hasHeader('content-type')) {
// 	$header = GuzzleHttp\Psr7\parse_header($response->getHeader('content-type'));
// 	var_dump($header);
// }

// ตัวอย่าง 3

// if ($response->hasHeader('content-type')) {
// 	$header = GuzzleHttp\Psr7\parse_header($response->getHeader('content-type'));
// 	foreach($header as $value) {
// 		if (array_key_exists('charset', $value)) {
// 			echo $value['charset'];
// 		}
// 	}
// }