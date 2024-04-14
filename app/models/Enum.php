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
    case DaDat = 5;
    case ChuaDat = 4;
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
enum TrangThaiLoaiVe: int
{
    case An = 13;
    case DangHoatDong = 14;
}
enum TrangThaiKhuyenMai: int
{
    case An = 11;
    case DangHoatDong = 12;
}