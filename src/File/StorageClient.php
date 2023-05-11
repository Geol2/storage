<?php

namespace Geol\File;

use CURLFile;

class StorageClient implements StorageClientImpl
{
    public $url = "";

    public function upload($bucket, $token, $folder, $file)
    {
        $this->url = Client::requestUploadHost();

        $post = [
            'bucket' => $bucket,
            'stoken' => $token,
            'folder' => $folder,
            'file_data'=> new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        ];
        $headers = array("Content-Type:multipart/form-data");
        $result = Curl::postCurl($this->url, $post, $headers);

        echo $result;
    }

    public function deleteLocalPath($bucket, $token, $localPath)
    {
        $this->url = Client::requestDeleteHost();

        $post = [
            "bucket" => $bucket,
            "stoken" => $token,
            "path" => $localPath
        ];
        $result = Curl::postCurl($this->url, $post);

        echo $result;
    }

    public function deleteFullPath($token, $fullPath)
    {
        $this->url = Client::requestDeleteFullHost( getenv("APP_ENV") );

        $post = [
                "stoken" => $token,
                "path" => $fullPath
        ];
        $result = Curl::postCurl($this->url, $post);

        echo $result;
    }
}