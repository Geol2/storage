<?php

namespace Geol\File;

interface StorageClientImpl
{
    public function upload(string $bucket, string $token, string $folder, $file);

    public function deleteFullPath($token, $fullPath);

    public function deleteLocalPath($bucket, $token, $localPath);
}