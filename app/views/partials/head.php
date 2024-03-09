<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/public/css/styles.css">
    <?php
    global $title;
    echo " <title>" . ($title ?? "hello") . "</title>";
    ?>


</head>

<body>
    <?php require('nav.php'); ?>