<?php

use App\Models\JsonResponse;

global $scripts;
$scripts = [];
global $title;
$title = "";

function title(string $value)
{
    global $title;
    $title = $value;
}

function script(string $src)
{
    global $scripts;
    $scripts[] = $src;
}
function scripts(array $list)
{
    foreach ($list as $src) {
        script($src);
    }
}


/**
 *
 * @param  string $name
 * @param  array  $data
 */


function view($name, $data = [])
{
    extract($data);
    $name = str_replace('.', '/', $name);


    return require "app/views/{$name}.view.php";
}

/**
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

function uid()
{
    $client = new Client();
    return $client->generateId($size = 21);

}
function isNullOrEmptyString($str)
{
    return (!isset($str) || trim($str) === '');
}
function ifNullOrEmptyString($str, $default)
{
    return isNullOrEmptyString($str) ? $default : $str;
}

function isNullOrEmptyArray($arr)
{
    return (!isset($arr) || count($arr) === 0);
}
function getArrayValueSafe($arr, $key, $default = null)
{
    return isset($arr[$key]) ? $arr[$key] : $default;
}
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


function json($data, $status = 200)
{
    // if data is an instance of JsonResponse
    if ($data instanceof JsonResponse) {
        $status = $data->status;
    }
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    die($status);
}

function request_body()
{
    //  check if content type is json
    if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
        return json(new JsonResponse(400, "Invalid content type"), 400);
    }
    return json_decode(file_get_contents('php://input'), true);
}

function isAjaxRequest()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}


function onUnauthorized()
{
    if (isAjaxRequest()) {
        return json(new JsonResponse(401, "Unauthorized"), 401);
    }

    return redirect('login' + '?returnUrl=' + $_SERVER['REQUEST_URI']);
}

function needLogin()
{
    if (!isset($_SESSION['user'])) {
        return onUnauthorized();
    }
}

function needEmployee()
{
    needLogin();
    if ($_SESSION['user']['is_employee'] === false) {
        return onUnauthorized();
    }
}

function needAnyPermission($permissions)
{
    needEmployee();
    $userPermissions = $_SESSION['user']['permissions'];
    //[{ TenQuyen, MaQuyen, MoTa}]
    $isHasPermission = false;
    foreach ($permissions as $permission) {
        foreach ($userPermissions as $userPermission) {
            if ($userPermission['TenQuyen'] === $permission) {
                $isHasPermission = true;
                break;
            }
        }
    }
    if (!$isHasPermission) {
        return onUnauthorized();
    }
}