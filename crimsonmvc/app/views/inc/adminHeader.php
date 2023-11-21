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
        </div>

        <div class="col-md">
        </div>

        <!-- Right Side Navbar -->
        <div class="col-sm">
            <div class="container my-2-md-0 mr-md-3">
                <a href=<?php echo URLROOT; ?>pages class="p-2 text-white text-decoration-none">Control Panel</a>

                <?php
                echo '<span class="material-symbols-outlined text-white"> account_circle</span> ';
                echo '<a class="p-2 text-white text-decoration-none">' . getSession('user_name') . '</a>';
                ?>

                <a href=<?php echo URLROOT; ?>user/logout class="p-2 text-decoration-none text-white btn bg-danger">Logout</a>
            </div>
    </nav>
