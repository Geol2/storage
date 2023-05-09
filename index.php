<?php
require 'vendor/autoload.php';

use File\StorageClient;


$file = new CURLFile('/', 'txt/plain', 'tes.txt');

// 서비스에서 사용할 로직
$client = new StorageClient();
try {
    $client->upload("cashmoa", "kaNuStnkcNW1kwn", "a5Es7usLtR", $file);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {

}