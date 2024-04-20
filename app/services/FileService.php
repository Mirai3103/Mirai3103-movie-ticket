<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Models\JsonResponse;

class FileService
{
    private static $UPLOAD_DIR = '/public/uploads/';
    private static function createUploadDir(): void
    {
        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . self::$UPLOAD_DIR)) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . self::$UPLOAD_DIR, 0777, true);
        }
    }
    public static function upload(mixed $file): JsonResponse
    {
        self::createUploadDir();
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