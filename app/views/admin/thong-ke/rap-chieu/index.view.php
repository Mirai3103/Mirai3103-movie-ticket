<?php
title("Thống kê theo rạp chiếu");
require ('app/views/admin/header.php');
?>
<link rel="stylesheet" href="/public/thong-ke/cinema/analyticsCinema.css">
<div style="
          flex-grow: 1;
          flex-shrink: 1;
          overflow-y: auto;
          max-height: 100vh;
        " class="wrapper p-5">
    <div class="analytics-cinema container-fluid p-0">
        <!-- thông tin rạp chiếu và thời gian thống kê -->
        <div class="row shadow bg-white border_radius-16 p-3 mb-4 mx-auto">
            <form>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Rạp chiếu</label>
                            <div class="input-group mb-3">
                                <select id="my_cinema" class="form-select" id="inputGroupSelect01">
                                    <option selected value="all">Rạp. . .</option>
                                    <option value="1">Quốc Thanh</option>
                                    <option value="2">Hai Bà Trưng</option>
                                    <option value="3">Bình Dương</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="mb-3">
                            <label for="ngayBatDau" class="form-label">Từ ngày</label>
                            <input type="date" class="form-control" id="ngayBatDau" aria-describedby="emailHelp" />
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="mb-3">
                            <label for="ngayKetThuc" class="form-label">Đến ngày</label>
                            <input type="date" class="form-control" id="ngayKetThuc" aria-describedby="emailHelp" />
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thống kê theo dạng</label>
                            <div class="input-group mb-3">
                                <select id="my_statistical_formats" class="form-select" id="inputGroupSelect01">
                                    <option selected value="chart">Biểu đồ</option>
                                    <option value="table">Bảng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- hết thông tin rạp chiếu và thời gian thống kê -->

        <!-- các chỉ số tổng quát của rạp -->
        <div class="row mb-4">
            <div class="col-4">
                <div class="total_amount-container text-center py-4 border_radius-16">
                    <img alt="icon" src="https://minimals.cc/assets/icons/glass/ic_glass_bag.png" width="64px" />
                    <h3 class="fw-semibold">714k</h3>
                    <h6 class="text-body-tertiary">Doanh thu</h6>
                </div>
            </div>

            <div class="col-4">
                <div class="total_customers-container text-center py-4 border_radius-16">
                    <img alt="icon" src="https://minimals.cc/assets/icons/glass/ic_glass_users.png" width="64px" />
                    <h3 class="fw-semibold">1.35m</h3>
                    <h6 class="text-body-tertiary">Lượt khách</h6>
                </div>
            </div>

            <div class="col-4">
                <div class="total_orders text-center py-4 border_radius-16">
                    <img alt="icon" src="https://minimals.cc/assets/icons/glass/ic_glass_buy.png" width="64px" />
                    <h3 class="fw-semibold">1.75m</h3>
                    <h6 class="text-body-tertiary">Hóa đơn</h6>
                </div>
            </div>
        </div>
        <!-- hết các chỉ số tổng quát của rạp -->

        <!-- ======================Thống kê theo dạng biểu đồ============================= -->
        <!-- biểu đồ cột -->
        <div id="column_chart" class="row bg-white shadow border_radius-16 p-3 mb-4 mx-auto d-none">
            <div class="fw-semibold">Doanh thu theo thời gian</div>
            <div id="columnChart"></div>
        </div>
        <!-- hết biểu đồ cột -->

        <!-- biểu đồ doanh thu tất cả các rạp -->
        <div id="bar_chart" class="row bg-white shadow border_radius-16 p-3 mb-4 mx-auto">
            <div class="p-0">
                <div class="d-flex flex-column">
                    <span class="fs-5 fw-semibold">Tổng doanh thu các rạp chiếu</span>
                    <span class="text-body-secondary" style="font-size: 0.875rem">(+45%) so với năm ngoái</span>
                </div>

                <!-- chứa biểu đồ cột -->
                <div id="bar_chart"></div>
                <!-- hết biểu đồ cột -->
            </div>
        </div>
        <!-- hết biểu đồ doanh thu tất cả các rạp -->

        <div id="donut_chart_top_movies" class="row detail-chart_container">
            <!-- biểu đồ tròn doanh số theo hàng hóa -->
            <div class="col-6">
                <div class="p-3 bg-white shadow border_radius-16" style="height: 100%">
                    <div class="mb-2">
                        <div class="fw-semibold">Doanh thu theo hàng hóa</div>
                        <div class="fw-semibold flex-nowrap">
                            <span class="fs-4">300</span>
                            tỷ
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img"
                                class="component-iconify MuiBox-root css-v0h3dx iconify iconify--solar" width="1em"
                                height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 17.75a.75.75 0 0 1-.488-1.32l7-6a.75.75 0 0 1 .976 0l7 6A.75.75 0 0 1 19 17.75z"
                                    opacity=".5"></path>
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.43 13.488a.75.75 0 0 0 1.058.081L12 7.988l6.512 5.581a.75.75 0 1 0 .976-1.138l-7-6a.75.75 0 0 0-.976 0l-7 6a.75.75 0 0 0-.081 1.057"
                                    clip-rule="evenodd"></path>
                            </svg>
                            +2,6%
                        </div>
                        <div id="donutChart"></div>
                    </div>
                </div>
            </div>
            <!-- hết biểu đồ tròn doanh số theo hàng hóa -->

            <!-- top phim doanh thu cao -->
            <div class="col-6">
                <div class="p-3 bg-white shadow border_radius-16" style="height: 100%">
                    <div class="fw-semibold">Top phim có doanh thu cao</div>
                    <div class="fw-semibold flex-nowrap mb-4">
                        <span class="fs-4">300</span>
                        tỷ
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img"
                            class="component-iconify MuiBox-root css-1d7gxh4 iconify iconify--solar" width="1em"
                            height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 6.25a.75.75 0 0 0-.488 1.32l7 6c.28.24.695.24.976 0l7-6A.75.75 0 0 0 19 6.25z"
                                opacity=".5"></path>
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4.43 10.512a.75.75 0 0 1 1.058-.081L12 16.012l6.512-5.581a.75.75 0 1 1 .976 1.139l-7 6a.75.75 0 0 1-.976 0l-7-6a.75.75 0 0 1-.081-1.058"
                                clip-rule="evenodd"></path>
                        </svg>
                        -0,1%
                    </div>

                    <!-- bắt đầu danh sách phim -->
                    <div class="row p-3">
                        <div class="d-flex">
                            <div class="me-auto">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <div class="text-center d-block">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail" alt />
                                        </div>
                                    </div>

                                    <div class="col-6 p-0 ps-2">
                                        <div class="fw-semibold">
                                            KUNG FU PANDA 4 2D PĐ (P)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class>
                                <div class="row">
                                    <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                        450.000.000
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-end m-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="d-flex">
                            <div class="me-auto">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <div class="text-center d-block">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail" alt />
                                        </div>
                                    </div>

                                    <div class="col-6 p-0 ps-2">
                                        <div class="fw-semibold">
                                            KUNG FU PANDA 4 2D PĐ (P)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class>
                                <div class="row">
                                    <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                        450.000.000
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-end m-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="d-flex">
                            <div class="me-auto">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <div class="text-center d-block">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail" alt />
                                        </div>
                                    </div>

                                    <div class="col-6 p-0 ps-2">
                                        <div class="fw-semibold">
                                            KUNG FU PANDA 4 2D PĐ (P)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class>
                                <div class="row">
                                    <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                        450.000.000
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-end m-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="d-flex">
                            <div class="me-auto">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <div class="text-center d-block">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail" alt />
                                        </div>
                                    </div>

                                    <div class="col-6 p-0 ps-2">
                                        <div class="fw-semibold">
                                            KUNG FU PANDA 4 2D PĐ (P)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class>
                                <div class="row">
                                    <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                        450.000.000
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-end m-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">
                        <div class="d-flex">
                            <div class="me-auto">
                                <div class="row">
                                    <div class="col-1 p-0">
                                        <div class="text-center d-block">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail" alt />
                                        </div>
                                    </div>

                                    <div class="col-6 p-0 ps-2">
                                        <div class="fw-semibold">
                                            KUNG FU PANDA 4 2D PĐ (P)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class>
                                <div class="row">
                                    <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                        450.000.000
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-end m-0">15%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hết danh sách phim -->
                </div>
            </div>
            <!-- hết top phim doanh thu cao -->
        </div>
        <!-- =========================hết thống kê theo dạng biểu đồ========================= -->

        <!-- ========================thống kê theo dạng bảng======================== -->
        <!-- bảng của biểu đồ cột -->
        <div class="row bg-white shadow border_radius-16 p-3 mb-4 mx-auto tables d-none">
            <div class="container">
                <div class="row mb-2">
                    <span class="fw-semibold">Doanh thu theo thời gian</span>
                </div>

                <div class="row table_container">
                    <table class="table table-column-chart">
                        <thead class="table-header">
                            <tr>
                                <th scope="col">Thời gian</th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                        <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                    </svg>
                                    Số lượng sản phẩm
                                </th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                        <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                    </svg>
                                    Doanh thu sản phẩm
                                </th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                        <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                    </svg>
                                    Số vé
                                </th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                        <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                    </svg>
                                    Doanh thu phim
                                </th>
                                <th scope="col">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                        <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                    </svg>
                                    Tổng doanh thu
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                            <tr>
                                <th scope="row">13/6/2023</th>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                                <td>123.000.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- hết bảng của biểu đồ cột -->

        <div class="row tables d-none">
            <!-- bảng của biểu đồ tròn -->
            <div class="col-6">
                <div class="container p-3 bg-white border_radius-16">
                    <div class="fw-semibold">Doanh thu theo hàng hóa</div>
                    <div class="fw-semibold flex-nowrap">
                        <span class="fs-4">300</span>
                        tỷ
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img"
                            class="component-iconify MuiBox-root css-v0h3dx iconify iconify--solar" width="1em"
                            height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 17.75a.75.75 0 0 1-.488-1.32l7-6a.75.75 0 0 1 .976 0l7 6A.75.75 0 0 1 19 17.75z"
                                opacity=".5"></path>
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4.43 13.488a.75.75 0 0 0 1.058.081L12 7.988l6.512 5.581a.75.75 0 1 0 .976-1.138l-7-6a.75.75 0 0 0-.976 0l-7 6a.75.75 0 0 0-.081 1.057"
                                clip-rule="evenodd"></path>
                        </svg>
                        +2,6%
                    </div>
                    <div class="table_container">
                        <table class="table">
                            <thead class="table-header">
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                            <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                        </svg>
                                        Số lượng
                                    </th>
                                    <th scope="col">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 9l4 -4l4 4m-4 -4v14" />
                                            <path d="M21 15l-4 4l-4 -4m4 4v-14" />
                                        </svg>
                                        Doanh thu
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                                <tr>
                                    <th scope="row">Combo 2</th>
                                    <td>1340</td>
                                    <td>123.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- hết bảng của biểu đồ tròn -->

            <!-- bảng doanh thu phim -->
            <div class="col-6">
                <div class="container p-3 bg-white border_radius-16">
                    <div class="fw-semibold">Doanh thu các phim</div>
                    <div class="fw-semibold flex-nowrap">
                        <span class="fs-4">300</span>
                        tỷ
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true" role="img"
                            class="component-iconify MuiBox-root css-1d7gxh4 iconify iconify--solar" width="1em"
                            height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M5 6.25a.75.75 0 0 0-.488 1.32l7 6c.28.24.695.24.976 0l7-6A.75.75 0 0 0 19 6.25z"
                                opacity=".5"></path>
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M4.43 10.512a.75.75 0 0 1 1.058-.081L12 16.012l6.512-5.581a.75.75 0 1 1 .976 1.139l-7 6a.75.75 0 0 1-.976 0l-7-6a.75.75 0 0 1-.081-1.058"
                                clip-rule="evenodd"></path>
                        </svg>
                        -0,1%
                    </div>

                    <!-- danh sách phim -->
                    <div class="container table_container pt-3">
                        <div class="row">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <div class="row">
                                        <div class="col-1 p-0 align-self-center">
                                            <img src="https://cinestar.com.vn/pictures/Cinestar/03-2024/kungfu-panda-4-poster.jpg"
                                                class="img-fluid img-thumbnail p-0" alt />
                                        </div>

                                        <div class="col-6 p-0 ps-2">
                                            <div class="fw-semibold">
                                                KUNG FU PANDA 4 2D PĐ (P)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <div class="row">
                                        <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                            450.000.000
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="text-end m-0">15%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="row my-2" />

                        <div class="row">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <div class="row">
                                        <div class="col-1 p-0 align-self-center">
                                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg"
                                                class="img-fluid img-thumbnail p-0" alt />
                                        </div>

                                        <div class="col-6 p-0 ps-2">
                                            <div class="fw-semibold">
                                                HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                                                (T13)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <div class="row">
                                        <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                            450.000.000
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="text-end m-0">15%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="row my-2" />

                        <div class="row">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <div class="row">
                                        <div class="col-1 p-0 align-self-center">
                                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg"
                                                class="img-fluid img-thumbnail p-0" alt />
                                        </div>

                                        <div class="col-6 p-0 ps-2">
                                            <div class="fw-semibold">
                                                HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                                                (T13)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <div class="row">
                                        <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                            450.000.000
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="text-end m-0">15%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="row my-2" />

                        <div class="row">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <div class="row">
                                        <div class="col-1 p-0 align-self-center">
                                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg"
                                                class="img-fluid img-thumbnail p-0" alt />
                                        </div>

                                        <div class="col-6 p-0 ps-2">
                                            <div class="fw-semibold">
                                                HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                                                (T13)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <div class="row">
                                        <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                            450.000.000
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="text-end m-0">15%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="row my-2" />

                        <div class="row">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <div class="row">
                                        <div class="col-1 p-0 align-self-center">
                                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg"
                                                class="img-fluid img-thumbnail p-0" alt />
                                        </div>

                                        <div class="col-6 p-0 ps-2">
                                            <div class="fw-semibold">
                                                HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                                                (T13)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-self-center">
                                    <div class="row">
                                        <p class="text-end m-0" style="color: rgb(0, 167, 111)">
                                            450.000.000
                                        </p>
                                    </div>
                                    <div class="row">
                                        <p class="text-end m-0">15%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hết danh sách phim -->
                </div>
            </div>
            <!-- hết bảng doanh thu phim -->
        </div>
        <!-- ================hết thống kê theo dạng bảng====================== -->
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<?php 
script('/public/thong-ke/cinema/main.js');
script('/public/thong-ke/cinema/barChart.js');
script('/public/thong-ke/cinema/columnChart.js');
script('/public/thong-ke/cinema/donutChart.js');

require ('app/views/admin/footer.php');
?>