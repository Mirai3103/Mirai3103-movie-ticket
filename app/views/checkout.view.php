<?php
title("Tiến hành thanh toán");
require('partials/head.php');
script(("/public/js/validation.js"));
?>





<main class="2xl:tw-max-w-7xl xl:tw-max-w-[78rem] lg:tw-max-w-[63rem]  tw-mx-auto tw-mt-10 md:tw-max-w-2xl sm:tw-max-w-[38rem]  tw-px-4 sm:tw-px-1" x-data="{
    step: 1,
}">
    <div class='tw-flex  tw-gap-x-4 tw-mb-8 '>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-on:click="if (i < step) { step = i }" x-bind:class="step >= i ? 'tw-bg-[#FFE7AA]' : ''" class="tw-w-12 tw-font-bold tw-text-2xl tw-h-12 tw-flex tw-items-center tw-justify-center tw-rounded-full  tw-border tw-border-black" x-text="i">
            </span>
        </template>
    </div>

    <div id="step-content" x-data="formValidator({
        name:{
            required: {
                message: 'Họ và tên không được để trống'
            }
        },
        phone:{
            pattern: {
                value: /^((\+84|0)[2|3|5|7|8|9])+([0-9]{8})\b/,
                message: 'Số điện thoại không hợp lệ'
            }
        },
        email:{
            pattern: {
                value: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
                message: 'Email không hợp lệ'
            }
        }
    })">
        <?php
        include_once('partials/checkout.step2.php');
        ?>
        <?php include_once('partials/checkout.step1.php'); ?>

    </div>
</main>

<?php require('partials/footer.php'); ?>