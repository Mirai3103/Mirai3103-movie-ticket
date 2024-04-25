<?php
title("Thêm tài khoản");
require ('app/views/admin/header.php');
?>

<link rel="stylesheet" href="/public/tiendat/infoAccount.css">

<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
    <div class="info-account container-fluid p-4 shadow">
        <h4>THÔNG TIN NGƯỜI DÙNG</h4>
        <form>
            <div class="mb-3">
                <label for="tennguoidung" class="form-label">Tên người dùng</label>
                <input type="text" class="form-control" id="tennguoidung" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="ngaysinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" required>
                </div>

                <div class="col">
                    <label for="gioitinh" class="form-label" for>Giới tính</label>
                    <select class="form-select" name id="gioitinh" required>
                        <option value="nam">Nam</option>
                        <option value="nu">Nữ</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="sodienthoai" class="form-label">Số điện thoại</label>
                    <input type="tel" class="form-control" id="sodienthoai" required>
                </div>

                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" required>
            </div>
        </form>
        <h4 class="mt-4">THÔNG TIN TÀI KHOẢN</h4>
        <form>
            <div class="mb-3">
                <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="tendangnhap" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="loaitaikhoan" class="form-label">Loại tài khoản</label>
                    <input type="text" class="form-control" id="loaitaikhoan" required>
                </div>

                <div class="col">
                    <label for="phanquyen" class="form-label" for>Phân quyền</label>
                    <select class="form-select" name id="phanquyen" required>
                        <option value="">Khách hàng</option>
                        <option value="">Nhân viên</option>
                        <option value="">Quản lý</option>
                        <option value="`">Admin</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="matkhau" class="form-label">Mật khẩu</label>
                    <input type="text" class="form-control" id="matkhau" required>
                </div>

                <div class="col">
                    <label for="trangthai" class="form-label">Trạng thái</label>
                    <input type="text" class="form-control" id="trangthai" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" required>
            </div>
        </form>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button">Reset</button>
            <button class="btn btn-primary" type="submit">Lưu</button>
        </div>
    </div>
</div>


<script>
function onTheLoaiChange(event, text) {
    var tenTheLoaiElement = document.getElementById('theloai');
    if (event.target.checked == true) {
        tenTheLoaiElement.value = tenTheLoaiElement.value + '  ' + text;
    } else {
        tenTheLoaiElement.value = tenTheLoaiElement.value.replace('  ' + text, '');
    }
}
</script>
<?php
require ('app/views/admin/footer.php');


?>