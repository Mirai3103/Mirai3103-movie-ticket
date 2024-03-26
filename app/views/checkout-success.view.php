<?php
title("Tiến hành thanh toán");
require('partials/head.php');
?>




<main class="2xl:tw-max-w-7xl xl:tw-max-w-[78rem] tw-mx-auto tw-mt-10  tw-px-1" x-data="{
    step: 3,
}">
    <div class='tw-flex tw-gap-x-4 tw-mb-8'>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-bind:class="step >= i ? 'tw-bg-[#FFE7AA]' : ''" class="tw-w-12 tw-font-bold tw-text-2xl tw-h-12 tw-flex tw-items-center tw-justify-center tw-rounded-full  tw-border tw-border-black" x-text="i">
            </span>
        </template>
    </div>
    <div class="tw-max-w-4xl tw-mx-auto tw-mb-4 tw-font-bold tw-text-2xl">
        <h2 class='tw-mx-auto tw-text-center'>
            CHÚC MỪNG BẠN ĐÃ THANH TOÁN THÀNH CÔNG BẰNG XX
        </h2>
    </div>

    <div class="tw-max-w-4xl tw-mx-auto">
        <div class='tw-bg-[#045174]  tw-p-4 min-h-28 tw-border-2  tw-text-white tw-border-[#FFC700]'>
            <div class="tw-p-2 tw-flex tw-flex-col tw-gap-y-1 tw-text-sm md:tw-text-base">
                <div class="tw-flex tw-gap-x-4 md:tw-gap-x-5">
                    <div class='basis-1/2 shrink-0'>
                        <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg" alt="logo" class="tw-max-w-full tw-aspect-[3/5] md:tw-aspect-[16/12] tw-object-cover">
                    </div>
                    <div class='tw-grow tw-flex tw-flex-col tw-gap-y-1'>
                        <h3 class="tw-uppercase tw-text-[#E48C44] tw-text-base md:tw-text-3xl tw-font-bold">
                            Tên phim: HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                        </h3>
                        <h4 class='tw-text-base md:tw-text-2xl'>
                            Tên rạp: Cinestar Quốc Thanh
                        </h4>
                        <h4 class=' tw-italic tw-text-base md:tw-text-2xl'>
                            Địa chỉ: 271 Nguyễn Trãi, Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh
                        </h4>

                    </div>
                </div>
                <div class="tw-uppercase tw-gap-4 tw-flex tw-mt-2 md:tw-mt-5 tw-text-base  md:tw-text-3xl tw-text-[#E48C44]  tw-font-bold">
                    <span>
                        Mã Vé (QR)
                    </span>
                    <div>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?color=000000&bgcolor=045174&data=dgfgdgdgfdgdfgfdgdfg%0A&qzone=1&margin=0&size=100x100&ecc=L" alt="">
                    </div>
                </div>

                <h4 class='tw-mt-5'>
                    Thời gian
                </h4>
                <div class='tw-flex tw-flex-wrap tw-gap-x-4'>
                    <div class='tw-basis-1/4'>Phòng chiếu</div>
                    <div class='tw-basis-1/4'>Số vé</div>
                    <div class='tw-basis-1/4'>Loại vé</div>
                    <div class='tw-basis-1/4'>Phòng chiếu</div>
                    <div class='tw-basis-1/4'>Số vé</div>
                    <div class='tw-basis-1/4'>Loại vé</div>
                </div>
                <h4>
                    Ghế
                </h4>
                <h4>
                    Bắp nước
                </h4>
            </div>
            <div class=' tw-border-b-4 tw-my-4 tw-border-white tw-border-dashed'></div>
            <div class='tw-flex tw-p-4 tw-text-base md:tw-text-2xl tw-justify-between'>
                <h2>
                    Số tiền cần thanh toán
                </h2>
                <div class='tw-text-primary'>
                    100.000đ
                </div>
            </div>
            <div class='tw-flex tw-px-4  tw-text-base md:tw-text-2xl tw-justify-between'>
                <h2>
                    Giảm giá
                </h2>
                <div class='tw-text-primary'>
                    100.000đ
                </div>
            </div>
            <div class='tw-flex tw-px-4 tw-py-4 tw-text-xl md:tw-text-3xl tw-justify-between'>
                <h2>
                    Tổng thanh toán
                </h2>
                <div class='tw-text-primary'>
                    100.000đ
                </div>
            </div>
        </div>
    </div>



</main>
<?php require('partials/footer.php'); ?>