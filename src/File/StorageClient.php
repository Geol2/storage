<?php

namespace File;

use CURLFile;
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

        $file_path = "./";
        $file_name = "test.txt";

        $post_data = [
            "bucket" => $bucket,
            "token" => $token,
            "folder" => $folder
        ];

        // cURL 설정
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'file' => new CURLFile($file_path, 'text/plain', $file_name),
            'data' => http_build_query($post_data),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // 서버로부터 받은 응답 처리
        $response = curl_exec($curl);


    }

    public function deleteFullPath($token, $fullPath) {

    }

    public function deleteLocalPath($token, $folder, $file, $localPath) {

    }

}