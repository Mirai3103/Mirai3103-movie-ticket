<?php

namespace App\Models;

enum TrangThaiPhim: int
{
    case DangChieu = 1;
    case SapChieu = 2;
    case NgungChieu = 3;
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

enum TrangThaiSuatChieu: int
{
    case Hidden = 15;
    case DangMoBan = 16;
    case HeVe = 17;
}

enum TrangThaiGhe: int
{
    case An = 18;
    case Hien = 19;
}
enum TrangThaiThucPham: int
{
    case An = 20;
    case Hien = 21;
}
enum TrangThaiRap: int
{
    case An = 22;
    case Hien = 23;
}