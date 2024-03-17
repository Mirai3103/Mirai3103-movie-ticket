<?php
title("Tiến hành thanh toán");
require('partials/head.php');
script(("/public/js/validation.js"));
script("/public/js/alpine.js")
?>




<main class="2xl:max-w-7xl xl:max-w-[78rem] lg:max-w-[63rem]  mx-auto mt-10 md:max-w-2xl sm:max-w-[38rem]  px-4 sm:px-1" x-data="{
    step: 1,
}">
    <div class='flex  gap-x-4 mb-8 '>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-on:click="if (i < step) { step = i }" x-bind:class="step >= i ? 'bg-[#FFE7AA]' : ''" class="w-12 font-bold text-2xl h-12 flex items-center justify-center rounded-full  border border-black" x-text="i">
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