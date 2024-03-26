<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;

enum AccountType: int
{
    case Employee = 1;
    case Customer = 2;
}
class UserService
{
    public static function isMailExist($email)
    {
        $query = "SELECT * FROM NguoiDung WHERE Email = ?;";
        $user = Database::queryOne($query, [$email]);
        return $user ? true : false;
    }
    public static function getUserByEmail($email)
    {
        $query = "SELECT * FROM NguoiDung WHERE Email = ?;";
        $user = Database::queryOne($query, [$email]);
        return $user;
    }

    public static function register($data)
    {
        $email = $data['email'];
        $isMailExist = self::isMailExist($email);
        if ($isMailExist) {
            return JsonDataErrorRespose::create(["email" => "Email đã tồn tại"]);
        }
        $id =  Database::insert(
            "NguoiDung",
            [
                "TenNguoiDung" => $data['fullname'],
                "Email" => $data['email'],
                "NgaySinh" => $data['dateOfBirth']
            ]
        );
        if (!$id) {
            return new JsonResponse(500, "Đăng ký thất bại");
        }
        $idTaiKhoan =  Database::insert(
            "TaiKhoan",
            [
                "TenDangNhap" => $data['email'],
                "MatKhau" => $data['password'],
                "LoaiTaiKhoan" => AccountType::Customer->value,
                "MaNguoiDung" => $id,
            ]
        );
        if (!$idTaiKhoan) {
            return new JsonResponse(500, "Đăng ký thất bại");
        }
        return new JsonResponse(200, "Đăng ký thành công");
    }

    public static function login($username, $password)
    {
        $query = "SELECT * FROM TaiKhoan WHERE TenDangNhap = ? AND MatKhau = ?;";
        $user = Database::queryOne($query, [$username, $password]);
        $userInfor = self::getUserByEmail($username);
        if (!$user) {
            return new JsonResponse(401, "Sai tên đăng nhập hoặc mật khẩu");
        }
        return new JsonResponse(200, "Đăng nhập thành công", $userInfor);
    }
}
