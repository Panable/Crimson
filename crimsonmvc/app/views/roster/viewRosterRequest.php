<?php require APPROOT . '/views/inc/adminHeader.php'; ?>


<?php privelagedEntry() ?>
<h1>Roster Request - <?php echo $data['nameOfRequest']->Name ?></h1>
<div class="container mt-5">
    <form action="<?php echo URLROOT; ?>roster/viewRosterRequest/<?php echo $data['rosterRequestID']; ?>" method="post">
        <div class="row">
            <?php
            $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
            foreach ($daysOfWeek as $index => $day) {
                echo '<div class="col text-center">';
                echo '<div class="d-flex flex-column align-items-center">';
                echo '<h4>' . $day . '</h4>';
                echo '<select class="custom-select mt-2" multiple name="' . ($index + 1) . '[]" ' . 'disabled' . '>';

                foreach ($data['roster'] as $item) {
                    $isSelected = $this->isWorkingTodayRequest($item->ID, $index + 1, $data['rosterRequestID']);
                    echo '<option value="' . $item->ID . '" ' . ($isSelected ? 'selected' : '') . '>' . $item->Name . '</option>';
                }

                echo '</select>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="accept">Accept</button>
        <button type="submit" class="btn btn-primary mt-3" name="deny">Deny</button>
        <?php if (isManager()) : ?>
        <?php endif; ?>
    </form>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
