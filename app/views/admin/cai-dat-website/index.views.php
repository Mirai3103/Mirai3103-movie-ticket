<?php
title("Cài đặt WebSite");
require('app/views/admin/header.php')
?>

<link rel="stylesheet" href="/public/cai-dat-website/home.css">

<div style="flex-grow: 1; flex-shrink: 1; overflow-y: auto ; max-height: 100vh;" class="wrapper p-5">
            <div class="access container-fluid shadow pb-5">
                <div class="row mt-2 d-flex">
                    <div class="tab_box">
                        <button class="tab_btn">Banner</button>
                        <button class="tab_btn">Cấu hình</button>
                    </div>
                    <div class="line"></div>
                </div>

                <!-- list banner -->
                <div class="container-fluid content mt-3 active">
                    <div class="row" style="margin-right: 2px;">
                            <h2 class="title col-8 ps-5">
                                Banner
                            </h2>
                    </div>
                    <div class="row mt-3">
                        <div class="grid text-center d-flex flex-wrap">
                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>

                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card" style="width: 32rem">
                                    <button style="background-color: transparent; border: none;"
                                        id="btn-modal-banner-detail" data-bs-toggle="modal"
                                        data-bs-target="#banner-detail-modal">
                                        <img src="/public/images/thanh_xuan_banner.webp" class="card-img" alt="..." />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add new banner -->
                    <div class="row mt-4">
                        <div class="grid text-center d-flex flex-wrap justify-content-center">
                            <div
                                class="col-xl-4 col-lg-4 mb-3 d-flex justify-content-center align-items-center position-relative">
                                <div class="card justify-content-center align-content-center"
                                    style="width: 32rem; height: 154px; background-color: #cccdd2">
                                    <button style="background-color: transparent; border: none" class="h-100"
                                        id="btn-create-banner" data-bs-toggle="modal" data-bs-target="#banner-modal"
                                        type="button">
                                        <img src="/public/images/icons8-plus-100.png" alt="" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings website -->
                <div class="container-fuild content mt-3 ps-5">
                    <div class="row d-flex justify-content-start">
                        <h2 class="title col-8 ps-5">
                            Cấu hình
                        </h2>
                        <button class="col-1 ms-4 btn btn-outline-success">
                            Tải file logs
                        </button>
                    </div>

                    <!-- Tên Website -->
                    <div class="row d-flex mt-2">
                        <label for="WEBSITE_NAME" class="col-xl-2 fs-admin pe-0 ps-3">
                            Tên website
                        </label>
                        <div class="input-group has-validation col-xl-10 p-0">
                            <input type="text" class="form-control is-invalid" id="WEBSITE_NAME" name="WEBSITE_NAME"
                                aria-describedby="WEBSITE_NAME-feedback" required>
                            <div id="WEBSITE_NAME-feedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="row d-flex mt-2">
                        <label for="WEBSITE_LOGO" class="col-xl-2 fs-admin pe-0 ps-3">
                            Logo
                        </label>
                        <div class="input-group has-validation col-xl-10 p-0">
                            <input type="file" class="form-control is-invalid" aria-label="file example" required
                                id="WEBSITE_LOGO" name="WEBSITE_LOGO">
                            <div class="invalid-feedback d-block">Example invalid form file feedback</div>
                        </div>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="row d-flex mt-2">
                        <label for="WEBSITE_PHONE" class="col-xl-2 fs-admin pe-0 ps-3">
                            Số điện thoại
                        </label>
                        <div class="input-group has-validation col-xl-10 p-0">
                            <input type="text" class="form-control is-invalid" id="WEBSITE_PHONE" name="WEBSITE_PHONE"
                                aria-describedby="WEBSITE_PHONE-feedback" required>
                            <div id="WEBSITE_PHONE-feedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="row d-flex mt-2">
                        <label for="WEBSITE_EMAIL" class="col-xl-2 fs-admin pe-0 ps-3">
                            Email
                        </label>
                        <div class="input-group has-validation col-xl-10 p-0">
                            <input type="email" class="form-control is-invalid" id="WEBSITE_EMAIL" name="WEBSITE_EMAIL"
                                aria-describedby="WEBSITE_EMAIL-feedback" required>
                            <div id="WEBSITE_EMAIL-feedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>

                    <!-- Mô tả website -->
                    <div class="row d-flex mt-2">
                        <label for="WEBSITE_DESCRIPTION" class="col-xl-2 fs-admin pe-0 ps-3">
                            Mô tả website
                        </label>
                        <div class="input-group has-validation col-xl-10 p-0">
                            <textarea id="WEBSITE_DESCRIPTION" name="WEBSITE_DESCRIPTION" required class="form-control is-invalid"
                                aria-describedby="WEBSITE_DESCRIPTION-feedback"></textarea>
                            <div id="WEBSITE_DESCRIPTION-feedback" class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>

                    <!-- Thời gian giữ vé (phút) -->
                    <div class="row form-group mt-2">
                        <label for="date" class="col-2 col-form-label fs-admin pe-0 ps-3">
                            Thời gian giữ vé (phút)
                        </label>
                        <div class="col-4 p-0">
                            <div class="input-group date">
                                <input type="number" name="TICKET_HOLD_TIME" id="TICKET_HOLD_TIME" name="TICKET_HOLD_TIME" class="form-control is-invalid" required pattern="\d{1,2}/\d{1,2}/\d{4}" title="Vui lòng nhập đúng định dạng dd/mm/yyyy">
                                <div id="TICKET_HOLD_TIME-feedback" class="invalid-feedback">
                                    Please choose a minutes
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thời gian nhớ đăng nhập (ngày) -->
                    <div class="row form-group mt-2">
                        <label for="date" class="col-2 col-form-label fs-admin pe-0 ps-3">Thời gian nhớ đăng nhập</label>
                        <div class="col-4 p-0">
                            <div class="input-group date">
                               <input type="date" name="REMEMBER_TIME_IN_DAYS" name="REMEMBER_TIME_IN_DAYS" id="REMEMBER_TIME_IN_DAYS" class="form-control is-invalid" required pattern="\d{1,2}/\d{1,2}/\d{4}" title="Vui lòng nhập đúng định dạng dd/mm/yyyy">
                               <div id="REMEMBER_TIME_IN_DAYS-feedback" class="invalid-feedback">
                                Please choose a day
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <button type="button" class="btn btn-primary col-1 btn-save-settings">Save</button>
                    </div>
                </div>

                <!-- Modal create new banner -->
                <div class="modal fade bs-example-modal-lg" id="banner-modal" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header position-relative">
                                <h4 class="modal-title" id="myLargeModalLabel">Hình ảnh</h4>
                                <button type="button" class="close close-modal position-absolute" data-dismiss="modal"
                                    aria-hidden="true" id="btn-close-modal-banner">
                                    ×
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="create-banner container bg-white">
                                    <div class="row d-flex mt-2">
                                        <label for="new-banner-img" class="col-xl-2">Chọn từ thư mục</label>
                                        <div class="has-validation col-xl-10 p-0">
                                            <input type="file" class="form-control is-invalid" aria-label="file example" required id="new-banner-img">                                        
                                            <div class="invalid-feedback d-block">Example invalid form file feedback</div>
                                        </div>
                                    </div>
                                    <div class="row d-flex mt-2">
                                        <label for="new-banner-link" class="col-xl-2">
                                            Nhập đường dẫn
                                        </label>
                                        <div class="input-group-modal has-validation col-xl-10 p-0">
                                            <input id="new-banner-link" required class="form-control is-invalid"
                                                aria-describedby="new-banner-link-feedback"></textarea>
                                            <div id="new-banner-link-feedback" class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    id="btn-cancel-modal-banner">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-primary" id="btn-save-modal-banner">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal update banner -->
                <div class="modal fade bs-example-modal-lg" id="banner-detail-modal" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header position-relative">
                                <h4 class="modal-title" id="myLargeModalLabel">Hình ảnh</h4>
                                <button type="button" class="close close-modal position-absolute" data-dismiss="modal"
                                    aria-hidden="true" id="btn-close-modal-detail-banner">
                                    ×
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="create-banner container bg-white">
                                    <div class="row d-flex mt-2">
                                        <label for="detail-banner-img" class="col-xl-2">Chọn từ thư mục</label>
                                        <div class="has-validation col-xl-10 p-0">
                                            <input type="file" class="form-control is-invalid" aria-label="file example" required id="detail-banner-img">                                        
                                            <div class="invalid-feedback d-block">Example invalid form file feedback</div>
                                        </div>
                                    </div>
                                    <div class="row d-flex mt-2">
                                        <label for="detail-banner-link" class="col-xl-2">
                                            Nhập đường dẫn
                                        </label>
                                        <div class="input-group-modal has-validation col-xl-10 p-0">
                                            <input id="detail-banner-link" required class="form-control is-invalid"
                                                aria-describedby="detail-banner-link-feedback"></textarea>
                                            <div id="detail-banner-link-feedback" class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                                    id="btn-delete-modal-detail-banner">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    id="btn-cancel-modal-detail-banner">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-primary" id="btn-save-modal-detail-banner">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
script('/public/cai-dat-website/banner.js');
script('/public/cai-dat-website/tab.js');
require('app/views/admin/footer.php')
?>