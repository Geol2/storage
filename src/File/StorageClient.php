<?php

namespace File;

use CURLFile;

class StorageClient
{
    public $url = "";

    public function upload($bucket, $token, $folder, $file) {

        $env = getenv("APP_ENV");
        if($env == "production") {
            $this->url = "https://zerostorage.zdev.co.kr/api/upload";
        } else if($env == "local") {
            $this->url = "http://localhost:8000/api/upload";
        } else if($env == "development") {
            $this->url = "https://zerostorage.zdev.co.kr/api/upload";
        } else {
            # 그 외엔 개발 환경
            # $this->url = "https://zerostorage.zdev.co.kr/api/upload";
            $this->url = "http://localhost:8000/api/upload";
        }

        $post = [
            'bucket' => $bucket,
            'stoken' => $token,
            'folder' => $folder,
            'file_data'=> new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        ];
        $headers = array("Content-Type:multipart/form-data");

        $curl = curl_init();

        if( strpos($this->url, "https://") !== false ) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        }

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        if($response === "" || $response === false) {
            echo "error";
            return;
        }
        $json_data = substr($response, strpos($response, "{"));
        curl_close($curl);
        $result = json_decode($json_data);

        echo $result->file_url;
    }

    public function deleteFullPath($token, $fullPath) {

    }

    public function deleteLocalPath($token, $folder, $file, $localPath) {

    }

}