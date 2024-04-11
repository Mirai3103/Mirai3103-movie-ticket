<?php

namespace App\Models;

enum TrangThaiPhim: int
{
    case DangChieu = 1;
    case SapChieu = 2;
    case SapKhoiChieu = 3;
}

enum TrangThaiVe: int
{
    case DaDat = 4;
    case ChuaDat = 5;
}

enum TrangThaiPhong: int
{
    case DangBaoTri = 6;
    case DangHoatDong = 7;
}

enum TrangThaiHoaDon: int
{
    case ThanhCong = 8;
    case Nhap = 9;
    case An = 10;
}