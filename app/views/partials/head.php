<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/public/css/styles.css">
    <?php
    global $title;
    echo " <title>" . ($title ?? "hello") . "</title>";
    ?>
    <script src="
https://cdn.jsdelivr.net/npm/socket.io@4.7.4/client-dist/socket.io.min.js
"></script>
    <script>
        const socket = io("ws://localhost:3000");
        socket.on("file-change", () => {
            window.location.reload();
        });
    </script>


</head>

<body>
    <?php require('nav.php'); ?>