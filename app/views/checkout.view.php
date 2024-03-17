<?php
title("Tiến hành thanh toán");
require('partials/head.php');
script("/public/js/alpine.js")
?>




<main class="2xl:max-w-7xl xl:max-w-[78rem] lg:max-w-[63rem]  mx-auto mt-10 md:max-w-2xl sm:max-w-[38rem]  px-4 sm:px-1" x-data="{
    step: 1,
    data: {
        name: '',
        phone: '',
        email: '',
        discount: '',
        payment_method: '',
    },
    errors: {
        name: '',
        phone: '',
        email: '',
        discount: '',
        payment_method: '',
        general: '',
    },
    validate_step1() {
        this.errors.name = this.data.name ? '' : 'Vui lòng nhập họ và tên';
        this.errors.phone = this.data.phone ? '' : 'Vui lòng nhập số điện thoại';
        this.errors.email = this.data.email ? '' : 'Vui lòng nhập email';
        if (this.errors.name || this.errors.phone || this.errors.email) {
            return false;
        }
        return true;
    },
}">
    <div class='flex  gap-x-4 mb-8 '>
        <template x-for="i in [1, 2, 3]" :key="i">
            <span x-on:click="if (i < step) { step = i }" x-bind:class="step >= i ? 'bg-[#FFE7AA]' : ''" class="w-12 font-bold text-2xl h-12 flex items-center justify-center rounded-full  border border-black" x-text="i">
            </span>
        </template>
    </div>

    <div id="step-content">
        <?php
        include_once('partials/checkout.step2.php');
        ?>
        <?php include_once('partials/checkout.step1.php'); ?>

    </div>
</main>
<?php require('partials/footer.php'); ?>