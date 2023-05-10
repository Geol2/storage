<?php

namespace Geol\File;

interface Storage
{
    function upload($bucket, $sToken, $folder, $file);

    function deleteLocalPath($bucket, $folder, $localPath);

    function deleteFullPath($bucket, $sToken, $fullPath);
}