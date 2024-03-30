<?php

namespace App\Models;

class JsonResponse
{
    public int $status;
    public string $message;
    public array $data = [];

    public function __construct(int $status, string $message, array $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }
    public function isSuccessful(): bool
    {
        return $this->status >= 200 && $this->status < 300;
    }
    public static function ok(array $data = []): self
    {
        return new JsonResponse(200, "Thành công", $data);
    }
}

class JsonDataErrorRespose extends JsonResponse
{
    public array $errors;

    public function __construct(array $errors = [])
    {
        parent::__construct(400, "Dữ liệu không hợp lệ", []);
        $this->errors = $errors;
    }

    public static function create(array $errors = []): self
    {
        return new JsonDataErrorRespose($errors);
    }

    public function addFieldError(string $field, string $message): self
    {
        $this->errors[$field] = $message;
        return $this;
    }
}