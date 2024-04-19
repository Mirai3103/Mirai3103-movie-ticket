<?php
needEmployee();
?>
<nav style="position: relative" class="sidebar">
    <header class="d-flex">
        <div class="image-text d-flex align-items-center">
            <span class="image-logo">
                <img src="/public/assets/img/logo.png" alt width="60px" />
            </span>

            <div class="text header-text d-flex flex-column align-items-center">
                <span class="name fs-5"><strong>Pixcel Cinema</strong></span>
            </div>
        </div>

        <i class="fa-solid fa-angle-right toggle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <?php
            use App\Models\AdminMenu;


            $menu = AdminMenu::getUserMenu($_SESSION['user']['permissions']);

            ?>

            <ul class="menu-links scrollable">
                <?php foreach ($menu as $item): ?>
                    <li class="menu-links__item">
                        <a asp-action="index" asp-controller="Category" asp-area="Blog" href="<?= $item['href'] ?>">
                            <i class="menu-links__item-icon <?= $item['icon'] ?>"></i>

                            <span class="text nav-text">
                                <?= $item['text'] ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
                <div class="animation-dropdown">
                    <li class="menu-links__item dropdown__item-cinema">
                        <a asp-action="index" asp-controller="Category" asp-area="Blog"
                            href="/admin/thong-ke-rap-chieu">
                            <i class="menu-links__item-icon"></i>
                            <span class="text nav-text">Rạp chiếu</span>
                        </a>
                    </li>

                    <li class="menu-links__item dropdown__item-movie">
                        <a asp-action="index" asp-controller="Category" asp-area="Blog" href="/admin/thong-ke-phim">
                            <i class="menu-links__item-icon"></i>
                            <span class="text nav-text">Phim</span>
                        </a>
                    </li>

                    <li class="menu-links__item dropdown__item-product">
                        <a asp-action="index" asp-controller="Category" asp-area="Blog" href="/admin/thong-ke-san-pham">
                            <i class="menu-links__item-icon"></i>
                            <span class="text nav-text">Sản phẩm</span>
                        </a>
                    </li>
                </div>

                <li class="menu-links__item">
                    <a class="" asp-action="index" asp-controller="Category" asp-area="Blog"
                        href="/admin/cai-dat-website">
                        <i class="fa-solid fa-gear menu-links__item-icon"></i>
                        <span class="text nav-text">Website</span>
                    </a>
                </li>
            </ul>

            <div class="menu-links__item py-2">
                <a asp-action="index" asp-controller="Category" asp-area="Blog" href="#">
                    <i class="fa-solid fa-right-from-bracket menu-links__item-icon"></i>
                    <span class="text nav-text">Đăng xuất</span>
                </a>
            </div>
        </div>
    </div>
</nav>