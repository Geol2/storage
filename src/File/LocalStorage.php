<?php

namespace Geol\File;

use Geol\Http\Response;

class LocalStorage
{

    public static function upload($path, $folder, $file, $overwrite) {
        $result = Response::FILE_UPLOAD_FAILED;

        if( $path === null) {
            $path = $_SERVER['DOCUMENT_ROOT'];
        }

        $dataDir = $path."/data";
        $targetDir  = $path."/data/".$folder;
        $targetPath = $path."/data/".$folder."/".$file['name'];

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
                $result = Response::FILE_UPLOAD_OK;
            }
        } catch(\Exception $e) {

        }

        return $result;
    }
}