<?php

?>
<link rel="stylesheet" href="/public/nguoi-dung/main.css">
<div class="acc-page container-fluid p-3 px-sm-0">
    <div class="row m-5 m-sm-0 p-md-3 p-lg-5 mx-xxl-5">
        <!-- account sidebar -->
        <div class="col-sm-12 col-md-4 mb-sm-4">
            <div class="acc-sidebar container-fluid shadow p-3 rounded">
                <div class="row d-flex justify-content-center align-items-md-center text-center">
                    <div class>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="130" height="130" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </div>

                    <div>
                        <span>Thành viên</span>
                    </div>

                    <div class="mb-3">
                        <span class="fw-semibold fs-3">Nguyễn Vũ Tiến
                            Đạt</span>
                    </div>

                    <div class="acc-points text-start">
                        <div class="mb-2">
                            <span class="fw-semibold">Tích điểm thành
                                viên</span>
                        </div>

                        <div class="bock-bar mb-2">
                            <div class="curr-bar" style="width: 1.8%;"></div>
                        </div>

                        <div>
                            <span class="fw-semibold">180/10K</span>
                        </div>
                    </div>

                    <div>
                        <hr class="my-3">
                    </div>
                </div>

                <div class="row align-items-sm-center">
                    <div class="acc-sidebar__items mb-4 col-sm-6 mb-sm-0 col-md-12 mb-md-3">
                        <a href="/thong-tin-tai-khoan" class="active d-flex align-items-center justify-content-sm-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                            </svg>
                            <span class="fs-5 fw-semibold px-2">Thông
                                tin
                                khách
                                hàng</span>
                        </a>
                    </div>

                    <div class="acc-sidebar__items col-sm-6 col-md-12">
                        <a href="/lich-su-tai-khoan" class="d-flex align-items-center justify-content-sm-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-history" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 8l0 4l2 2" />
                                <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                            </svg>
                            <span class="fs-5 fw-semibold px-2">Lịch sử
                                mua
                                hàng</span>
                        </a>
                    </div>

                    <div class="d-sm-none d-md-block">
                        <hr class="my-3">
                    </div>
                </div>

                <div class="row d-sm-none d-md-block">
                    <div class="acc-logout">
                        <a href="#" class="logout d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                <path d="M9 12h12l-3 -3" />
                                <path d="M18 15l3 -3" />
                            </svg>

                            <span class="fs-5 fw-semibold px-2">Đăng
                                xuất</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- thông tin khách hàng -->
        <div class="col-sm-12 col-md-8">
            <div class="container-fluid p-0">
                <div class="fs-1 fw-bold text-white mb-3">Thông tin khách hàng</div>

                <div class="shadow bg-white rounded p-4 mb-4">
                    <div class="fs-2 fw-bold mb-3">Thông tin cá
                        nhân</div>
                    <form>
                        <div class="row">
                            <div class="col-6 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="hoTenKhachHang" class="form-label">Họ và
                                        tên</label>
                                    <input type="email" class="form-control" id="hoTenKhachHang" aria-describedby="emailHelp" required>
                                </div>
                            </div>

                            <div class="col-6 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="ngaySinh" class="form-label">Ngày
                                        sinh</label>
                                    <input type="date" class="form-control" id="ngaySinh" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="soDienThoai" class="form-label">Số điện
                                        thoại</label>
                                    <input type="email" class="form-control" id="soDienThoai" aria-describedby="emailHelp" required>
                                </div>
                            </div>

                            <div class="col-6 col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mb-sm-4 mb-md-3">
                            <label for="diaChi" class="form-label">Địa chỉ</label>
                            <input type="email" class="form-control" id="diaChi" aria-describedby="emailHelp" required>
                        </div>

                        <button type="submit" class="btn submit-btn col-sm-12 col-md-auto">Lưu thông
                            tin</button>
                    </form>
                </div>

                <div class="shadow bg-white rounded p-4">
                    <div class="fs-2 fw-bold mb-3">Đổi mật khẩu</div>
                    <form>
                        <div class="mb-3">
                            <label for="matKhauCu" class="form-label">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="matKhauCu" aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="matKhauMoi" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="matKhauMoi" aria-describedby="emailHelp" required>
                        </div>

                        <div class="mb-3 mb-sm-4 mb-md-3">
                            <label for="xacThucKhauMoi" class="form-label">Xác thực mật
                                khẩu</label>
                            <input type="password" class="form-control" id="xacThucKhauMoi" aria-describedby="emailHelp" required>
                        </div>

                        <button type="submit" class="btn submit-btn col-sm-12 col-md-auto">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

?>