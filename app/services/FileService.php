<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Models\JsonResponse;

class FileService
{
    private static $UPLOAD_DIR = '/public/uploads/';
    public static function upload(mixed $file): JsonResponse
    {
        $name = $file["name"];
        $nameParts = explode(".", $name);
        $ext = end($nameParts);
        $uniquefileName = uniqid() . '.' . $ext;
        $path = self::$UPLOAD_DIR . $uniquefileName;
        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path)) {
            return JsonResponse::ok([
                'path' => $path
            ]);
        } else {
            return JsonResponse::error("Upload file thất bại");
        }
    }
    public static function delete(string $path): JsonResponse
    {
        $target_file = $_SERVER['DOCUMENT_ROOT'] . $path;
        if (file_exists($target_file)) {
            unlink($target_file);
            return JsonResponse::ok();
        } else {
            return JsonResponse::error("File không tồn tại");
        }
    }
}