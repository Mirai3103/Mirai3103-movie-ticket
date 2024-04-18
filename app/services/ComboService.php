<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Core\Database\QueryBuilder;
use App\Core\Request;
use App\Models\JsonResponse;

class ComboService
{
    public static function getAllFoodnDrink($querys = [])
    {
        $keyword = getArrayValueSafe($querys, 'tu-khoa');
        $priceFrom = getArrayValueSafe($querys, 'gia-tu');
        $priceTo = getArrayValueSafe($querys, 'gia-den');
        $sortDir = ifNullOrEmptyString(getArrayValueSafe($querys, 'thu-tu'), 'ASC');
        $sortBy = ifNullOrEmptyString(getArrayValueSafe($querys, 'sap-xep'), 'MaThucPham');
        $page = ifNullOrEmptyString(getArrayValueSafe($querys, 'trang'), 1);
        $limit = ifNullOrEmptyString(getArrayValueSafe($querys, 'limit'), 100);
        $offset = ($page - 1) * $limit;
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select(
            [
                'ThucPham.*'
            ]
        )->from('ThucPham')
            ->where('1', '=', '1');
        if (!isNullOrEmptyString($keyword)) {
            $queryBuilder->and();
            $queryBuilder->startGroup();
            $queryBuilder->where('TenThucPham', 'LIKE', "%$keyword%");
            $queryBuilder->orWhere('LoaiThucPham', 'LIKE', "%$keyword%");
            $queryBuilder->endGroup();
        }
        if (!isNullOrEmptyString($priceFrom)) {
            $queryBuilder->and();
            $queryBuilder->where('GiaThucPham', '>=', $priceFrom);
        }
        if (!isNullOrEmptyString($priceTo)) {
            $queryBuilder->and();
            $queryBuilder->where('GiaThucPham', '<=', $priceTo);
        }
        Request::setQueryCount($queryBuilder->count());
        $queryBuilder->orderBy($sortBy, $sortDir);
        $queryBuilder->limit($limit, $offset);

        $data = $queryBuilder->get();
        return $data;
    }
    public static function getFoodnDrinkById($id)
    {
        $sql = "SELECT ThucPham.* FROM ThucPham WHERE MaThucPham=?;";
        $foodndrink = Database::queryOne($sql, [$id]);
        return $foodndrink;
    }
    public static function createNewFoodnDrink($data)
    {
        $params = [
            'MaThucPham' => $data['MaThucPham'],
            'TenThucPham' => $data['TenThucPham'],
            'LoaiThucPham' => $data['LoaiThucPham'],
            'GiaThucPham' => $data['GiaThucPham'],
            'MoTa' => $data['MoTa'],
            //    'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::insert('ThucPham', $params);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Thêm mới thất bại', 500);
    }
    public static function updateFoodnDrink($data, $id)
    {
        $params = [
            'TenThucPham' => $data['TenThucPham'],
            'LoaiThucPham' => $data['LoaiThucPham'],
            'GiaThucPham' => $data['GiaThucPham'],
            'MoTa' => $data['MoTa'],
            // 'TrangThai' => $data['TrangThai'] ?? TrangThai::DangHoatDong->value
        ];
        $result = Database::update('ThucPham', $params, "MaThucPham=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật thất bại', 500);
    }
    public static function deleteFoodnDrink($id)
    {
        $result = Database::delete('ThucPham', "MaThucPham=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Xóa thất bại', 500);
    }


    public static function getAllCombo()
    {
        return Database::findAll('Combo');
    }
    public static function getComboById($id)
    {
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select(
            [
                'Combo.MaCombo' => 'MaCombo',
                'Combo.GiaCombo' => 'GiaCombo',
                'Combo.TenCombo' => 'TenCombo',
                'Combo.MoTa' => 'MoTa',
                'Combo.TrangThai' => 'TrangThai',
                'CT_Combo_ThucPham.MaThucPham' => 'MaThucPham',
                'ThucPham.TenThucPham' => 'TenThucPham',
                'ThucPham.GiaThucPham' => 'GiaThucPham',
                'CT_Combo_ThucPham.SoLuong' => 'SoLuong'
            ]
        )->from('Combo')
            ->join('CT_Combo_ThucPham', 'Combo.MaCombo = CT_Combo_ThucPham.MaCombo')
            ->join('ThucPham', 'CT_Combo_ThucPham.MaThucPham = ThucPham.MaThucPham')
            ->where('Combo.MaCombo', '=', $id);
        $data = $queryBuilder->get();
        // nhóm dữ liệu theo MaCombo
        if (empty($data)) {
            return JsonResponse::error('Không tìm thấy combo', 404);
        }
        $combo = [
            'MaCombo' => $data[0]['MaCombo'],
            'GiaCombo' => $data[0]['GiaCombo'],
            'TenCombo' => $data[0]['TenCombo'],
            'MoTa' => $data[0]['MoTa'],
            'TrangThai' => $data[0]['TrangThai'],
            'ThucPham' => []
        ];
        foreach ($data as $item) {
            $combo['ThucPham'][] = [
                'MaThucPham' => $item['MaThucPham'],
                'TenThucPham' => $item['TenThucPham'],
                'GiaThucPham' => $item['GiaThucPham'],
                'SoLuong' => $item['SoLuong']
            ];
        }
        return $combo;
    }

    public static function getComboByIds($ids)
    {
        if (empty($ids))
            return [];
        $ids = implode(",", $ids);
        return Database::query("SELECT * FROM Combo WHERE MaCombo IN ($ids)", []);
    }
    public static function getFoodByIds($ids)
    {
        if (empty($ids))
            return [];
        $ids = implode(",", $ids);
        return Database::query("SELECT * FROM ThucPham WHERE MaThucPham IN ($ids)", []);
    }

    public static function calCombosPrice($data) // {comboId:, quantity:}
    {
        $combos = self::getComboByIds(array_map(fn($item) => $item['MaCombo'], $data));
        $total = 0;
        foreach ($combos as $combo) {
            $total += $combo['GiaCombo'] * $data[array_search($combo['MaCombo'], array_column($data, 'MaCombo'))]['SoLuong'];
        }
        return $total;
    }
    public static function calFoodsPrice($data) // {foodId:, quantity:}
    {
        $foods = self::getFoodByIds(array_map(fn($item) => $item['MaThucPham'], $data));
        $total = 0;
        foreach ($foods as $food) {
            $total += $food['GiaThucPham'] * $data[array_search($food['MaThucPham'], array_column($data, 'MaThucPham'))]['SoLuong'];
        }
        return $total;
    }

    public static function createNewCombo($data)
    {
        $params = [
            'MaCombo' => $data['MaCombo'],
            'GiaCombo' => $data['GiaCombo'],
            'TenCombo' => $data['TenCombo'],
            'TrangThai' => $data['TrangThai'],
            'MoTa' => $data['MoTa']
        ];

        $result = Database::insert('Combo', $data);
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Thêm mới combo thất bại', 500);
    }

    public static function updateCombo($data, $id)
    {
        $params = [
            'GiaCombo' => $data['GiaCombo'],
            'TenCombo' => $data['TenCombo'],
            'TrangThai' => $data['TrangThai'],
            'MoTa' => $data['MoTa']
        ];
        $result = Database::update('Combo', $data, "MaCombo=$id");
        if ($result) {
            return JsonResponse::ok();
        }
        return JsonResponse::error('Cập nhật combo thất bại', 500);
    }

}