<footer class='tw-bg-dark-blue tw-mt-20 tw-p-10 md:tw-text-xl tw-text-white' x-data="{}">
    <div class='2xl:tw-max-w-7xl xl:tw-max-w-[78rem] tw-mx-auto'>
        <div class="tw-flex tw-items-center sm:tw-justify-around tw-flex-col sm:tw-flex-row">
            <div class=''>
                <div class='sm:tw-flex tw-gap-x-4 tw-ml-4 tw-hidden'>
                    <template x-for="i in [1,2,3]" :key="i">
                        <span class="tw-w-10 tw-bg-[#D9D9D9] tw-rounded-full tw-h-10">
                        </span>
                    </template>
                </div>
                <img src="/public/images/logo.svg" class="tw-h-44 sm:tw--ml-6" alt="">
            </div>
            <div class="sm:tw-py-12">
                <h3 class="tw-text-2xl tw-font-bold">
                    Tài khoản
                </h3>
                <ul class='tw-text-base tw-hidden sm:tw-flex tw-flex-col tw-gap-y-2 tw-mt-2'>
                    <li>
                        <a>
                            Đăng nhập
                        </a>
                    </li>
                    <li>
                        <a>
                            Đăng ký
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sm:tw-py-12">
                <h3 class="tw-text-2xl tw-font-bold">
                    Xem phim
                </h3>
                <ul class='tw-text-base tw-hidden sm:tw-flex tw-flex-col tw-gap-y-2 tw-mt-2'>
                    <li>
                        <a>
                            Phim sắp chiếu
                        </a>
                    </li>
                    <li>
                        <a>
                            Phim đang chiếu
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sm:tw-hidden">
                <h3 class="tw-text-2xl tw-font-bold">
                    Giới thiệu
                </h3>
            </div>
            <div class="sm:tw-hidden">
                <h3 class="tw-text-2xl tw-font-bold">
                    Liên hệ
                </h3>
            </div>
            <div class='sm:tw-hidden tw-flex tw-gap-x-4 tw-py-6 '>
                <template x-for="i in [1,2,3]" :key="i">
                    <span class="tw-w-10 tw-bg-[#D9D9D9] tw-rounded-full tw-h-10">
                    </span>
                </template>
            </div>
        </div>
    </div>
</footer>
<?php


global $scripts;
foreach ($scripts as $script) {
    echo "<script src='{$script}'></script>";
}
?>
<script src="/public/js/alpine.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>