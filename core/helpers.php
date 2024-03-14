<?php

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

function guidv4($data = null)
{
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
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
