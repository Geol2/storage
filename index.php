<?php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

# 업로드
$bucket = $_POST['bucket'];
$stoken = $_POST['stoken'];
$folder = $_POST['folder'];
$fileData = $_FILES['file_data'];

$client = new StorageClient();
$client->upload($bucket, $stoken, $folder, $fileData);

# 풀경로 삭제
//$stoken = $_POST['stoken'];
//$fullPath = $_POST['path'];
//$client = new StorageClient();
//$client->deleteFullPath($stoken, $fullPath);

# 로컬경로 삭제
//$bucket = $_POST['bucket'];
//$stoken = $_POST['stoken'];
//$localPath = $_POST['path'];
//$client = new StorageClient();
//$client->deleteLocalPath($bucket, $stoken, $localPath);