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
