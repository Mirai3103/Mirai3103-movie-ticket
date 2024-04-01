    <nav class="sidebar">
    <header class="d-flex">
        <div class="image-text d-flex align-items-center">
            <span class="image-logo">
                <img src="" alt="" />
                <i class="fa-solid fa-masks-theater icon-theater"></i>
            </span>

            <div class="text header-text d-flex flex-column align-items-center">
                <span class="name">Cinemar HKDV</span>
                <span class="profession">Admin Page </span>
            </div>
        </div>

        <i class="fa-solid fa-angle-right toggle"></i>
    </header>

    <div class="menu-bar">
        <div class="menu">
            <ul class="menu-links">
                <li class="menu-links__item">
                    <a asp-action="index" asp-controller="Category" asp-area="Blog">
                        <i class="fa-solid fa-house menu-links__item-icon"></i>
                        <span class="text nav-text">Category</span>
                    </a>
                </li>

                <li class="menu-links__item">
                    <a asp-action="index" asp-controller="Category" asp-area="Blog">
                        <i class="fa-solid fa-layer-group menu-links__item-icon"></i>
                        <span class="text nav-text">Assign Role</span>
                    </a>
                </li>

                <li class="menu-links__item">
                    <a asp-action="index" asp-controller="Category" asp-area="Blog">
                        <i class="fa-solid fa-user-large menu-links__item-icon  "></i>
                        <span class="text nav-text">User</span>
                    </a>
                </li>

                <li class="menu-links__item">
                    <a asp-action="index" asp-controller="Category" asp-area="Blog">
                        <i class="fa-solid fa-house menu-links__item-icon"></i>
                        <span class="text nav-text">Category</span>
                    </a>
                </li>
            </ul>

            <ul class="menu-links">
                <li class="menu-links__item">
                    <a asp-action="index" asp-controller="Category" asp-area="Blog">
                        <i class="fa-solid fa-right-from-bracket menu-links__item-icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <!-- <li class="toggle-color-bg-wrapper">
                        <div class="d-flex align-items-center">
                            <i class="toggle-color-bg__icon fa-solid icon-sun fa-sun"></i>
                            <i class="toggle-color-bg__icon fa-solid icon-moon fa-moon"></i>
                        </div>

                        <span class="text dark-mode nav-text">Dark Mode</span>

                        <span class="toggle-color-bg__switch">

                        </span>
                    </li> -->

            </ul>
        </div>
    </div>

</nav>