<?php
title("Tiến hành thanh toán");
require('partials/head.php');
script("/public/js/alpine.js")
?>




<main class="2xl:max-w-7xl xl:max-w-[78rem] mx-auto mt-10  px-1" x-data="{
    step: 1,
}">
    <div class='flex gap-x-4 mb-8'>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-bind:class="step >= i ? 'bg-[#FFE7AA]' : ''" class="w-12 font-bold text-2xl h-12 flex items-center justify-center rounded-full  border border-black" x-text="i">
            </span>
        </template>
    </div>

    <div class='flex gap-x-14 text-xl'>
        <div class='basis-2/5  gap-4 flex flex-col justify-center text-xl'>
            <div>
                <label for="name" class="block  font-bold  text-gray-700">Họ và tên</label>
                <input type="text" name="name" id="name" class="mt-1  px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Họ và tên">
            </div>
            <div>
                <label for="phone" class="block  font-bold  text-gray-700">Số điện thoại</label>
                <input type="text" name="phone" id="phone" class="mt-1 px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Số điện thoại">
            </div>
            <div>
                <label for="email" class="block  font-bold  text-gray-700">Email</label>
                <input type="text" name="email" id="email" class="mt-1 px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Email">
            </div>
            <div class="flex justify-center">
                <button class=' px-12 py-2 flex justify-center items-center bg-[#14244B] text-[#FFC700] rounded-md'>
                    Tiếp tục
                </button>
            </div>
        </div>
        <div class="grow">
            <div class='bg-[#045174]  p-6 min-h-28 border-2  text-white border-[#FFC700]'>
                <div class="p-4 flex flex-col gap-y-1">
                    <h3 class="uppercase text-[#E48C44] text-3xl font-bold">
                        Tên phim
                    </h3>
                    <h4>
                        Tên rạp
                    </h4>
                    <h4>
                        Địa chỉ
                    </h4>
                    <h4>
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
                <div class='flex p-4 text-3xl justify-between'>
                    <h2>
                        Số tiền cần thanh toán
                    </h2>
                    <div>
                        100.000đ
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('partials/footer.php'); ?>