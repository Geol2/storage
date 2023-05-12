<?php

namespace Geol\File;

use CURLFile;

class StorageClient implements StorageClientImpl
{
    public $url = "";

    public function setUrl($url) {
        $this->url = $url;
    }

    public function upload($bucket, $token, $folder, $file)
    {
        $post = [
            'bucket' => $bucket,
            'stoken' => $token,
            'folder' => $folder,
            'file_data'=> new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        ];
        $headers = array("Content-Type:multipart/form-data");
        $result = Curl::postCurl($this->url, $post, $headers);

        return $result;
    }

    public function deleteLocalPath($bucket, $token, $localPath)
    {
        $post = [
            "bucket" => $bucket,
            "stoken" => $token,
            "path" => $localPath
        ];
        $result = Curl::postCurl($this->url, $post);

        return $result;
    }

    public function deleteFullPath($token, $fullPath)
    {
        $post = [
                "stoken" => $token,
                "path" => $fullPath
        ];
        $result = Curl::postCurl($this->url, $post);

        return $result;
    }
}