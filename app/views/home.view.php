<?php
title("Dday la homr");
require('partials/head.php'); ?>

<script>
    var listCommingMovies = <?= json_encode($commingMovies) ?>;
    var listMovie = <?= json_encode($phims) ?>;
</script>

<div class="container -tw-mt-32">
    <!-- Header -->

    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel carousel-app slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/public/assets/img/mai.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/public/assets/img/khung_fu_panda.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/public/assets/img/tieng_yeu_khong_loi.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--End Carousel -->

    <!-- Moives -->
    <h2 class="text-uppercase text-center text-dark heading mb-4 fw-bold">Phim đang chiếu</h2>

    <div class="movies-container">
        <div class="row movies-wrapper">

        </div>
    </div>


    <ul class="pagination pagination-info mt-4 d-flex justify-content-center">
        <li class="page-item"><a href="javascript:void(0);" class="page-link page-prev-btn">PREV</a></li>
        <div class="d-flex number-page">

        </div>
        <li class="page-item"><a href="javascript:void(0);" class="page-link page-next-btn">NEXT</a></li>
    </ul>
    <!--End Moives -->


    <!--Comming Movies-->
    <h2 class="text-uppercase text-center text-dark heading mb-4 fw-bold">Phim Sắp Chiếu</h2>

    <div class="movies-container">
        <div class="row comming-movies-wrapper">

        </div>
    </div>


    <ul class="pagination mt-4 d-flex justify-content-center">
        <li class="page-item"><a href="javascript:void(0);" class="page-link page-prev-btn-comming">PREV</a></li>
        <div class="d-flex number-page-comming">

        </div>
        <li class="page-item"><a href="javascript:void(0);" class="page-link page-next-btn-comming">NEXT</a></li>
    </ul>
    <!--End Comming Movies-->

</div>

<?php
script("/public/assets/javascript/movie.js");
script("/public/assets/javascript/commingMovies.js")
?>

<?php require('partials/footer.php'); ?>