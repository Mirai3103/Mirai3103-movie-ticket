<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/fontawesone.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">

    <link rel="preconnect" href="https://fonts.`googleapis`.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

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
    <link rel="stylesheet" href="/public/sidebar_assets/css/home.css" />
    <?php
    script('/public/sidebar_assets/js/main.js');
    ?>
</head>

<body>
    <?php
    require ('app/views/partials/toast.php');
    ?>
    <div class='tw-flex'>
        <?php
        require ('sidebar.php');
        ?>
        <section class='tw-bg-gray-100 tw-h-screen tw-overflow-y-auto tw-grow '>