    <div class='flex gap-x-14 flex-col lg:flex-row text-base  sm:text-xl gap-y-8' x-show="step === 1">
        <div class='basis-2/5 lg:shrink-0  gap-4 flex flex-col justify-center text-xl'>
            <div>
                <label for="name" class="block  font-bold  text-gray-700">Họ và tên</label>
                <input x-on:focus="errors.name = ''" x-model="data.name" type="text" name="name" id="name" class="mt-1  px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Họ và tên">
                <span x-text="errors.name" class="error_message"></span>
            </div>
            <div>
                <label for="phone" class="block  font-bold  text-gray-700">Số điện thoại</label>
                <input x-on:focus="errors.phone = ''" x-model="data.phone" type="tel" name="phone" id="phone" class="mt-1 px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Số điện thoại">
                <span x-text="errors.phone" class="error_message"></span>
            </div>
            <div>
                <label for="email" class="block  font-bold  text-gray-700">Email</label>
                <input x-on:focus="errors.email = ''" x-model="data.email" type="text" name="email" id="email" class="mt-1 px-4 w-full py-2 border-[3px]  hover:border-[#0c131d]  border-[#1B2D44]" placeholder="Email">
                <span x-text="errors.email" class="error_message"></span>
            </div>
            <div class="flex justify-center">
                <button x-on:click="
                if (validate()) {
                    step = 2
                };  
                console.log(errors)
                " class=' px-12 py-2 flex justify-center items-center bg-[#14244B] text-[#FFC700] rounded-md'>
                    Tiếp tục
                </button>
            </div>
        </div>
        <div class="grow">
            <div class='bg-[#045174]  p-6 min-h-28 border-2  text-white border-[#FFC700]'>
                <div class="p-1 flex flex-col gap-y-1">
                    <h3 class="uppercase text-[#E48C44] text-2xl sm:text-3xl font-bold">
                        Tên phim: HỘI CHỨNG TUỔI THANH XUÂN - CÔ BÉ ĐEO CẶP SÁCH
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
                <div class='flex p-4 text-2xl sm:text-3xl justify-between'>
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