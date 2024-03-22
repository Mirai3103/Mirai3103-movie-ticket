    <div class='tw-flex tw-gap-x-14 tw-flex-col lg:tw-flex-row tw-text-base  sm:tw-text-xl tw-gap-y-8' x-show="step === 1">
        <div class='tw-basis-2/5 lg:tw-shrink-0  tw-gap-4 tw-flex tw-flex-col tw-justify-center tw-text-xl'>
            <div>
                <label for="name" class="tw-block  tw-font-bold  tw-text-gray-700">Họ và tên</label>
                <input x-on:focus="errors.name = ''" x-model="data.name" type="text" name="name" id="name" class="tw-mt-1  tw-px-4 tw-w-full tw-py-2 tw-border-[3px]  hover:tw-border-[#0c131d]  tw-border-[#1B2D44]" placeholder="Họ và tên">
                <span x-text="errors.name" class="error_message"></span>
            </div>
            <div>
                <label for="phone" class="tw-block  tw-font-bold  tw-text-gray-700">Số điện thoại</label>
                <input x-on:focus="errors.phone = ''" x-model="data.phone" type="tel" name="phone" id="phone" class="tw-mt-1 tw-px-4 tw-w-full tw-py-2 tw-border-[3px]  hover:tw-border-[#0c131d]  tw-border-[#1B2D44]" placeholder="Số điện thoại">
                <span x-text="errors.phone" class="error_message"></span>
            </div>
            <div>
                <label for="email" class="tw-block  tw-font-bold  tw-text-gray-700">Email</label>
                <input x-on:focus="errors.email = ''" x-model="data.email" type="text" name="email" id="email" class="tw-mt-1 tw-px-4 tw-w-full tw-py-2 tw-border-[3px]  hover:tw-border-[#0c131d]  tw-border-[#1B2D44]" placeholder="Email">
                <span x-text="errors.email" class="error_message"></span>
            </div>
            <div class="tw-flex tw-justify-center">
                <button x-on:click="
                if (validate()) {
                    step = 2
                };  
                console.log(errors)
                " class=' tw-px-12 tw-py-2 tw-flex tw-justify-center tw-items-center tw-bg-[#14244B] tw-text-[#FFC700] tw-rounded-md'>
                    Tiếp tục
                </button>
            </div>
        </div>
        <div class="tw-grow">
            <div class='tw-bg-[#045174]  tw-p-6 min-h-28 tw-border-2  tw-text-white tw-border-[#FFC700]'>
                <div class="tw-p-1 tw-flex tw-flex-col tw-gap-y-1">
                    <h3 class="tw-uppercase tw-text-[#E48C44] tw-text-2xl sm:tw-text-3xl tw-font-bold">
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
                <div class='tw-flex tw-p-4 tw-text-2xl sm:tw-text-3xl tw-justify-between'>
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