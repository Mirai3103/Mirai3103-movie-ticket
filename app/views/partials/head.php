<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/public/css/styles.css">
    <?php
    global $title;
    echo " <title>" . ($title ?? "hello") . "</title>";
    ?>


</head>

<body>
    <?php require('nav.php'); ?>