<?php

namespace Geol\Http;

class Response
{
    public $URL_FILE_UPLOAD_OK = [
        "code" => "200",
        "fil_url" => ""
    ];

    const FILE_UPLOAD_OK = [
        "code" => "200",
        "msg" => "업로드가 완료되었습니다."
    ];

    const FILE_UPLOAD_FAILED = [
        "code" => "500",
        "file_url" => "잘못된 서버 요청입니다. 확인 후 다시 시도해주세요."
    ];

    const TOKEN_NOT_FOUND = [
        "code" => "404",
        "res_msg" => "토큰을 찾을 수 없습니다. 확인 후, 다시 시도해주세요."
    ];

    const FILE_UPLOAD_ALLOW_FILE = [
        "code" => "400",
        "error" => "허용하지 않는 파일을 추가하였습니다."
    ];

    const FILE_UPLOAD_CONFLICT = [
        "code" => "409",
        "isRequestOverwrite" => true,
        "error" => "이미 존재하는 파일입니다."
    ];

    public function setUrlFileUploadOk($url) {
        $this->URL_FILE_UPLOAD_OK['fil_url'] = $url;
    }

    public function getUrlFileUploadOk() {
        return $this->URL_FILE_UPLOAD_OK;
    }
}