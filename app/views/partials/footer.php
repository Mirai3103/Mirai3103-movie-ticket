<footer class='bg-dark-blue mt-20 p-10 md:text-xl text-white' x-data="{}">
    <div class=' 2xl:max-w-7xl xl:max-w-[78rem] mx-auto'>
        <div class="flex  items-center sm:justify-around flex-col sm:flex-row">
            <div class=''>
                <div class='sm:flex gap-x-4 ml-4 hidden'>
                    <template x-for="i in [1,2,3]" :key="i">
                        <span class="w-10 bg-[#D9D9D9] rounded-full h-10">
                        </span>
                    </template>
                </div>
                <img src="/public/images/logo.svg" class="h-44 sm:-ml-6" alt="">
            </div>
            <div class="sm:py-12">
                <h3 class="text-2xl font-bold">
                    Tài khoản

                </h3>
                <ul class='text-base hidden sm:flex flex-col gap-y-2 mt-2'>
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
            <div class="sm:py-12">
                <h3 class="text-2xl font-bold">
                    Xem phim
                </h3>
                <ul class='text-base hidden sm:flex flex-col gap-y-2 mt-2'>
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
            <div class="sm:hidden">
                <h3 class="text-2xl font-bold">
                    Giới thiệu

                </h3>
            </div>
            <div class="sm:hidden">
                <h3 class="text-2xl font-bold">
                    Liên hệ

                </h3>
            </div>
            <div class='sm:hidden flex gap-x-4  py-6 '>
                <template x-for="i in [1,2,3]" :key="i">
                    <span class="w-10 bg-[#D9D9D9] rounded-full h-10">
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
</body>

</html>