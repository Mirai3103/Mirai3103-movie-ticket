   <div class="header ">
       <div class="header__logo-wrapper" onclick="window.location.href='/trang-chu'">
           <img class="" src="/public/assets/img/logo.jpg" alt="" />
       </div>


       <i class="icon-triangle fa-solid fa-caret-right"></i>
       <div class="container">
           <div class="header__wrapper row d-flex align-items-center">
               <div class="col-3 d-flex align-items-center">

               </div>
               <div class="col-9">
                   <div class="d-flex justify-content-around align-items-center nav-tool-wrapper">
                       <form class="form-search form-search--focus d-my-mobile-none d-flex my-2 my-lg-0">
                           <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn search-btn my-2 my-sm-0" type="submit">
                               <i class="fa-solid fa-magnifying-glass"></i>
                           </button>
                       </form>
                       <li class="nav-item dropdown nav-item-dropdown d-none d-my-ml-block">
                           <a class="nav-link dropdown-toggle--icon dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="login-mobile__icon  fa-solid fa-user login-mobile__icon"></i>
                           </a>
                           <div class="dropdown-menu dropdown-item--login bg-app-dark" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item login-mobile-item" href="/trang-chu/dang-nhap">
                                   <i class="fa-solid navbar-list__icon fa-right-to-bracket"></i>
                                   Đăng nhập
                               </a>
                               <a class="dropdown-item login-mobile-item" href="/trang-chu/dang-ky">
                                   <i class="fa-solid navbar-list__icon fa-user-plus "></i>
                                   Đăng kí
                               </a>
                           </div>
                       </li>


                       <label onclick="" for="checkShowMenu" class="menu-mobile-wrapper d-my-mobile-flex d-none">
                           <i class="fa-solid fa-bars"></i>
                       </label>

                       <input type="checkbox" id="checkShowMenu" />

                       <div class="nav-menu-mobile">
                           <a class="nav-menu-mobile__item" href="#">
                               <i class="fa-solid fa-house navbar-list__icon"></i>
                               Trang chủ
                           </a>
                           <a class="nav-menu-mobile__item" href="#">
                               <i class="fa-regular fa-calendar-days nav-menu-mobile__icon"></i>
                               Lịch Chiếu
                           </a>
                           <a class="nav-menu-mobile__item" href="#">
                               <i class="fa-solid fa-clapperboard nav-menu-mobile__icon"></i>
                               Phim
                           </a>
                           <a class="nav-menu-mobile__item" href="#">
                               <i class="fa-solid fa-phone nav-menu-mobile__icon"></i>
                               Liên Hệ
                           </a>
                           <a class="nav-menu-mobile__item" href="#">
                               <i class="fa-solid fa-truck nav-menu-mobile__icon"></i>
                               Dịch Vụ
                           </a>
                       </div>

                       <div class="login-wrapper d-my-ml-none">
                           <a style="margin-right: 4px;" class="login-item btn-login btn" href="/trang-chu/dang-nhap">
                               <i class="fa-solid fa-right-to-bracket navbar-list__icon"></i>
                               <span class="ms-3 ">Đăng Nhập</span>
                           </a>

                           <a class="login-item btn-login btn" href="#">
                               <i class="fa-solid navbar-list__icon fa-user-plus"></i>
                               <span class="ms-3 ">Đăng Ký</span>
                           </a>
                       </div>

                   </div>


               </div>


               <!-- <nav class="navbar">
            <div class="col-3"></div>
            <div class="col-9 d-flex justify-content-center">
              
              
            </div>
          </nav>

          <nav></nav>
          <div class="header__wrap-content">
            <ul id="nav"></ul>
          </div>
        </div>
      </div> -->

           </div>

       </div>
       <div class="row nav-row">
           <div class="col-3"></div>
           <div class="col-9 d-flex align-items-center justify-content-center">
               <nav class="navbar-list d-mobile-none">
                   <a class="navbar-item d-my-lg-none" href="#">
                       <i class="fa-solid fa-truck navbar-list__icon"></i>
                       Dịch Vụ
                   </a>
                   <a class="navbar-item d-my-lg-none" href="#">
                       <i class="fa-solid fa-phone navbar-list__icon"></i>
                       Liên Hệ
                   </a>
                   <a class="navbar-item d-my-mobile-none" href="#">
                       <i class="fa-regular fa-calendar-days navbar-list__icon"></i>
                       Lịch Chiếu
                   </a>
                   <a class="navbar-item d-my-md-none" href="#">
                       <i class="fa-solid fa-clapperboard navbar-list__icon"></i>
                       Phim
                   </a>
                   <a class="navbar-item d-my-ml-none" href="#">
                       <i class="fa-solid fa-star navbar-list__icon"></i>
                       Rạp Và Giá
                   </a>
                   <a class="navbar-item d-my-mobile-none" href="#">
                       <i class="fa-solid fa-circle-check navbar-list__icon"></i>Ưu Đãi
                   </a>

                   <div class="nav-item d-my-mobile-none dropdown nav-item-dropdown d-my-lg-block">
                       <a class="navbar-item dropdown-toggle ms-4" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                           Khác
                       </a>

                       <ul class="dropdown-menu d-my-mobile-none bg-menu"" aria-labelledby="">
              <a class=" dropdown-item menu-item" href="#">
                           <i class="fa-solid  fa-truck navbar-list__icon"></i>
                           Dịch Vụ
                           </a>
                           <!-- <div class="dropdown-divider"></div> -->
                           <a class="dropdown-item menu-item" href="#">
                               <i class="fa-solid fa-phone navbar-list__icon"></i>
                               Liên Hệ
                           </a>
                           <a class="dropdown-item menu-item d-my-ml-block d-none" href="#">
                               <i class="fa-solid fa-star navbar-list__icon"></i>
                               Rạp Và Giá
                           </a>
                           <a class="dropdown-item menu-item d-my-md-block d-none" href="#">
                               <i class="fa-solid fa-clapperboard navbar-list__icon"></i>
                               Phim
                           </a>
                       </ul>
                   </div>

               </nav>
           </div>
       </div>
   </div>