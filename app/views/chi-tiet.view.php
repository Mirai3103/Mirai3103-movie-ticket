<?php
title("Dday la homr");

require ('partials/head.php'); ?>
<link rel="stylesheet" href="/public/chi_tiet_phim/test.css">
<link rel="stylesheet" href="/public/chi_tiet_phim/responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
    integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-lg -tw-mt-4" x-data="{
    selectedSchedule: null,
}">
    <script>
    var upcomingShows = <?= json_encode($upcomingShows) ?>;
    // / use loaddash to group by date
    var groupedShows = _.groupBy(upcomingShows, function(show) {
        return show.NgayGioChieu.split(" ")[0];
    });
    </script>
    <section class="sec-detail pt-sm-5">
        <div class="container-fluid detail__wr">
            <div class="row">
                <div class="detail__left col-xl-5 col-lg-5 col-5">
                    <div class="detail__left--img">
                        <img src=<?= $phim['HinhAnh'] ?> alt="Poster <?= $phim['TenPhim'] ?>" />
                    </div>
                </div>
                <div class="detail__right col-xl-7 col-lg-7 col-7">
                    <div class="detail__right--des">
                        <div class="row">
                            <span class="des__name">
                                <?= $phim['TenPhim'] ?>
                            </span>
                            <div class="info__detail">
                                <div class="info__detail-icon">
                                    <svg width="30" height="30" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.65102 10.7566C2.62066 9.72627 2.10549 9.21109 1.91379 8.54268C1.72209 7.87428 1.88592 7.16436 2.21357 5.74453L2.40252 4.92575C2.67818 3.73124 2.81601 3.13398 3.22499 2.72499C3.63398 2.31601 4.23123 2.17818 5.42574 1.90252L6.24453 1.71357C7.66436 1.38592 8.37428 1.22209 9.04268 1.41379C9.71109 1.60549 10.2263 2.12066 11.2566 3.15102L12.4764 4.37078C14.269 6.16344 15.1654 7.05976 15.1654 8.17358C15.1654 9.28739 14.269 10.1837 12.4764 11.9764C10.6837 13.769 9.78739 14.6654 8.67358 14.6654C7.55976 14.6654 6.66344 13.769 4.87078 11.9764L3.65102 10.7566Z"
                                            stroke="#F3EA28" stroke-width="1.5" />
                                        <circle cx="6.23718" cy="5.91797" r="1.33333"
                                            transform="rotate(-45 6.23718 5.91797)" stroke="#F3EA28"
                                            stroke-width="1.5" />
                                        <path d="M8.19548 12.332L12.8481 7.6792" stroke="#F3EA28" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                                <span class="info__detail-title">
                                    <?php
                                    $categoriesString = "";
                                    foreach ($categories as $category) {
                                        $categoriesString .= $category['TenTheLoai'] . ", ";
                                    }
                                    echo rtrim($categoriesString, ", ");
                                    ?>
                                </span>
                            </div>
                            <div class="info__detail">
                                <div class="info__detail-icon">
                                    <svg width="30" height="30" viewBox="0 0 17 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.4987" cy="7.9987" r="6.66667" stroke="#F3EA28"
                                            stroke-width="1.5" />
                                        <path d="M8.5 5.33203V7.9987L10.1667 9.66536" stroke="#F3EA28"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <span class="info__detail-title">
                                    <?= $phim['ThoiLuong'] ?> phút
                                </span>
                            </div>
                            <div class="info__detail">
                                <div class="info__detail-icon">
                                    <i class="fa-solid fa-earth-americas"></i>
                                </div>
                                <span class="info__detail-title">
                                    <?= $phim['NgonNgu'] ?>
                                </span>
                            </div>
                            <div class="info__detail">
                                <div class="info__detail-icon">
                                    <i class="icon-age fa-solid fa-user-check"></i>
                                </div>
                                <span class="info__detail-title">
                                    <?= $phim['HanCheDoTuoi'] ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="movie__detail--item row mt-xxl-5 mt-xl-3 mt-lg-3 mt-md-3 mt-3">
                        <h3 class="tt sub-title text-white tw-mb-2  ">MÔ TẢ</h3>
                        <span class="detail-director text-white">
                            Đạo diễn: <?= $phim['DaoDien'] ?>
                        </span>
                        <!-- <span class="detail-actor text-white" id="actor_id">
                            Diễn viên: Phương Anh Đào, Tuấn Trần, Trấn Thành, Hồng Đào,
                            Uyển Ân, Ngọc Giàu, Việt Anh, Quốc Khánh, Quỳnh Lý, Khả Như,
                            Anh Đức, Thanh Hằng, Ngọc Nga, Lộ Lộ, Kiều Linh, Ngọc Nguyễn,
                            Quỳnh Anh, Anh Thư.
                        </span> -->
                        <span class="detail-actor__show text-decoration-underline show__actor" id="btnShowActor">
                            Xem thêm
                        </span>
                        <span class="detail-time text-white">
                            Khởi chiếu: <?php
                            $date = date_create($phim['NgayPhatHanh']);
                            echo date_format($date, "d/m/Y");
                            ?>
                        </span>
                    </div>
                    <div class="mobile-movie-detail movie__detail--item row mt-xxl-5 mt-xl-3 mt-lg-2 mt-md-3 mt-3">
                        <div class="mv__content">
                            <h3 class="mv__content-title text-white">NỘI DUNG PHIM</h3>
                            <span class="mv__content-des text-white tw-py-3 show__des" id="mv__description">
                                <?= $phim['MoTa'] ?>
                            </span>
                            <span class="mv__content-btn text-decoration-underline" id="btnShowDes">
                                Xem thêm
                            </span>
                        </div>
                    </div>
                    <div class="row mt-xl-2 mt-lg-1 mv__trailer" id="trailerContainer">
                        <a href="<?= $phim['Trailer'] ?>" data-fancybox="true" class="mv__trailer" id="showVideo">
                            <span class="mv__trailer-icon">
                                <img src="../assets/img/play.png" alt="" />
                            </span>
                            <span class="mv__trailer-title text-white">
                                Xem Trailer
                            </span>
                        </a>

                        <div id="videoModal" class="modal display-none">

                        </div>
                    </div>
                </div>
            </div>
            <div class="movie_details--mobile">
                <div class="row mt-xxl-5 mt-xl-3 mt-lg-3 mt-md-3 mt-3">
                    <h3 class="tt sub-title text-white">MÔ TẢ</h3>
                    <span class="detail-director text-white">
                        Đạo diễn: Trấn Thành
                    </span>
                    <!-- <span class="detail-actor text-white show__actor-mobile">
                        Diễn viên: Phương Anh Đào, Tuấn Trần, Trấn Thành, Hồng Đào, Uyển
                        Ân, Ngọc Giàu, Việt Anh, Quốc Khánh, Quỳnh Lý, Khả Như, Anh Đức,
                        Thanh Hằng, Ngọc Nga, Lộ Lộ, Kiều Linh, Ngọc Nguyễn, Quỳnh Anh,
                        Anh Thư.
                    </span> -->
                    <!-- <span class="detail-actor__show text-decoration-underline show__actor"
                            id="btnShowActor">
                            Xem thêm
                        </span> -->
                    <span class="detail-time text-white">
                        Khởi chiếu: <?php
                        $date = date_create($phim['NgayPhatHanh']);
                        echo date_format($date, "d/m/Y");
                        ?>
                    </span>
                </div>
                <div class="row mt-xxl-5 mt-xl-3 mt-lg-2 mt-md-3 mt-3">
                    <div class="mv__content">
                        <h3 class="mv__content-title text-white">NỘI DUNG PHIM</h3>
                        <span class="mv__content-des text-white show__des-mobile" id="mv__description-mobile">
                            <?= $phim['MoTa'] ?>
                        </span>
                        <span class="mv__content-btn text-decoration-underline" id="btnShowDesMobile">
                            Xem thêm
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Movie schedule -->
    <section class="movie__schedule pt-sm-5">
        <div class="container movie__schedule-wr">
            <div class="row">
                <div
                    class="mv__schedule-heading justify-content-center text-center mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-5">
                    <span class="text-center text-warning"> LỊCH CHIẾU </span>
                </div>
                <div class="swiper-wrapper mt-5 justify-content-center">
                    <template x-for="date in Object.keys(groupedShows)" :key="date">
                        <button class="box-time text-center" x-on:click="
                        toggleActive($event.currentTarget);
                        selectedSchedule = date;
                        ">
                            <h4 class="date mt-3" x-text="dayjs(date).format('DD/MM')"></h4>

                            </h4>
                            <p class="day" x-text="dayjs(date).getDayOfWeek()">Thứ Ba</p>
                        </button>
                    </template>

                </div>
            </div>
        </div>
        <div class="container-fluid movie__schedule-details mt-4 pt-5 pb-1 position-relative">
            <div class="movie__schedule-item container bg-white rounded-2 pt-5 pt-lg-3 ps-5 my-xl-5">
                <div class="row movie__schedule-detail my-xxl-5 mt-lg-5">
                    <span class="theater-name"> PixelCinema Quốc Thanh </span>
                    <span class="theater-address">
                        271 Nguyễn Trãi, Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ
                        Chí Minh
                    </span>
                    <div class="list__info-ctype" data-name="PixelCinema Quốc Thanh"
                        data-address="271 Nguyễn Trãi, Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh">
                        <div class="ctype-title">Standard</div>
                        <ul class="row ctype-items justify-content-sm-start ms-sm-0 ps-0">
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                17:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                18:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                19:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                20:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                21:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                22:00
                            </li>
                        </ul>
                        <div class="ctype-title">Deluxe</div>
                        <ul class="row ctype-items justify-content-sm-start ms-sm-0 ps-0">
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                17:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                18:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                19:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                20:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                21:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                22:00
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row movie__schedule-detail my-xxl-5 my-lg-3">
                    <span class="theater-name"> PixelCinema Hai Bà Trưng </span>
                    <span class="theater-address">
                        135 Hai Bà Trưng, Phường Bến Nghé ,Quận 1,Thành Phố Hồ Chí Minh
                    </span>
                    <div class="list__info-ctype" data-name="PixelCinema Hai Bà Trưng"
                        data-address="135 Hai Bà Trưng, Phường Bến Nghé ,Quận 1,Thành Phố Hồ Chí Minh">
                        <div class="ctype-title">Standard</div>
                        <ul class="row ctype-items justify-content-sm-start ms-sm-0 ps-0">
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                17:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                18:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                19:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                20:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                21:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                22:00
                            </li>
                        </ul>
                        <div class="ctype-title">Deluxe</div>
                        <ul class="row ctype-items justify-content-sm-start ms-sm-0 ps-0">
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                17:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                18:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                19:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                20:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                21:00
                            </li>
                            <li class="ctype__item col-2 text-warning fs-6 text-center">
                                22:00
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="moive_schedule-list position-absolute text-white">
                <span> DANH SÁCH RẠP </span>
            </div>

            <!-- Ticket types -->
            <div class="container px-0">
                <div class="mv__schedule_ticket justify-content-center text-center mt-5">
                    <span class="text-center text-warning"> LOẠI VÉ </span>
                </div>
                <div class="row d-flex justify-content-start list-tickets px-2 justify-content-center fw-bold"
                    id="row-ticket">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-2">
                        <div class="ticket__item px-2">
                            <div class="ticket-detail">
                                <span class="ticket-type d-block"> NGƯỜI LỚN </span>
                                <span class="ticket-des d-block fs-6"> Đơn </span>
                                <span class="ticket-price fs-6"> 65.000 </span>
                            </div>

                            <div class="ticket-count d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-2">
                        <div class="ticket__item px-2">
                            <div class="ticket-detail">
                                <span class="ticket-type d-block">
                                    HSSV - NGƯỜI CAO TUỔI
                                </span>
                                <span class="ticket-des d-block fs-6"> Đơn </span>
                                <span class="ticket-price fs-6"> 45.000 </span>
                            </div>

                            <div class="ticket-count d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-xl-0 mt-lg-0 mt-md-0 mt-2">
                        <div class="ticket__item px-2">
                            <div class="ticket-detail">
                                <span class="ticket-type d-block"> NGƯỜI LỚN </span>
                                <span class="ticket-des d-block fs-6"> Đôi </span>
                                <span class="ticket-price fs-6"> 135.000 </span>
                            </div>

                            <div class="ticket-count d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="ticket__item col-5">
                            <span class="ticket-type d-block fs-5">
                                NGƯỜI LỚN
                            </span>
                            <span class="ticket-des d-block fs-6">
                                Đơn
                            </span>
                            <span class="ticket-price fs-6">
                                65.000
                            </span>
                            <div class="ticket-count d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">
                                    0
                                </div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                        <div class="ticket__item col-5">
                            <span class="ticket-type d-block fs-5">
                                NGƯỜI LỚN
                            </span>
                            <span class="ticket-des d-block fs-6">
                                Đơn
                            </span>
                            <span class="ticket-price fs-6">
                                65.000
                            </span>
                            <div class="ticket-count d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">
                                    0
                                </div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div> -->
                </div>
            </div>

            <!-- Chair choice -->
            <div class="container-xxl container-fluid px-0 mt-5">
                <div class="chair_title justify-content-center text-center">
                    <span class="text-center text-warning"> CHỌN GHẾ </span>
                </div>
                <div class="row seat-screen mt-5 text-center position-relative">
                    <img src="../assets/img/img-screen.png" alt="" />
                    <span class="seat-screen-title position-absolute fs-3 text-white">Màn hình</span>
                </div>
                <div class="minimap-container">
                    <div class="seat-table mt-4">
                        <table class="seat-table-inner text-white">
                            <!-- row A -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">A</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            A15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row B -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">B</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            B15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row C -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">C</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            C15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row D -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">D</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            D15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row E -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">E</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            E15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row F -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">F</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            F15
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row G -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">G</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            G17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row H -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">H</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            H17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row J -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">J</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            J17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row K -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">K</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            K17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row L -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">L</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            L17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row M -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">M</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            M17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row N -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">N</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            N17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row O -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">O</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            O09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            010
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            011
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            012
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            013
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            014
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            015
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            016
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            017
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row P -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">P</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            P17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row Q -->
                            <tr class="seat-table-row d-flex">
                                <td class="seat-name-row fs-5">Q</td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q02
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q03
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q06
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q07
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q08
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q09
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q10
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q11
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q12
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q13
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q14
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q15
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q16
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            Q17
                                        </span>
                                    </div>
                                </td>
                            </tr>

                            <!-- row R -->
                            <tr class="seat-table-row d-flex me-3">
                                <td class="seat-name-row seat-name-row-double fs-5">R</td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-couple">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R01
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-couple">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R02
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td seat-couple">
                                    <div class="seat-detail seat-couple-booked">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R03
                                        </span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-couple">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R04
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-couple">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R05
                                        </span>
                                    </div>
                                </td>
                                <td class="seat-td">
                                    <div class="seat-detail seat-couple">
                                        <span class="seat-detail-name d-flex justify-content-center">
                                            R06
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row seat-note mt-4 justify-content-between my-3 text-white">
                    <div class="seat__note-item col-xl-2 col-lg-2 col-md-2 col-6 d-flex align-items-center text-center">
                        Ghế Thường
                    </div>
                    <div class="seat__note-item col-xl-2 col-lg-2 col-md-2 col-6 d-flex align-items-center text-center">
                        Ghế Đôi
                    </div>
                    <div class="seat__note-item col-xl-2 col-lg-2 col-md-2 col-6 d-flex align-items-center text-center">
                        Ghế Vip
                    </div>
                    <div class="seat__note-item col-xl-2 col-lg-2 col-md-2 col-6 d-flex align-items-center text-center">
                        Ghế Chọn
                    </div>
                    <div class="seat__note-item col-xl-2 col-lg-2 col-md-2 col-6 d-flex align-items-center text-center">
                        Ghế Đã Đặt
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Combo -->
    <div class="combo pt-sm-5 mb-5 mt-3">
        <div class="container-fluid combo__heading">
            <div class="row">
                <div class="combo__title justify-content-center text-center">
                    <span class="text-center text-warning"> CHỌN BẮP NƯỚC </span>
                </div>
            </div>
            <div class="row combo-list mt-5 pt-4 justify-content-center d-flex">
                <div class="combo-item col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="food-item">
                        <div class="food-item__image-container col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <img src="../assets/img/COMBO-SOLO.png" alt="" class="food-item__img" />
                        </div>

                        <div class="food-item__detail col-xl-7 col-lg-7 col-md-7 col-12">
                            <span class="food-item__name d-block justify-content-center align-items-center text-center">
                                COMBO SOLO 2 NGĂN - VOL
                            </span>
                            <span class="food-item__des d-block">
                                1 Coke 32oz - V + 1 POPCORN 64OZ PM + CARAMEN
                            </span>
                            <span class="food-item__price d-block"> 119.000đ </span>
                            <div class="food-item__btn d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="combo-item col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="food-item">
                        <div class="food-item__image-container col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <img src="../assets/img/COMBO-PARTY.png" alt="" class="food-item__img" />
                        </div>

                        <div class="food-item__detail col-xl-7 col-lg-7 col-md-7 col-12">
                            <span class="food-item__name d-block justify-content-center align-items-center text-center">
                                COMBO PARTY 2 NGĂN - VOL
                            </span>
                            <span class="food-item__des d-block">
                                4 Coke 22oz - V + 2 POPCORN 64OZ PM + CARAMEN
                            </span>
                            <span class="food-item__price d-block"> 259.000đ </span>
                            <div class="food-item__btn d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="combo-item col-xl-4 col-lg-4 col-md-4 col-4">
                    <div class="food-item">
                        <div class="food-item__image-container col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                            <img src="../assets/img/COMBO-COUPLE_1_.png" alt="" class="food-item__img" />
                        </div>

                        <div class="food-item__detail col-xl-7 col-lg-7 col-md-7 col-12">
                            <span class="food-item__name d-block justify-content-center align-items-center text-center">
                                COMBO PARTY 2 NGĂN - VOL
                            </span>
                            <span class="food-item__des d-block">
                                4 Coke 22oz - V + 2 POPCORN 64OZ PM + CARAMEN
                            </span>
                            <span class="food-item__price d-block"> 259.000đ </span>
                            <div class="food-item__btn d-flex mt-3 mb-2 justify-content-center align-items-center">
                                <div class="count-btn count-minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="count-number mx-2">0</div>
                                <div class="count-btn count-plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticket -->
    <div class="ticket container-fluid pt-3 pb-3 mt-5">
        <div class="row ticket-details">
            <span class="ticket-title fs-4"> MAI (T18) </span>
            <div class="row ticket-theater__detail d-inline-block">
                <span class="ticket-theater__name position-relative" id="id1">
                </span>
                <span class="ticket-theater__address" id="id2"> </span>
            </div>

            <div class="row ticket-detail">
                <div class="col-6 ps-3" id="ticket-rs-wrapper">
                    <div class="ticket-type">
                        <span class="ticket-type__number">2</span>
                        <span class="ticket-type__title">Người Lớn(Đơn)</span>
                    </div>
                    <div class="ticket-type">
                        <span class="ticket-type__number">2</span>
                        <span class="ticket-type__title">HSSV - Người Cao Tuổi</span>
                    </div>
                    <div class="ticket-type">
                        <span class="ticket-type__number">1</span>
                        <span class="ticket-type__title">Người Lớn(Đôi)</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="room">
                        <span class="txt">Phòng chiếu:</span>
                        <span class="room-tilte me-1">01</span>
                        <span class="time-tilte">17:00</span>
                    </div>
                    <div class="chair">
                        <span class="txt">Ghế: </span>
                        <span class="chair-tilte">K01</span>
                        <span class="chair-tilte">K02</span>
                        <span class="chair-tilte">K03</span>
                        <span class="chair-tilte">K04</span>
                        <span class="chair-tilte">K05</span>
                    </div>
                    <div class="combo">
                        <span class="txt">Combo: </span>
                        <span class="combo-title">1 Combo Solo 2 Ngăn, </span>
                        <span class="combo-title">2 Combo Party 2 Ngăn, </span>
                        <span class="combo-title">1 Combo Couple 2 Ngăn</span>
                    </div>
                </div>
            </div>
            <div class="row text-warning d-flex mt-2">
                <div class="col-1"></div>
                <div class="bill-time col-2 justify-content-center align-items-center">
                    <span class="d-block">Thời gian giữ vé: </span>
                    <span class="bill-time-countdown fs-4" id="countdown"> </span>
                </div>
                <div class="col-3"></div>
                <div class="bill-detail col-6">
                    <div class="ticket-price fs-5">
                        <span class="ticket-price__title"> Tạm tính: </span>
                        <span class="ticket-price__number"> 1.121.000đ </span>
                    </div>
                    <button class="btn-to-pay mt-3 align-items-center text-center justify-content-center">
                        THANH TOÁN
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
script("https://code.jquery.com/jquery-3.7.1.min.js");
script("/public/chi_tiet_phim/test.js");
require ('partials/footer.php'); ?>