<?php
session_start();
require 'vendor/autoload.php';

require_once 'core/Preload.php';

$GLOBALS['config'] = require 'config.php';


Router::dispatch();

// Database::init_db();

// if (!Request::uri()) {
//     redirect("trang-chu");
// }

// function getControllers($dir)
// {
//     $controllers = [];
//     foreach (new DirectoryIterator($dir) as $file) {
//         if ($file->isDir() && !$file->isDot()) {
//             $subControllers = getControllers($file->getPathname()) ?? [];
//             $controllers = array_merge($controllers, $subControllers);
//         } else if (substr($file->getFilename(), -4) === '.php') {
//             $fileName = $file->getFilename();

//             require_once "$dir/$fileName";
//             $class = substr($fileName, 0, -4);
//             $reflection = new \ReflectionClass($class);
//             if ($reflection->getAttributes(Controller::class)) {
//                 $attribute = $reflection->getAttributes(Controller::class)[0];
//                 $arguments = $attribute->getArguments();
//                 $path = $arguments['path'];
//                 $controllers[] = new ControllerMap(
//                     requirePath: "$dir/$fileName",
//                     controllerClassName: $class,
//                     path: $path,
//                 );
//                 usort($controllers, function ($a, $b) {
//                     if (strlen($a->path) === strlen($b->path)) {
//                         return strcmp($a->path, $b->path);
//                     }
//                     return strlen($a->path) > strlen($b->path) ? -1 : 1;
//                 });
//             }
//         }
//     }
//     return $controllers;
// }

// if (file_exists('controllers.cache.php')) {

//     $controllers = include 'controllers.cache.php';
// } else {
//     require_once 'core/ControllerMap.php';
//     $controllers = getControllers('app/controllers');
//     file_put_contents('controllers.cache.php', '<?php require_once \'core/ControllerMap.php\'; return ' . var_export($controllers, true) . ';');
// }

// $request_uri = '/' . (Request::uri() ?? "");
// $isFound = false;
// foreach ($controllers as $controller) {
//     if ($controller->match($request_uri)) {
//         $isFound = true;
//         break;
//     }
// }
// if (!$isFound) {
//     echo "404 Not Found " . $request_uri . "";
// }