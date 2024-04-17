<?php
use App\Models\JsonResponse;
use Core\Attributes\Route;

class FileController
{
    private static $UPLOAD_DIR = '/public/uploads/';
    #[Route("/api/file/upload", "POST")]
    public static function upload()
    {
        $name = $_FILES["file"]["name"];
        $nameParts = explode(".", $name);
        $ext = end($nameParts);
        $uniquefileName = uniqid() . '.' . $ext;
        $path = self::$UPLOAD_DIR . $uniquefileName;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $path)) {
            return json(JsonResponse::ok([
                'path' => $path
            ]));
        } else {
            return json(JsonResponse::error("Upload file thất bại"));
        }
    }
}