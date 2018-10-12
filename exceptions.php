<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();

// *ตัวอย่าง 1*
try {
$response = $client->request(
	'GET',
	'http://jsonplaceholder.typicode.com/posts/1'
);

var_dump($response);
echo $response->getBody();
} catch (\GuzzleHttp\Exception\ClientException $e) {
	echo $e->getCode() . "\r\n";
	echo $e->getMessage() . "\r\n";
} 



// *ตัวอย่าง 2*

// try {
// $response = $client->request(
// 	'GET',
// 	'http://httpbin.org/status/503'
// );

// var_dump($response);
// echo $response->getBody();
// } catch (\GuzzleHttp\Exception\ClientException $e) {
// 	echo $e->getCode() . "\r\n";
// 	echo $e->getMessage() . "\r\n";
// } catch (\GuzzleHttp\Exception\ServerException $e) {
// 	echo $e->getCode() . "\r\n";
// 	echo $e->getMessage() . "\r\n";
// }
