<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo SITENAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg py-lg-4 bg-dark">
        <div class="col-sm">

            <?php
            echo '<a class="p-2 text-white text-decoration-none">' . getSession('user_name') . '</a>';
            ?>
        </div>

        <div class="col-md">
            <h1 class="text-white text-center"> Crimson Cafe</h1>
        </div>
        <!-- Right Side Navbar -->
        <div class="col-sm">
            <div class="container my-2-md-0 mr-md-3">
                <a href=<?php echo URLROOT; ?>pages class="p-2 text-white">Control Panel</a>
                <a href=<?php echo URLROOT; ?>user/logout class="p-2 text-white">Logout</a>

            </div>
    </nav>
