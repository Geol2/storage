<?php

namespace Geol\File;

use CURLFile;

class StorageClient implements StorageClientImpl
{
    public string $url = "";

    public function upload($bucket, $token, $folder, $file): void
    {
        $this->url = Client::requestUploadHost( getenv("APP_ENV") );

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

    public function deleteLocalPath($bucket, $token, $localPath): void
    {
        $this->url = Client::requestDeleteHost( getenv("APP_ENV") );

        $post = [
            "bucket" => $bucket,
            "stoken" => $token,
            "path" => $localPath
        ];
        $result = Curl::postCurl($this->url, $post);

        echo $result;
    }

    public function deleteFullPath($token, $fullPath): void
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