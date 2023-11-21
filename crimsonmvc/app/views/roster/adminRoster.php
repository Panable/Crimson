<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php userEntry() ?>
<div id="content" class="d-flex justify-content-center">
    <div class="container mt-5 mx-5">
        <span class="d-flex align-items-center mb-3 my-5" id="admin-title">
            <span class="material-symbols-outlined fs-1"> calendar_month </span>
            <label class="ml-2 fs-3"> Admin - Create Roster</label>
        </span>


        <form action="<?php echo URLROOT; ?>roster/adminRoster/" method="post">
            <?php if (isManager()) : ?>
                <button type="submit" class="btn btn-primary mt-3">Submit Roster</button>
            <?php endif; ?>
            <div class="row my-5">
                <?php
                $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
                foreach ($daysOfWeek as $index => $day) {
                    echo '<div class="col text-center">';
                    echo '<div class="d-flex flex-column align-items-center" id="day-header">';
                    echo '<h4>' . $day . '</h4>';
                    echo '<select class="custom-select-lg mt-2 rounded rounded-2 w-100" multiple name="' . ($index + 1) . '[]" ' . (isManager() ? '' : 'disabled') . '>';

                    foreach ($data['roster'] as $item) {
                        $isSelected = $this->isWorkingToday($item->ID, $index + 1);
                        echo '<option class="fs-5" value="' . $item->ID . '" ' . ($isSelected ? 'selected' : '') . '>' . $item->Name . '</option>';
                    }

                    echo '</select>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </form>
    </div>

<?php if (!isManager()) : ?>
    <a href="<?php echo URLROOT; ?>roster/rosterRequest" class="btn btn-primary mt-3">Make Roster Request</a>
<?php endif; ?>

<?php
if (isManager()) :
?>
    <nav class="sidebar vh-100 w-25" id="sidebar-nav">
        <div class="text-center py-4">
            <div>
                <label class="fs-3 text-white"> Roster Requests List</label>
            </div>
        </div>
    <?php foreach ($data['requests'] as $value) : ?>
        <div style="display: flex; justify-content: space-between;">
            <p class="d-inline-block mr-3"><?= $value->Name ?></p>
            <a href="<?= URLROOT ?>roster/viewRosterRequest/<?= $value->RosterRequestID ?>" class="btn btn-primary">View Request</a>
        </div>
    <?php endforeach; ?>

<?php endif; ?>

