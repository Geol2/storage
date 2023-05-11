<?php

namespace Geol\File;

class Client
{
    public static function requestUploadHost($env = "local"): string
    {
        if($env == "production") {
            $url = "https://zerostorage.zdev.co.kr/api/upload";
        } else if($env == "local") {
            $url = "http://localhost:8000/api/upload";
        } else if($env == "development") {
            $url = "https://zerostorage.zdev.co.kr/api/upload";
        } else {
            # 그 외엔 개발 환경
            # $this->url = "https://zerostorage.zdev.co.kr/api/upload";
            $url = "http://localhost:8000/api/upload";
        }

        return $url;
    }

    public static function requestDeleteHost($env = "local"): string
    {
        if($env == "production") {
            $url = "https://zerostorage.zdev.co.kr/api/delete";
        } else if($env == "local") {
            $url = "http://localhost:8000/api/delete";
        } else if($env == "development") {
            $url = "https://zerostorage.zdev.co.kr/api/delete";
        } else {
            # 그 외엔 개발 환경
            # $this->url = "https://zerostorage.zdev.co.kr/api/delete";
            $url = "http://localhost:8000/api/delete";
        }

        return $url;
    }

    public static function requestDeleteFullHost($env = "local"): string
    {
        if($env == "production") {
            $url = "https://zerostorage.zdev.co.kr/api/full/delete";
        } else if($env == "local") {
            $url = "http://localhost:8000/api/full/delete";
        } else if($env == "development") {
            $url = "https://zerostorage.zdev.co.kr/api/full/delete";
        } else {
            # 그 외엔 개발 환경
            # $this->url = "https://zerostorage.zdev.co.kr/api/full/delete";
            $url = "http://localhost:8000/api/full/delete";
        }

        return $url;
    }
}