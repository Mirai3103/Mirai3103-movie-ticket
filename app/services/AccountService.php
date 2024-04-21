<?php
namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Request;
use App\Models\JsonResponse;
use App\Models\LoaiTaiKhoan;

class AccountService
{
    public static function getAllAccount($data)
    {
        $keyword = getArrayValueSafe($data, 'tu-khoa');
        $loaiTaiKhoan = getArrayValueSafe($data, 'loai-tai-khoan');
        $page = getArrayValueSafe($data, 'trang', 1);
        $pageSize = getArrayValueSafe($data, 'limit', 20);
        $offset = ($page - 1) * $pageSize;
        $orderBy = getArrayValueSafe($data, 'sap-xep', 'MaTaiKhoan');
        $orderType = getArrayValueSafe($data, 'thu-tu', 'desc');

        $queryBuilder = new QueryBuilder();
        $queryBuilder->select([
            'TaiKhoan.MaTaiKhoan',
            'TaiKhoan.TrangThai',
            'TaiKhoan.LoaiTaiKhoan',
            'TaiKhoan.MaNguoiDung',
            'TaiKhoan.TenDangNhap',
            'NguoiDung.TenNguoiDung',
        ])
            ->from('TaiKhoan')
            ->join('NguoiDung', 'TaiKhoan.MaNguoiDung = NguoiDung.MaNguoiDung')
            ->join('NhomQuyen', 'TaiKhoan.MaNhomQuyen = NhomQuyen.MaNhomQuyen', 'left')
            ->where('1', '=', '1');
        if ($loaiTaiKhoan) {
            $queryBuilder->andWhere('TaiKhoan.LoaiTaiKhoan', '=', $loaiTaiKhoan);
        }
        if ($keyword) {
            $queryBuilder->and();
            $queryBuilder->startGroup();
            $queryBuilder->where('TaiKhoan.TenDangNhap', 'like', "%$keyword%");
            $queryBuilder->orWhere('NguoiDung.TenNguoiDung', 'like', "%$keyword%");
            $queryBuilder->orWhere('NguoiDung.MaNguoiDung', 'like', "$keyword");
            $queryBuilder->orWhere('TaiKhoan.MaTaiKhoan', 'like', "$keyword");
            $queryBuilder->orWhere('NhomQuyen.TenNhomQuyen', 'like', "%$keyword%");
            $queryBuilder->endGroup();
        }
        $count = $queryBuilder->count();
        $queryBuilder->orderBy('TaiKhoan.' . $orderBy, $orderType);
        $queryBuilder->limit($pageSize, $offset);
        $result = $queryBuilder->get();
        Request::setQueryCount($count);
        return $result;
    }

    public static function getAccountById($id)
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select([
            'TaiKhoan.MaTaiKhoan',
            'TaiKhoan.TrangThai',
            'TaiKhoan.LoaiTaiKhoan',
            'TaiKhoan.MaNguoiDung',
            'TaiKhoan.TenDangNhap',
        ])
            ->from('TaiKhoan')
            ->where('TaiKhoan.MaTaiKhoan', '=', $id);
        return $queryBuilder->first();
    }
    public static function updateAccount($data, $id)
    {
        $params = [
            'TenDangNhap' => $data['TenDangNhap'],
            'TrangThai' => $data['TrangThai'],
            'LoaiTaiKhoan' => $data['LoaiTaiKhoan'],
            'MaNguoiDung' => $data['MaNguoiDung'],
            'MaNhomQuyen' => $data['MaNhomQuyen'],
        ];
        $result = Database::update('TaiKhoan', $params, "MaTaiKhoan=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }
    public static function createNewAccount($data)
    {
        $params = [
            'TenDangNhap' => $data['TenDangNhap'],
            'MatKhau' => password_hash($data['MatKhau'], PASSWORD_DEFAULT),
            'TrangThai' => $data['TrangThai'],
            'LoaiTaiKhoan' => $data['LoaiTaiKhoan'],
            'MaNguoiDung' => $data['MaNguoiDung'],
        ];
        if ($data['LoaiTaiKhoan'] == LoaiTaiKhoan::NhanVien->value) {
            $params['MaNhomQuyen'] = $data['MaNhomQuyen'];
        }
        $result = Database::insert('TaiKhoan', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Tạo tài khoản thất bại', 500);
    }
    public static function toggleLockAccount($id)
    {
        $account = Database::queryOne("SELECT * FROM TaiKhoan WHERE MaTaiKhoan = ?", [$id]);
        $trangThai = $account['TrangThai'];
        if ($trangThai == 1) {
            $trangThai = 0;
        } else {
            $trangThai = 1;
        }
        $result = Database::update('TaiKhoan', ['TrangThai' => $trangThai], "MaTaiKhoan=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }
}