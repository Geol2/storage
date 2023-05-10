<?php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

$bucket = $_POST['bucket'];
$stoken = $_POST['stoken'];
$folder = $_POST['folder'];
$fileData = $_FILES['file_data'];

// 서비스에서 사용할 로직
$client = new StorageClient();
$client->upload($bucket, $stoken, $folder, $fileData);