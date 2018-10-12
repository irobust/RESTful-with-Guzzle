<?php
require 'vendor/autoload.php';
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Client;

class JsonPlaceholderPost {
	public function _construct($jsonString) {
		$decodeJsonString = json_decode($jsonString);
		$this->id = $decodeJsonString->id;
		$this->userId = $decodeJsonString->userId;
		$this->title = $decodeJsonString->title;
		$this->body = $decodeJsonString->body;
		unset($decodeJsonString);
	}

	public function _toString() {
		$string = "id: {$this->id}\r\n";
		$string = "userId: {$this->userId}\r\n";
		$string = "title: {$this->title}\r\n";
		$string = "body: {$this->body}\r\n";
		return $string;
	}
}

$stack = new HandlerStack();
$stack->setHandler(\GuzzleHttp\choose_handler());

$stack->push(Middleware::mapRequest(function (RequestInterface $request) {
	return $request->withHeader('X-Custom-Header-Request', 'Modified Headers Using Middleware');
}), 'add_custom_header_request');

$stack->push(Middleware::mapResponse(function (ResponseInterface $response) {
	return $response->withHeader('X-Custom-Header-Response', 'Modified Headers Using Middleware');
}), 'add_custom_header_response');

$stack->push(Middleware::mapResponse(function (ResponseInterface $response) {
	$PostObj = new JsonPlaceholderPost($response->getBody());
	$PostStream = GuzzleHttp\Psr7\stream_for($PostObj);
	return $response->withBody($PostStream);
}), 'convert');


echo "\r\n==== Full Stack ===\r\n";
$client = new Client(['handler' => $stack]);
$response = $client->get('http://jsonplaceholder.typicode.com/posts/1');

echo $response->getBody();
echo "\r\n";
echo "On Response: X-Custom-Header-Response: {$response->getHeaderLine('X-Custom-Header-Response')}";
echo "\r\n";


echo "\r\n==== Remove String Middleware ===\r\n";
$stack->remove('convert');

$client = new Client(['handler' => $stack]);
$response = $client->get('http://jsonplaceholder.typicode.com/posts/1');

echo $response->getBody();
echo "\r\n";
echo "On Response: X-Custom-Header-Response: {$response->getHeaderLine('X-Custom-Header-Response')}";
echo "\r\n";