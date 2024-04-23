<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Core\Logger;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Models\Permission;

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
        if (!isset($user)) {
            return [
                "isExist" => false
            ];
        }
        $account = AccountService::getUserAccount($user['MaNguoiDung']);
        return [
            "isExist" => isset($user) ? true : false,
            "HoTen" => $user['TenNguoiDung'] ?? '',
            "SoDienThoai" => $user['SoDienThoai'] ?? '',
            "HasAccount" => isset($account) ? true : false
        ];
    }

    public static function getUserByEmail($email)
    {
        $query = "SELECT * FROM NguoiDung WHERE Email = ?;";
        $user = Database::queryOne($query, [$email]);
        return $user;
    }


    public static function getUserOrCreateIfNotExist($data)
    {
        Logger::info(print_r($data, true));
        $email = $data['email'];
        $user = self::getUserByEmail($email);
        if (!$user) {
            $id = Database::insert(
                "NguoiDung",
                [
                    "TenNguoiDung" => $data['name'],
                    "Email" => $data['email'],
                    "SoDienThoai" => $data['phone'],
                ]
            );
            if (!$id) {
                return null;
            }
            return $id;
        } else {
            return $user['MaNguoiDung'];
        }
    }
    public static function register($data)
    {
        // nếu thông tin đã tồn tại mà tài khoản có thì tạo tài khoản
        $email = $data['email'];
        $existUser = self::getUserByEmail($email);
        if ($existUser) {
            $account = AccountService::getUserAccount($existUser['MaNguoiDung']);
            if (isset($account)) {
                return new JsonResponse(400, "Email đã tồn tại");
            }
        }
        $id = null;
        if (!isset($existUser)) {
            $id = Database::insert(
                "NguoiDung",
                [
                    "TenNguoiDung" => $data['name'],
                    "Email" => $data['email'],
                    "SoDienThoai" => $data['phone'],
                    "DiaChi" => $data['address'],
                    "NgaySinh" => getArrayValueSafe($data, 'dateOfBirth', null),
                    "DiemTichLuy" => 0,
                ]
            );
        } else {
            $id = $existUser['MaNguoiDung'];
        }
        if (!$id) {
            return new JsonResponse(500, "Đăng ký thất bại");
        }
        $res = AccountService::createNewAccount([
            "TenDangNhap" => $data['email'],
            "MatKhau" => $data['password'],
            "TrangThai" => null,
            "LoaiTaiKhoan" => AccountType::Customer->value,
            "MaNguoiDung" => $id,
        ]);
        if (!$res->isSuccessful()) {
            return new JsonResponse(500, "Đăng ký thất bại");
        }
        return new JsonResponse(200, "Đăng ký thành công");
    }


    private static function setSession($user)
    {
        if (isset($user['TaiKhoan']['MaNhomQuyen'])) {
            $role = RoleService::getRoleById($user['TaiKhoan']['MaNhomQuyen']);
            $permissions = array_map(function ($permission) {
                $rawPermission = $permission['TenQuyen'];
                $permission = Permission::from($rawPermission);
                return $permission;
            }, $role['Quyen']);
            $user['permissions'] = $permissions;

        }
        Logger::info(print_r($user, true));
        $_SESSION['user'] = $user;
    }
    private static function rememberLogin($user)
    {
        $secretKey = $GLOBALS['config']['Auth']['secret'];
        $rememberTime = $GLOBALS['config']['Auth']['remember_time_in_days'];
        $userId = $user['MaNguoiDung'];
        $rawHash = "$userId";
        $hash = hash_hmac('sha256', $rawHash, $secretKey);
        $cookieValue = "$userId|$hash";
        setcookie(
            "remember",
            $cookieValue,
            time() + 60 * 60 * 24 * $rememberTime
        );

    }
    public static function logout()
    {
        unset($_SESSION['user']);
        setcookie("remember", "", time() - 3600, '/');
    }

    private static function getUserById($id)
    {
        $query = "SELECT * FROM NguoiDung WHERE MaNguoiDung = ?;";
        $user = Database::queryOne($query, [$id]);
        return $user;
    }
    public static function login($username, $password, $rememberMe = false)
    {

        $query = "SELECT MaTaiKhoan,MaNguoiDung, TrangThai,LoaiTaiKhoan,MaNhomQuyen FROM TaiKhoan WHERE TenDangNhap = ? AND MatKhau = ?;";
        $account = Database::queryOne($query, [$username, $password]);
        if (!$account) {
            return new JsonResponse(401, "Sai tên đăng nhập hoặc mật khẩu");
        }
        $userInfor = self::getUserById($account['MaNguoiDung']);
        $userInfor['TaiKhoan'] = $account;

        self::setSession($userInfor);
        if ($rememberMe) {
            self::rememberLogin($userInfor);
        }
        return new JsonResponse(200, "Đăng nhập thành công", $userInfor);
    }
    public static function recoverAuth()
    {
        if (isset($_SESSION['user'])) {
            return;
        }
        if (isset($_COOKIE['remember'])) {
            $cookieValue = $_COOKIE['remember'];
            $secretKey = $GLOBALS['config']['Auth']['secret'];
            $parts = explode('|', $cookieValue);
            if (count($parts) !== 2) {
                return;
            }
            $userId = $parts[0];
            $hash = $parts[1];
            $rawHash = "$userId";
            $expectedHash = hash_hmac('sha256', $rawHash, $secretKey);
            if ($hash === $expectedHash) {
                $query = "SELECT * FROM NguoiDung WHERE MaNguoiDung = ?;";
                $user = Database::queryOne($query, [$userId]);

                if ($user) {
                    $query = "SELECT MaTaiKhoan, TrangThai,LoaiTaiKhoan,MaNhomQuyen FROM TaiKhoan WHERE MaNguoiDung = ?;";
                    $account = Database::queryOne($query, [$userId]);
                    $user['TaiKhoan'] = $account;

                    self::setSession($user);
                }
            }
        }
    }
}