<?php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

//$bucket = $_POST['bucket'];
//$stoken = $_POST['stoken'];
//$folder = $_POST['folder'];
//$fileData = $_FILES['file_data'];

//$client = new StorageClient();

// 서비스에서 사용할 로직
//$client->upload($bucket, $stoken, $folder, $fileData);

$stoken = $_POST['stoken'];
$fullPath = $_POST['path'];
$client = new StorageClient();
$client->deleteFullPath($stoken, $fullPath);


//$localPath = $_POST['path'];
//$client->deleteLocalPath($bucket, $stoken, $localPath);