<?php

namespace Geol\File;

interface StorageClientImpl
{
    public function upload($bucket, $token, $folder, $file, $overwrite);

    public function deleteFullPath($token, $fullPath);

    public function deleteLocalPath($bucket, $token, $localPath);
}