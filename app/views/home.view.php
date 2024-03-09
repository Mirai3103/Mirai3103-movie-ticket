<?php
title("Dday la homr");
require('partials/head.php'); ?>



<h1 Đây là ví dụ </h1>
    <div class=" grid grid-cols-2  gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
        <?php foreach ($phims as $phim) : ?>
            <div class=" max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="<?= $phim->HinhAnh ?>" alt="">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        <?= $phim->TenPhim ?>
                    </div>
                    <p class="text-gray-700 text-base">
                        <span class="font-semibold">Đạo diễn:</span> <?= $phim->DaoDien ?>
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class="font-semibold">Ngôn ngữ:</span> <?= $phim->NgonNgu ?>
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class="font-semibold">Thời lượng:</span> <?= $phim->ThoiLuong ?> phút
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class="font-semibold">Ngày phát hành:</span> <?= $phim->NgayPhathanh ?>
                    </p>
                    <p class="text-gray-700 text-base">
                        <span class="font-semibold">Mã phim:</span> <?= $phim->MaPhim ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php require('partials/footer.php'); ?>