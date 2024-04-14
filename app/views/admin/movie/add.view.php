<?php
title("Quản lý phim");
require ('app/views/admin/header.php');
?>

<link rel="stylesheet" href="/public/tiendat/infoMovie.css">
<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
    <div class="info-movie container-fluid p-4 shadow">
        <h3>THÔNG TIN PHIM</h3>
        <form>
            <div class="mb-3">
                <label for="tenphim" class="form-label">Tên
                    phim</label>
                <input type="text" class="form-control" id="tenphim" required>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="ngayphathanh" class="form-label">Ngày phát
                        hành</label>
                    <input type="date" class="form-control" id="ngayphathanh" required>
                </div>

                <div class="col">
                    <label for class="form-label">Định
                        dạng</label>
                    <select class="form-select" name id required>
                        <option value="2D">2D</option>
                        <option value="3D">3D</option>
                        <option value="4D">4D</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label" for>Hạn chế độ
                        tuổi</label>
                    <select class="form-select" name id required>
                        <option value="P">P</option>
                        <option value="K">K</option>
                        <option value="T13">T13</option>
                        <option value="T16">T16</option>
                        <option value="T18">T18</option>
                    </select>
                </div>

                <div class="col">
                    <label for class="form-label">Hình
                        ảnh</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Link hình ảnh"
                            aria-label="Recipient's username" aria-describedby="button-addon2" required>
                        <button class="btn btn-outline-secondary" type id="button-addon2">Chọn
                            tệp</button>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="thoiluong" class="form-label">Thời
                        lượng (phút)</label>
                    <input type="number" class="form-control" id="thoiluong" required>
                </div>

                <div class="col">
                    <label for="ngonngu" class="form-label">Ngôn
                        ngữ</label>
                    <input type="text" class="form-control" id="ngonngu" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="daodien" class="form-label">Đạo
                        diễn</label>
                    <input type="text" class="form-control" id="daodien" required>
                </div>

                <div class="col">
                    <label for class="form-label">Tình
                        trạng</label>
                    <input type="text" class="form-control" id="tinhtrang" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="trailer" class="form-label">Trailer</label>
                    <input type="text" class="form-control" id="trailer" required>
                </div>

                <div class="col">
                    <label for="theloai" class="form-label">Thể
                        loại</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" readonly
                            id="theloai" required>
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Thể
                            loại</button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <!-- load dữ liệu thể loại phim -->
                            <li>
                                <div class="dropdown-item">
                                    <input type="checkbox" name id onclick="onTheLoaiChange(event, 'Chính kịch')">
                                    <label for>Chính
                                        kịch</label>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown-item">
                                    <input type="checkbox" name id onclick="onTheLoaiChange(event, 'Kiếm hiệp')">
                                    <label for>Kiếm hiệp</label>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown-item">
                                    <input type="checkbox" name id onclick="onTheLoaiChange(event, 'Lịch sử')">
                                    <label for>Lịch sử</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô
                    tả</label>
                <textarea class="form-control" id="description" rows="3" required></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">Reset</button>
                <button class="btn btn-primary" type="submit">Lưu</button>
            </div>
        </form>
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
</body>

<?php
require ('app/views/admin/footer.php');


?>