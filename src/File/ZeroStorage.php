<?php

namespace Geol\File;

class ZeroStorage implements Storage
{
    public static function factory($factory) {

    }

    function upload($bucket, $sToken, $folder, $file)
    {
        // TODO: Implement upload() method.
        $result = [
                "file_url" => "error"
        ];

        $root = $_SERVER['DOCUMENT_ROOT'];
        $dataRoot = $root."/data/";
        $inDataRoot = $bucket."/".$folder."/".$file->getClientOriginalName();
        $targetPath = $dataRoot.$inDataRoot;

        $returnPath = $_SERVER['APP_URL']."/data/".$inDataRoot;

        try {
            if (move_uploaded_file($_FILES['file_data']['tmp_name'], $targetPath)) {
                $result = [
                        "file_url" => $returnPath
                ];
            }
        } catch (\Exception $e) {

        }

        return $result;
    }

    function deleteLocalPath($bucket, $folder, $localPath)
    {
        // TODO: Implement deleteLocalPath() method.

    }

    function deleteFullPath($bucket, $sToken, $fullPath)
    {
        // TODO: Implement deleteFullPath() method.
    }
}