<?php

namespace File;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class StorageClient
{
    public $url = "";


    
    /**
     * @throws GuzzleException
     */
    public function upload($bucket, $token, $folder, $file) {

        $env = getenv("APP_ENV");
        if($env == "production") {
            $this->url = "https://zerostorage.zdev.co.kr/api/upload";
        } else if($env == "local") {
            $this->url = "https://localhost:8000/api/upload";
        } else if($env == "development") {
            $this->url = "https://zerostorage.zdev.co.kr/api/upload";
        } else {
            # 그 외엔 개발 환경
            $this->url = "https://localhost:8000/api/upload";
        }

        $client = new Client();
        $response = $client->request("POST", $this->url, [
            "multipart" => [
                "bucket" => $bucket,
                "stoken" => $token,
                "folder" => $folder,
                "file" => $file
            ]
        ]);

        $response->getBody()->getContents();
    }

    public function deleteFullPath($token, $fullPath) {

    }

    public function deleteLocalPath($token, $folder, $file, $localPath) {

    }

}