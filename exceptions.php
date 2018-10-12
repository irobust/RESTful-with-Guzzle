<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();

try {
$response = $client->request(
	'GET',
	'http://httpbin.org/status/503'
);

var_dump($response);
echo $response->getBody();
} catch (\GuzzleHttp\Exception\ClientException $e) {
	echo $e->getCode() . "\r\n";
	echo $e->getMessage() . "\r\n";
} catch (\GuzzleHttp\Exception\ServerException $e) {
	echo $e->getCode() . "\r\n";
	echo $e->getMessage() . "\r\n";
}
