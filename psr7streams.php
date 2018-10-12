<?php
require 'vendor/autoload.php';
use GuzzleHttp\Psr7;

$stream = Psr7\stream_for('This is a Sample string data');
echo $stream . "\r\n";
echo $stream->getSize() . "\r\n";
echo $stream->isReadable() . "\r\n";
echo $stream->isWritable() . "\r\n";
echo $stream->isSeekable() . "\r\n";

$stream->write('test');
$stream->rewind();
echo $stream->read(5) . "\r\n";
echo $stream->getContents() . "\r\n";
echo $stream->eof() . "\r\n";