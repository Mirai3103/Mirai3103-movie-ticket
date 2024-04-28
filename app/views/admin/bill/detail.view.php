<?php
title("Quản lý hóa đơn");
require ('app/views/admin/header.php');
?>

<link rel="stylesheet" href="/public/tiendat/infoBill.css">
<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
    <div class="container-fluid">
        <div class="row">
            <!-- chi tiết hóa đơn -->
            <div class="detail-bill-container col-8 p-0 m-0">
                <!-- chi tiết vé đã đặt -->
                <div class="ticket-container row w-100 shadow p-3">
                    <div class="fs-4 fw-bold mb-3">
                        <?= $order['SuatChieu']['TenPhim'] ?>
                    </div>
                    <div class="fw-semibold fs-5">
                        <?= $order['SuatChieu']['TenRapChieu'] ?>
                    </div>
                    <div class="fw-normal">
                        <?= $order['SuatChieu']['DiaChi'] ?>
                    </div>

                    <div class="d-flex align-items-stretch mt-3">
                        <div class="flex-column">
                            <div class="fw-semibold">Thời
                                gian</div>
                            <script>
                            //YYYY-MM-DD HH:mm:ss
                            var dateStr = '<?= $order['SuatChieu']['NgayGioChieu'] ?>';
                            </script>
                            <div class="fs-5 fw-normal tw-capitalize" x-init="
                             const ngayChieuDayJs = dayjs(dateStr, 'YYYY-MM-DD HH:mm:ss');
                                const ngayChieuStr = ngayChieuDayJs.format('HH:mm dddd DD/MM/YYYY');
                                $el.innerText = ngayChieuStr;
                            ">22:45 Thứ
                                Hai
                                08/04/2024</div>
                        </div>

                        <div class="flex-column px-4">
                            <div class="fw-semibold">Phòng
                                chiếu</div>
                            <div class="fs-5 fw-normal">
                                <?= $order['SuatChieu']['TenPhongChieu'] ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $groupedByTicketType = []; // MaLoaiVe => [Ve]
                    foreach ($order['Ve'] as $ve) {
                        if (!isset($groupedByTicketType[$ve['MaLoaiVe']])) {
                            $groupedByTicketType[$ve['MaLoaiVe']] = [];
                        }
                        $groupedByTicketType[$ve['MaLoaiVe']][] = $ve;
                    }
                    $groupedBySeatType = []; // MaLoaiGhe => [Ve]
                    foreach ($order['Ve'] as $ve) {
                        if (!isset($groupedBySeatType[$ve['MaLoaiGhe']])) {
                            $groupedBySeatType[$ve['MaLoaiGhe']] = [];
                        }
                        $groupedBySeatType[$ve['MaLoaiGhe']][] = $ve;
                    }
                    ?>
                    <div class="d-flex align-items-stretch mt-3">
                        <!-- <div class="flex-column">
                            <div class="fw-semibold">Số vé</div>
                            <div class="fs-5 fw-normal">02</div>
                        </div>

                        <div class="flex-column px-4">
                            <div class="fw-semibold">Loại vé</div>
                            <div class="fs-5 fw-normal">HSSV - Người
                                cao tuổi</div>
                        </div> -->
                        <div class="tw-grid tw-gap-2  tw-gap-x-4 tw-grid-cols-2 tw-max-w-96">
                            <div class="fw-semibold">Loại vé</div>

                            <div class="fw-semibold">Số vé</div>
                            <?php foreach ($groupedByTicketType as $maLoaiVe => $ve): ?>
                                <div class="fs-5 fw-normal"><?= $ve[0]['TenLoaiVe'] ?></div>
                                <div class="fs-5 fw-normal"><?= count($ve) ?></div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                    <div class="d-flex align-items-stretch mt-3">
                        <div class="tw-grid tw-gap-2  tw-gap-x-4 tw-grid-cols-2 tw-max-w-96">
                            <div class="fw-semibold">Số Ghế</div>

                            <div class="fw-semibold">Loại Ghế</div>
                            <?php foreach ($groupedBySeatType as $maLoaiGhe => $ve): ?>
                                <div class="fs-5 fw-normal"><?= $ve[0]['TenLoaiGhe'] ?></div>
                                <div class="fs-5 fw-normal"><?= count($ve) ?></div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <!-- hết chi tiết vé đã đặt -->

                <!-- combo bắp mước -->
                <div class="prucduct-container row w-100 shadow p-3 tw-overflow-auto">
                    <div class="fs-4 fw-semibold mb-3">Bắp
                        nước</div>
                    <?php foreach ($order['Combos'] as $combo): ?>
                        <div class="row align-items-center">
                            <div class="col-1">
                                <img src="<?= $combo['HinhAnh'] ?>" alt width="48px">
                            </div>
                            <div class="col-7">
                                <div class="fw-medium fs-5">
                                    <?= $combo['TenCombo'] ?>
                                </div>
                                <div class="fs-6 fw-light">1 Coke 32oz -
                                    V + 1 Bắp 2 Ngăn 64OZ PM +
                                    CARAMEN</div>
                            </div>
                            <div class="col-1 text-end">
                                x<?= $combo['SoLuong'] ?>
                            </div>
                            <div class="col-3 text-end" x-text="toVnd(<?= $combo['Gia'] ?>)">
                                100,000
                                VNĐ
                            </div>
                        </div>
                        <hr class="my-4">
                    <?php endforeach; ?>

                </div>
                <!-- hết combo bắp nước -->
            </div>

            <!-- thong tin khach hang -->
            <div class="customer-info-container col-4 shadow">
                <!-- thông tin khách hàng -->
                <div class="row pt-4 px-4 ">
                    <p class="fs-4 m-0 fw-semibold p-0 ">Khách
                        hàng</p>
                </div>

                <div class="row p-4 border-bottom ">
                    <div class="col-3 p-0 text-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle"
                            width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </div>

                    <div class="col-9 ">
                        <h6>Nguyễn Hữu Hoàng</h6>
                        <div class="text-body-secondary ">huuhoang123@gmail.com</div>
                        <div class="text-body-secondary ">0378781517</div>
                    </div>
                </div>

                <!-- khuyến mãi -->
                <div class="row pt-4 px-4 ">
                    <p class="fs-4 m-0 fw-semibold p-0 ">Khuyến
                        mãi</p>
                </div>

                <div class="row align-items-center p-4 border-bottom">
                    <div class="col-6 p-0 ">
                        Ưu đãi sinh viên
                    </div>

                    <div class="col-6 text-end ">
                        Giảm 10% cho sinh viên
                    </div>
                </div>

                <!-- thanh toán -->
                <div class="row pt-4 px-4">
                    <p class="fs-4 m-0 fw-semibold p-0 ">Thanh
                        toán</p>
                </div>

                <div class="row align-items-center p-4 border-bottom">
                    <div class="col-6 p-0 ">
                        Thẻ quốc tế
                    </div>

                    <div class="col-5 text-end ">
                        **** **** **** 1234
                    </div>

                    <div class="col-1 p-0 ">
                        <svg viewBox="0 -54.25 482.51 482.51" id="Layer_1" data-name="Layer 1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000" width="30">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>mastercard</title>
                                <g>
                                    <path
                                        d="M220.13,421.67V396.82c0-9.53-5.8-15.74-15.32-15.74-5,0-10.35,1.66-14.08,7-2.9-4.56-7-7-13.25-7a14.07,14.07,0,0,0-12,5.8v-5h-7.87v39.76h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78Zm129.22-39.35h-14.5v-12H327v12h-8.28v7H327V408c0,9.11,3.31,14.5,13.25,14.5A23.17,23.17,0,0,0,351,419.6l-2.49-7a13.63,13.63,0,0,1-7.46,2.07c-4.14,0-6.21-2.49-6.21-6.63V389h14.5v-6.63Zm73.72-1.24a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76h7.87V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-111.41,4.14c-4.14-2.9-9.94-4.14-16.15-4.14-9.94,0-16.15,4.56-16.15,12.43,0,6.63,4.56,10.35,13.25,11.6l4.14.41c4.56.83,7.46,2.49,7.46,4.56,0,2.9-3.31,5-9.53,5a21.84,21.84,0,0,1-13.25-4.14l-4.14,6.21c5.8,4.14,12.84,5,17,5,11.6,0,17.81-5.38,17.81-12.84,0-7-5-10.35-13.67-11.6l-4.14-.41c-3.73-.41-7-1.66-7-4.14,0-2.9,3.31-5,7.87-5,5,0,9.94,2.07,12.43,3.31Zm120.11,16.57c0,12,7.87,20.71,20.71,20.71,5.8,0,9.94-1.24,14.08-4.56l-4.14-6.21a16.74,16.74,0,0,1-10.35,3.73c-7,0-12.43-5.38-12.43-13.25S445,389,452.07,389a16.74,16.74,0,0,1,10.35,3.73l4.14-6.21c-4.14-3.31-8.28-4.56-14.08-4.56-12.43-.83-20.71,7.87-20.71,19.88h0Zm-55.5-20.71c-11.6,0-19.47,8.28-19.47,20.71s8.28,20.71,20.29,20.71a25.33,25.33,0,0,0,16.15-5.38l-4.14-5.8a19.79,19.79,0,0,1-11.6,4.14c-5.38,0-11.18-3.31-12-10.35h29.41v-3.31c0-12.43-7.46-20.71-18.64-20.71h0Zm-.41,7.46c5.8,0,9.94,3.73,10.35,9.94H364.68c1.24-5.8,5-9.94,11.18-9.94ZM268.59,401.79V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm306.08-20.71a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76H532V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-30.65,20.71V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm111.83,0V366.17h-7.87v20.71c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25C564.73,415.46,560.17,409.25,560.17,401.79Z"
                                        transform="translate(-132.74 -48.5)"></path>
                                    <g>
                                        <rect x="169.81" y="31.89" width="143.72" height="234.42" fill="#ff5f00"></rect>
                                        <path
                                            d="M317.05,197.6A149.5,149.5,0,0,1,373.79,80.39a149.1,149.1,0,1,0,0,234.42A149.5,149.5,0,0,1,317.05,197.6Z"
                                            transform="translate(-132.74 -48.5)" fill="#eb001b"></path>
                                        <path
                                            d="M615.26,197.6a148.95,148.95,0,0,1-241,117.21,149.43,149.43,0,0,0,0-234.42,148.95,148.95,0,0,1,241,117.21Z"
                                            transform="translate(-132.74 -48.5)" fill="#f79e1b"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>

                <!-- tổng tiền -->
                <div class="row justify-content-end p-4">
                    <table class="table table-sm table-borderless text-end">
                        <tr>
                            <td class="text-dark-emphasis">Tiền
                                vé</td>
                            <td class="text-dark-emphasis">708,000
                                VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-dark-emphasis">Tiền bắp
                                nước</td>
                            <td class="text-dark-emphasis">708,000
                                VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-dark-emphasis">Khuyến
                                mãi</td>
                            <td class="text-danger">-708,000
                                VNĐ</td>
                        </tr>
                        <tr>
                            <td class="text-dark-emphasis">Thuế</td>
                            <td class="text-dark-emphasis">708,000
                                VNĐ</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Tổng tiền</td>
                            <td class="fw-semibold">708,000 VNĐ</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- javascript -->


<?php
require ('app/views/admin/footer.php');


?>