<?php

namespace App\Services;

use App\Core\Database\Database;

class ComboService
{
    public static function getAllFoods()
    {
        return Database::findAll('ThucPham');
    }
    public static function getAllCombo()
    {
        return Database::findAll('Combo');
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

}