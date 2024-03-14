<?php
title("Tiến hành thanh toán");
require('partials/head.php');
script("/public/js/alpine.js")
?>




<main class="2xl:max-w-7xl xl:max-w-[78rem] mx-auto mt-10  px-1" x-data="{
    step: 3,
}">
    <div class='flex gap-x-4 mb-8'>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-bind:class="step >= i ? 'bg-[#FFE7AA]' : ''" class="w-12 font-bold text-2xl h-12 flex items-center justify-center rounded-full  border border-black" x-text="i">
            </span>
        </template>
    </div>
    <div class="max-w-4xl mx-auto mb-4 font-bold text-2xl">
        <h2 class='mx-auto text-center'>
            CHÚC MỪNG BẠN ĐÃ THANH TOÁN THÀNH CÔNG BẰNG XX
        </h2>
    </div>

    <div class="max-w-4xl mx-auto">
        <div class='bg-[#045174]  p-4 min-h-28 border-2  text-white border-[#FFC700]'>
            <div class="p-2 flex flex-col gap-y-1 text-sm md:text-base">
                <div class="flex gap-x-4 md:gap-x-5">
                    <div class='basis-1/2 shrink-0'>
                        <img src="https://api-website.cinestar.com.vn/media/wysiwyg/Posters/03-2024/hoi-chung-tuoi-thanh-xuan.jpg" alt="logo" class="max-w-full aspect-[3/5] md:aspect-[16/12] object-cover">
                    </div>
                    <div class='grow flex flex-col gap-y-1'>
                        <h3 class="uppercase text-[#E48C44] text-base md:text-3xl font-bold">
                            Tên phim: HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
                        </h3>
                        <h4>
                            Tên rạp: Cinestar Quốc Thanh
                        </h4>
                        <h4 class='italic'>
                            Địa chỉ: 271 Nguyễn Trãi, Phường Nguyễn Cư Trinh, Quận 1, Thành Phố Hồ Chí Minh
                        </h4>
                        <div class="uppercase gap-4 flex mt-2 md:mt-5 text-base  md:text-3xl text-[#E48C44]  font-bold">
                            <span>
                                Mã Vé (QR)
                            </span>
                            <div>
                                <img src="https://api.qrserver.com/v1/create-qr-code/?color=000000&bgcolor=045174&data=dgfgdgdgfdgdfgfdgdfg%0A&qzone=1&margin=0&size=100x100&ecc=L" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <h4 class='mt-5'>
                    Thời gian
                </h4>
                <div class='flex flex-wrap gap-x-4'>
                    <div class='basis-1/4'>Phòng chiếu</div>
                    <div class='basis-1/4'>Số vé</div>
                    <div class='basis-1/4'>Loại vé</div>
                    <div class='basis-1/4'>Phòng chiếu</div>
                    <div class='basis-1/4'>Số vé</div>
                    <div class='basis-1/4'>Loại vé</div>
                </div>
                <h4>
                    Ghế
                </h4>
                <h4>
                    Bắp nước
                </h4>
            </div>
            <div class=' border-b-4 my-4 border-white border-dashed'></div>
            <div class='flex p-4 text-xl md:text-3xl justify-between'>
                <h2>
                    Số tiền cần thanh toán
                </h2>
                <div class='text-primary'>
                    100.000đ
                </div>
            </div>
            <div class='flex px-4  text-base md:text-2xl justify-between'>
                <h2>
                    Giảm giá
                </h2>
                <div class='text-primary'>
                    100.000đ
                </div>
            </div>
            <div class='flex px-4 py-4 text-xl md:text-3xl justify-between'>
                <h2>
                    Tổng thanh toán
                </h2>
                <div class='text-primary'>
                    100.000đ
                </div>
            </div>
        </div>
    </div>



</main>
<?php require('partials/footer.php'); ?>