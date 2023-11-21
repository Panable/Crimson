<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITENAME; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo URLROOT; ?>css/style.css" rel="stylesheet">
</head>

<body>
<div class="wrapper d-flex align-items-stretch">
    <nav class="sidebar vh-100 w-25" id="sidebar-nav">
        <div class="text-center py-4">
            <div>
                <a href="<?php echo URLROOT; ?>pages/index">
                            <label class="fs-2" id="sidenav-logo"> Crimson Café </label>
                </a>
            </div>
        </div>


        <div class="list-group">
            <!-- Dashboard -->
            <a href="<?php echo URLROOT ?>pages/controlpanel" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> view_cozy </span>
                <span class="text">Dashboard</span>
            </a>


            <!-- Menu -->
            <a href="<?php echo URLROOT ?>menu/index" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> restaurant_menu </span>
                <span class="text"> Menu </span>
            </a>

            <!-- Edit Menu -->
            <a href="<?php echo URLROOT ?>menu/admin" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> edit </span>
                <span class="text">Edit Menu</span>
            </a>

            <!-- Add Menu Item -->
            <a href="<?php echo URLROOT ?>menu/create" class="text-decoration-none  fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> menu_book </span>
                <span class="text">Add Menu Item </span>
            </a>

        <!-- Employee List -->
<!--
            <a href="#" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> badge </span>
                <span class="text">Employee List </span>
            </a>
-->
            <!-- Roster Setup-->
            <a href="<?php echo URLROOT ?>roster/adminRoster" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> calendar_month </span>
                <span class="text">Roster Setup </span>
            </a>

<!--
            <a href="#" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> store </span>
                <span class="text">Serving Menu </span>
            </a>

-->
            <!-- Online Bookings -->
<!--
            <a href="#" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> schedule </span>
                <span class="text">Online Booking </span>
            </a>

-->
            <!-- Order List -->
<!--
            <a href="#" class="text-decoration-none fs-4" id="sidebar-item">
                <span class="material-symbols-outlined p-2 rounded my-3 mx-4"> receipt_long </span>
                <span class="text">Order List</span>
            </a>
-->

        </div>


    </nav>




