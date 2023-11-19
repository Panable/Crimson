<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<?php userEntry() ?>

    <div class="container my-5"> <!-- Added mx-auto class to center the content -->
        <!-- Repeatable Code -->
        <span class="d-flex align-items-center mb-3" id="admin-title">
            <span class="material-symbols-outlined fs-1"> dashboard </span>
            <label class="ml-2 fs-3"> Control Panel </label>
        </span>


        <div id="content" class="d-flex justify-content-center">



<?php
if (isManager()) {
    echo '<a href="' . URLROOT . 'menu/admin">Admin Menu</a>';
    echo '<br>';
}
?>


        <a href="<?php echo URLROOT ?>menu/waiter">Waiter Menu</a>
        <br>
        <a href="<?php echo URLROOT ?>roster/adminRoster">Roster</a>
        <br>
        <a href="<?php echo URLROOT ?>pages/about">Orders</a>



