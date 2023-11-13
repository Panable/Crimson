<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php userEntry() ?>
<h1>
    STAFF PANEL
</h1>

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

<?php require APPROOT . '/views/inc/footer.php'; ?>
