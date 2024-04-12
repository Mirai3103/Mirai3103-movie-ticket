<?php

namespace App\Services;

use App\Core\Database\Database;
use App\Models\JsonDataErrorRespose;
use App\Models\JsonResponse;
use App\Models\TrangThaiKhuyenMai;

class PromotionService
{

    public static function getPromotionByCode($code)
    {
        $query = "SELECT * FROM KhuyenMai WHERE MaKhuyenMai = ?";
        $promotion = Database::queryOne($query, [$code]);
        return $promotion;
    }
    public static function checkPromotion($code, $ticketTypeIds, $totalPrice)
    {
        $promotion = self::getPromotionByCode($code);
        if (!$promotion) {
            return JsonResponse::error("Không tìm thấy mã khuyến mãi");
        }
        if ($promotion['TrangThai'] != null && $promotion['TrangThai'] == TrangThaiKhuyenMai::An) {
            return JsonResponse::error("Khuyến mãi không còn hoạt động");
        }
        if ($promotion['NgayBatDau'] != null && $promotion['NgayBatDau'] > date('Y-m-d H:i:s')) {
            return JsonResponse::error("Không tìm thấy mã khuyến mãi");
        }
        if ($promotion['NgayKetThuc'] != null && $promotion['NgayKetThuc'] < date('Y-m-d H:i:s')) {
            return JsonResponse::error("Khuyến mãi đã hết hạn");
        }
        if ($promotion['GioiHanSuDung'] != null && $promotion['GioiHanSuDung'] <= 0) {
            return JsonResponse::error("Số lượng khuyến mãi đã hết");
        }
        $applyForTicketType = $promotion['MaLoaiVe'];
        if ($applyForTicketType != null && !in_array($applyForTicketType, $ticketTypeIds)) {
            return JsonResponse::error("Khuyến mãi không áp dụng cho loại vé bạn chọn");
        }
        $userId = $_SESSION['user']['MaNguoiDung'];
        $usageCount = self::countPromotionUsedByUser($userId, $code);
        if ($promotion['GioiHanTrenKhachHang'] != null && $usageCount >= $promotion['GioiHanTrenKhachHang']) {
            return JsonResponse::error("Bạn đã sử dụng hết số lần sử dụng khuyến mãi");
        }
        if ($promotion["GiaTriToiThieu"] != null && $totalPrice < $promotion["GiaTriToiThieu"]) {
            return JsonResponse::error("Tổng giá trị vé phải lớn hơn " . $promotion["GiaTriToiThieu"]);
        }
        $reducePrice = 0;
        $discountValue = $promotion['GiaTriGiam'];
        if ($discountValue > 100) {
            $reducePrice = $discountValue;
        } else {
            $reducePrice = $totalPrice * $discountValue / 100;
            $maxDiscount = $promotion['GiamToiDa'];
            if ($maxDiscount != null && $maxDiscount > 0) {
                $reducePrice = min($discountValue, $maxDiscount);
            }
        }
        $finalReducePrice = min($reducePrice, $totalPrice);
        return JsonResponse::ok([
            "reducePrice" => $finalReducePrice,
            "promotion" => $promotion
        ]);
    }
    private static function countPromotionUsedByUser($userId, $promotionId)
    {
        $query = "SELECT COUNT(*) FROM HoaDon WHERE MaKhuyenMai = ? AND MaNguoiDung = ?";
        $count = Database::queryOne($query, [$promotionId, $userId]);
        return $count;
    }
    public static function usePromotion($code, $ticketTypeIds, $totalPrice)
    {
        $result = self::checkPromotion($code, $ticketTypeIds, $totalPrice);
        if (!$result->isSuccessful()) {
            return $result;
        }
        // decrease promotion usage count
        $promotion = $result->data['promotion'];
        Database::update("KhuyenMai", [
            "GioiHanSuDung" => $promotion['GioiHanSuDung'] - 1
        ], " MaKhuyenMai = " . $promotion['MaKhuyenMai']);
        return $result;

    }
}