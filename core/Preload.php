<?php

use App\Core\Database\Database;

$GLOBALS['config'] = require 'config.php';

Database::init_db();
Router::load_from_class(HomeController::class);
Router::load_from_class(PayController::class);
Router::load_from_class(UserController::class);
Router::load_from_class(DashboardController::class);
Router::load_from_class(CheckoutController::class);
Router::load_from_class(RoomController::class);
Router::load_from_class(CinemaController::class);
Router::load_from_class(SeatTypeController::class);
Router::load_from_class(StatusController::class);


Router::build();