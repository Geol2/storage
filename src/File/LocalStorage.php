<?php

namespace Geol\File;

use Geol\Http\Response;
use Monolog\Logger;

class LocalStorage
{
    public function makeFileName($seq, $fileName) {
        $pos = strrpos($fileName, ".");
        if( $pos ) {
            $name = substr($fileName, 0, $pos);
            $ext = substr($fileName, $pos + 1, strlen($fileName) - $pos - 1);
        } else {
            $name = $fileName;
            $ext = null;
        }
        $name = $seq;

        if( empty($ext) ) {
            $newName = $name."-".time();
        } else {
            $newName = $name."-".time().".".$ext;
        }

        return $newName;
    }

    public function uploadImage($path, $file, $overwrite = false) {
        return $this->uploadFile($path, "img", $file, $overwrite);
    }

    public function uploadList($path, $file, $overwrite = false) {
        return $this->uploadFile($path, "list", $file, $overwrite);
    }

    public function uploadData($path, $file, $overwrite = false) {
        return $this->uploadFile($path, "data", $file, $overwrite);
    }

    public function uploadFile($path, $folder, $file, $overwrite = false) {
        $result = Response::FILE_UPLOAD_FAILED;

        if( $path === null) {
            $path = $_SERVER['DOCUMENT_ROOT'];
        }

        $dataDir = $path."/data";
        $targetDir  = $path."/data/".$folder;
        $targetPath = $path."/data/".$folder."/".$file['name'];

        if($_SERVER['_URL_HOME']) {
            $targetUrl = $_SERVER['_URL_HOME'] . "/data/" . $folder . "/" . $file['name'];
        }
        if($_SERVER['APP_URL']) {
            $targetUrl = $_SERVER['APP_URL'] . "/data/" . $folder . "/" . $file['name'];
        }

        try {
            if( !is_dir($dataDir) ) {
                $isDataDir = mkdir($dataDir, 0777);
            }
            if( !is_dir($targetDir) ) {
                $isMkDir = mkdir($targetDir, 0777);
            }
            if( file_exists($targetPath) && $overwrite === false ) {
                $result = Response::FILE_UPLOAD_CONFLICT;
                throw new \Exception("이미 존재하는 파일 입니다.");
            }

            if( move_uploaded_file($file['tmp_name'], $targetPath)) {
                $response = new Response();
                $response->setUrlFileUploadOk($targetPath);
                $result = $response->URL_FILE_UPLOAD_OK;
            }
        } catch(\Exception $e) {
            error_log("File Upload Fail : ".$file['tmp_name']." > ".$targetPath);
        }

        return $result;
    }
}