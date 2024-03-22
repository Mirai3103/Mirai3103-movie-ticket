<?php
// cấu hình ứng dụng
use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};
use App\Services\PhimService;

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

App::bind('phimService', new PhimService(App::get('database')));
