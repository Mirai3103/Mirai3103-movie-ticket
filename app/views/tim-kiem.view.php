<?php
title("Kết quả tìm kiếm");
require ('partials/head.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/css/datepicker-bs5.min.css">
<style>
:root {}

.header2 {
    background-color: rgb(4, 81, 116);
}

.heading {
    border: solid rgb(243, 235, 215);
    border-width: 5px 0 5px 0;
}

.product {}

.movie-item {
    width: 25%;
}

img {
    object-fit: cover;
    max-width: 100%;
}

.button {
    color: rgba(228, 140, 68);
    background-color: rgb(27, 45, 68);
}
</style>
<div x-data="{
    data: [],
    page: 1,
    limit: 10,
    total: 0,
    isLoading: false,
    isShowFilter: false,
    onSearch: async function(){
            
          const keyword = $refs.keywordInput.value;
                const theloais = Array.from(document.querySelectorAll('.theloai:checked')).map(e => e.value);

                const rapchieus = Array.from(document.querySelectorAll('.rapchieu:checked')).map(e => e.value);

                const showFrom = $refs.showFromInput.value;
                const showTo = $refs.showToInput.value;
                const durrationFrom = $refs.durrationFromInput.value;
                const durrationTo = $refs.durrationToInput.value;
                const sortBy = $refs.sortByInput.value;
                const sort = $refs.sortInput.value;
                const queryParam = {
                    'tu-khoa': keyword,
                    'the-loais': theloais,
                    'raps': rapchieus,
                    'thoi-gian-tu': showFrom,
                    'thoi-gian-den': showTo,
                    'thoi-luong-tu': durrationFrom,
                    'thoi-luong-den': durrationTo,
                    'sap-xep': sortBy,
                    'thu-tu': sort
                }
                const query = window.queryString.stringify(queryParam);
                window.history.pushState({}, '', '?' + query);
                axios.post('/api/phim/tim-kiem-nang-cao', queryParam).then(res => {
                    console.log(res.data);
                }).catch(err => {
                    console.log(err);
                });
    },
}" x-init="
console.log('init');
const query = window.queryString.parse(window.location.search);
$refs.keywordInput.value = query['tu-khoa'] ?? '';
const theloais = query['the-loais'] ?? [];
let elements = document.querySelectorAll('.theloai');
elements.forEach(e => {
    if (theloais.includes(e.value)) {
        e.checked = true;
    }
});
const rapchieus = query['raps'] ?? [];
elements = document.querySelectorAll('.rapchieu');
elements.forEach(e => {
    if (rapchieus.includes(e.value)) {
        e.checked = true;
    }
});
$refs.showFromInput.value = query['thoi-gian-tu'] ?? '';
$refs.showToInput.value = query['thoi-gian-den'] ?? '';
$refs.durrationFromInput.value = parseInt(query['thoi-luong-tu']) || '';
$refs.durrationToInput.value = parseInt(query['thoi-luong-den']) || '';

$refs.sortByInput.value = query['sap-xep'] ?? 'Phim.TenPhim';
$refs.sortInput.value = query['thu-tu'] ?? 'ASC';

 $nextTick(() => {
        onSearch();
 });
">
    <div class="header2 container-fluid ">
        <div class="row justify-content-center mt-3 heading">
            <div class="col-auto">
                <h1
                    class="text-center text-uppercase fw-medium   tw-font-semibold tw-text-2xl  tw-py-2 tw-text-white m-1">
                    Kết quả tìm kiếm
                </h1>
            </div>
        </div>

    </div>
    <div class='container'>
        <div class="tw-collapse tw-collapse-arrow !tw-overflow-visible  tw-bg-white tw-rounded-md tw-shadow-sm">
            <input type="checkbox" x-model="isShowFilter" />
            <div class="tw-collapse-title tw-text-xl tw-font-medium">
                Bộ lọc
            </div>
            <div class="tw-collapse-content" style="visibility: hidden;"
                :style="isShowFilter ? 'visibility: visible; opacity: 1;' : 'visibility: hidden; opacity: 0;'">
                <!-- $keyword = $queryInput['tu-khoa'] ?? '';
        $genre = $queryInput['the-loai'] ?? '';
        $timeRangeFrom = $queryInput['thoi-gian-tu'] ?? '';
        $timeRangeTo = $queryInput['thoi-gian-den'] ?? '';
        $durationFrom = $queryInput['thoi-luong-tu'] ?? '0';
        $durationTo = $queryInput['thoi-luong-den'] ?? '0';
        $format = $queryInput['dinh-dang'] ?? '';
        $cinema = $queryInput['rap'] ?? '';
        $sort = $queryInput['sap-xep'] ?? '';
        $sortBy = $queryInput['theo'] ?? '';
        $page = $queryInput['page'] ?? 1;
        $limit = $queryInput['limit'] ?? 20;
        $sql = "Select Phim.MaPhim from Phim ";
        $sql .= "LEFT JOIN CT_Phim_TheLoai ON CT_Phim_TheLoai.MaPhim = phim.MaPhim ";
        $sql .= "WHERE 1=1 "; -->
                <div class="tw-collapse tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Từ khóa
                    </div>
                    <div class="tw-collapse-content">
                        <input x-ref="keywordInput" type="text" class="tw-input tw-input-bordered tw-w-full"
                            placeholder="Nhập từ khóa">
                    </div>
                </div>
                <div
                    class="tw-collapse !tw-overflow-visible  tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Được chiếu ở rạp
                    </div>
                    <div class="tw-collapse-content tw-relative">
                        <div class='tw-relative'>
                            <ul
                                class="tw-menu tw-max-h-60 !tw-flex-nowrap tw-overflow-x-scroll tw-bg-base-200   tw-w-full tw-rounded-box">
                                <?php foreach ($cinemas as $cinema): ?>
                                <li>
                                    <label role="button" class='flex tw-items-center tw-gap-x-2'>
                                        <input type="checkbox" value="<?= $cinema['MaRapChieu'] ?>"
                                            class="tw-checkbox tw-checkbox-sm rapchieu" />
                                        <span class='tw-truncate'>
                                            <?= $cinema['TenRapChieu'] ?>
                                        </span>
                                    </label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <div
                    class="tw-collapse !tw-overflow-visible   tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Có các thể loại
                    </div>
                    <div class="tw-collapse-content tw-relative">
                        <div class='tw-relative'>
                            <ul
                                class="tw-menu tw-max-h-60 !tw-flex-nowrap tw-overflow-x-scroll tw-bg-base-200   tw-w-full tw-rounded-box">
                                <?php
                                uasort($categories, function ($a, $b) {
                                    return $a['TenTheLoai'] <=> $b['TenTheLoai'];
                                });
                                ?>
                                <?php foreach ($categories as $category): ?>
                                <li>
                                    <label role="button" class='flex tw-items-center tw-gap-x-2'>
                                        <input type="checkbox" value="<?= $category['MaTheLoai'] ?>"
                                            class="tw-checkbox tw-checkbox-sm theloai" />
                                        <span class='tw-truncate'>
                                            <?= $category['TenTheLoai'] ?>
                                        </span>
                                    </label>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <div
                    class="tw-collapse !tw-overflow-visible tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Khoảng thời gian chiếu
                    </div>
                    <div class="tw-collapse-content" x-init="
                const elem = document.querySelector('#show-from');
                 datepickerFrom = new Datepicker(elem, {
                    language: 'vi',
                    minDate: new Date(),
                    format: 'dd/mm/yyyy',
                }); 
                const elem2 = document.querySelector('#show-to');
                datepickerTo = new Datepicker(elem2, {
                    language: 'vi',
                    minDate: new Date(),
                    format: 'dd/mm/yyyy',
                });
                ">
                        <div class="tw-flex tw-gap-x-4 tw-flex-wrap">
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-xs">
                                <div class="tw-label">
                                    <span class="tw-label-text">Từ ngày</span>
                                </div>
                                <input x-ref="showFromInput" readonly id="show-from" type="text" placeholder="Type here"
                                    class="tw-input tw-input-bordered tw-w-full tw-max-w-xs" />
                            </label>
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-xs">
                                <div class="tw-label">
                                    <span class="tw-label-text">Đến ngày
                                    </span>
                                </div>
                                <input x-ref="showToInput" readonly id="show-to" type="text" placeholder="Type here"
                                    class="tw-input tw-input-bordered tw-w-full tw-max-w-xs" />
                            </label>
                        </div>

                    </div>
                </div>
                <div class="tw-collapse tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Thời lượng chiếu (phút)
                    </div>
                    <div class="tw-collapse-content">
                        <div class="tw-flex tw-gap-x-4 tw-flex-wrap">
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-xs">
                                <div class="tw-label">
                                    <span class="tw-label-text">Thời lượng tối thiểu</span>
                                </div>
                                <input x-ref="durrationFromInput" id="durration-from" type="text"
                                    placeholder="Type here" class="tw-input tw-input-bordered tw-w-full tw-max-w-xs" />
                            </label>
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-xs">
                                <div class="tw-label">
                                    <span class="tw-label-text">Thời lượng tối đa
                                    </span>
                                </div>
                                <input x-ref="durrationToInput" id="show-to" type="text" placeholder="Type here"
                                    class="tw-input tw-input-bordered tw-w-full tw-max-w-xs" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="tw-collapse tw-collapse-arrow tw-border-b  tw-bg-white tw-rounded-md tw-shadow-sm">
                    <input type="checkbox" />
                    <div class="tw-collapse-title tw-text-xl tw-font-medium">
                        Sắp xếp kết quả
                    </div>
                    <div class="tw-collapse-content">
                        <div class="tw-flex tw-gap-x-4 tw-flex-wrap">
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-xs">
                                <div class="tw-label">
                                    <span class="tw-label-text">
                                        Sắp xếp theo
                                    </span>
                                </div>
                                <select x-ref="sortByInput" class="tw-select tw-select-bordered" value="Phim.TenPhim">

                                    <option value="Phim.TenPhim">Tên phim</option>
                                    <option value="Phim.ThoiLuong">Thời lượng</option>
                                    <option value="Phim.NgayPhatHanh">Ngày phát hành</option>
                                </select>

                            </label>
                            <label class="tw-form-control tw-border-none tw-w-full tw-max-w-36">
                                <div class="tw-label">
                                    <span class="tw-label-text">
                                        Thứ tự
                                    </span>
                                </div>
                                <select class="tw-select tw-select-bordered">
                                    <option x-ref="sortInput" value="ASC">Tăng dần</option>
                                    <option value="DESC">Giảm dần</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class='tw-flex tw-justify-center tw-pt-8 tw-pb-3 tw-gap-2 '>
                    <button class="tw-btn tw-w-full tw-max-w-xs">
                        Xoá bộ lọc
                    </button>
                    <button x-on:click="onSearch" class="tw-btn tw-text-white tw-btn-primary tw-w-full tw-max-w-xs">
                        Áp dụng
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="product container my-lg-4 " x-data="{}">
        <div class="row tw-gap-y-4 ">
            <template x-if="isLoading">
                <div class="col-12 text-center tw-justify-center tw-items-center tw-py-12">
                    <span class="loading loading-dots loading-lg"></span>
                </div>
            </template>
            <template x-if="!isLoading && data.length == 0">
                <div class="col-12 text-center tw-justify-center tw-items-center tw-py-12">
                    <span class="tw-text-xl tw-font-semibold">Không có kết quả nào</span>
                </div>
            </template>
            <template x-for="item in data" :key="item.MaPhim">
                <div class="col-xl-3 gx-5 mb-4 mb-xl-0 col-md-4 col-6 col-lg-4 ">
                    <div class="tw-rounded-md  tw-pb-2">
                        <div class="app-carousel-movie-item__img">
                            <div class="app-carousel-movie-item__info--hover text-white p-4 text-start fs-5">
                                <h2 class="fs-4 fw-bold" x-text="item.TenPhim"></h2>

                                <div class="mt-5">
                                    <div>
                                        <i class="me-3 fa-solid fa-layer-group"></i>
                                        <span>
                                            ${movie.DinhDang}</span>
                                    </div>

                                    <div>
                                        <i class="me-3 mt-2 fa-solid fa-clock"></i>
                                        <span>${movie.ThoiLuong}'</span>
                                    </div>

                                    <div>
                                        <i class="fa-solid fa-closed-captioning  me-3 mt-2"></i>
                                        <span>${movie.NgonNgu}</span>
                                    </div>


                                </div>
                            </div>
                            <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <h4 class="mt-3 app-carousel-movie-item__title">${movie.TenPhim}</h4>
                        <div class="d-flex justify-content-around mt-4 align-items-center">
                            <a style="color: var(--color1)" href=${movie.Trailer}>
                                <i class="fa-solid fa-star"></i>
                                <span>Xem Trailer</span>
                            </a>
                            <a style="margin-right: 4px;" class="login-item btn-login btn" href="/phim/${movie.MaPhim}">
                                <i class="fa-solid fa-star"></i>
                                <span class="ms-2">Đặt vé</span>
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
<script>
window.addEventListener('DOMContentLoaded', (event) => {
    console.log('DOM fully loaded and parsed');
});
</script>
<script type="module">
import queryString from 'https://cdn.jsdelivr.net/npm/query-string@9.0.0/+esm'
window.queryString = queryString
</script>

<?php
script("https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/datepicker.min.js");
script("https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.3.4/dist/js/locales/vi.js");
require ('partials/footer.php'); ?>