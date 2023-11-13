<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php userEntry() ?>
<h1>Roster</h1>
<div class="container mt-5">
    <form action="<?php echo URLROOT; ?>roster/adminRoster/" method="post">
        <div class="row">
            <?php
            $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
            foreach ($daysOfWeek as $index => $day) {
                echo '<div class="col text-center">';
                echo '<div class="d-flex flex-column align-items-center">';
                echo '<h4>' . $day . '</h4>';
                echo '<select class="custom-select mt-2" multiple name="' . ($index + 1) . '[]" ' . (isManager() ? '' : 'disabled') . '>';

                foreach ($data['roster'] as $item) {
                    $isSelected = $this->isWorkingToday($item->ID, $index + 1);
                    echo '<option value="' . $item->ID . '" ' . ($isSelected ? 'selected' : '') . '>' . $item->Name . '</option>';
                }

                echo '</select>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <?php if (isManager()) : ?>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <?php endif; ?>
    </form>
</div>
<?php if (!isManager()) : ?>
    <a href="<?php echo URLROOT; ?>roster/rosterRequest" class="btn btn-primary mt-3">Make Roster Request</a>
<?php endif; ?>

<?php
if (isManager()) :
?>

    <h2>Roster Requests</h2>

    <?php foreach ($data['requests'] as $value) : ?>
        <div style="display: flex; justify-content: space-between;">
            <p class="d-inline-block mr-3"><?= $value->Name ?></p>
            <a href="<?= URLROOT ?>roster/viewRosterRequest/<?= $value->RosterRequestID ?>" class="btn btn-primary">View Request</a>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
