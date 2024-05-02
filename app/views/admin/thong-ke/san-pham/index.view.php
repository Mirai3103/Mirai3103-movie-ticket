<?php
title("Thống kê sản phẩm");
require ("app/views/admin/header.php");
?>
<link rel="stylesheet" href="/public/thong-ke/product/analyticsProducts.css">
<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
    <div class="analytics-products container-fluid bg-white border_radius-16 shadow p-3 d-flex flex-column">
        <!-- thanh lọc dữ liệu -->
        <div class="row">
            <form>
                <div class="d-flex flex-row">
                    <div class="col-3 me-3">
                        <label class="form-label" for>Loại sản
                            phẩm</label>
                        <select class="form-select" name id required>
                            <option value="tatCa">Tất cả</option>
                            <option value="thucPham">Thực
                                phẩm</option>
                            <option value="combo">Combo</option>
                        </select>
                    </div>

                    <div class="me-3">
                        <div class="mb-3">
                            <label for="ngayBatDau" class="form-label">Từ
                                ngày</label>
                            <input type="date" class="form-control" id="ngayBatDau" aria-describedby="emailHelp">
                        </div>
                    </div>

                    <div class>
                        <div class="mb-3">
                            <label for="ngayKetThuc" class="form-label">Đến
                                ngày</label>
                            <input type="date" class="form-control" id="ngayKetThuc" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- hết thanh lọc dữ liệu -->

        <!-- bảng dữ liệu sản phẩm -->
        <div class="row px-3 overflow-y-auto table_container">
            <table class="table table-hover align-middle" style="height: 100%">
                <thead class="table-light table-header">
                    <tr>
                        <th scope="col-1">
                            <div class="col-name">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort"
                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                    <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                </svg>
                                Mã
                            </div>
                        </th>
                        <th scope="col-7">
                            <div class="col-name">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort"
                                    width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                    <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                </svg>
                                Tên sản phẩm
                            </div>
                        </th>
                        <th scope="col-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort"
                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                            </svg>
                            Số lượng
                        </th>
                        <th scope="col-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort"
                                width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                            </svg>
                            Doanh thu
                        </th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto" style="height: 100%;">
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>
                    <tr>
                        <th scope="row">127</th>
                        <td><a href>Combo 2</a></td>
                        <td>123000</td>
                        <td>123.334.400.000</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- hết bảng dữ liệu sản phẩm -->
    </div>
</div>
</div>
<!-- javascript -->
<!-- <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script> -->
<?php
require ("app/views/admin/footer.php");
?>