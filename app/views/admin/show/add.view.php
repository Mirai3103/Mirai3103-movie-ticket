<?php
title("Quản lý suất chiếu");
require ('app/views/admin/header.php');
?>

<link rel="stylesheet" href="/public/tiendat/showtime.css">

<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
    <div class="info-movie container-fluid p-4 shadow">
        <h3>THÔNG TIN SUẤT CHIẾU</h3>
        <form>
            <div class="mb-3">
                <label for="phim" class="form-label">Tên
                    phim</label>
                <!-- load du lieu phim -->
                <select class="form-select" id="phim" required>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="ngaygiobatdau" class="form-label">Bắt đầu</label>
                    <input type="datetime-local" class="form-control" id="ngaygiobatdau" required>
                </div>

                <div class="col">
                    <label for="ngaygioketthuc" class="form-label">Kết thúc</label>
                    <input type="datetime-local" class="form-control" id="ngaygioketthuc" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for="rapchieu">Rạp
                        chiếu</label>
                    <!-- load du lieu rap chieu -->
                    <select class="form-select" name id="rapchieu" required>
                        <option value="P">Hai Bà Trưng</option>
                        <option value="K">Quốc Thanh</option>
                        <option value="T13">Bình Dương</option>
                    </select>
                </div>

                <div class="col">
                    <label for="phongchieu" class="form-label">Phòng
                        chiếu</label>
                    <!-- load du lieu phong chieu -->
                    <select class="form-select" name id="phongchieu" required>
                        <option value="P">P-01</option>
                        <option value="K">P-02</option>
                        <option value="T13">P-03</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="phuthu" class="form-label">Phụ
                        thu</label>
                    <input type="number" class="form-control" id="phuthu" required>
                </div>

                <div class="col">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">Reset</button>
                <button class="btn btn-primary" type="submit">Lưu</button>
            </div>
        </form>
    </div>
</div>
<?php
require ('app/views/admin/footer.php');


?>