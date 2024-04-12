<?php

use App\Core\Logger;
use App\Core\Request;
use App\Services\UserService;

session_start();
require 'vendor/autoload.php';

require_once 'core/Preload.php';

$GLOBALS['config'] = require 'config.php';

UserService::recoverAuth();



Router::dispatch();