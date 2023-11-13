<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php userEntry() ?>
    <h1>Make your request</h1>
    <div class="container mt-5">
        <form action="<?php echo URLROOT; ?>roster/rosterRequest/" method="post">
        <div class="row">
            <?php
            $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
            foreach ($daysOfWeek as $index => $day) {
                echo '<div class="col text-center">';
                echo '<div class="d-flex flex-column align-items-center">';
                echo '<h4>' . $day . '</h4>';
                echo '<select class="custom-select mt-2" multiple name="' . ($index + 1) . '[]" ' . '>';

                foreach ($data as $item) {
                    $isSelected = $this->isWorkingToday($item->ID, $index + 1);
                    echo '<option value="' . $item->ID . '" ' . ($isSelected ? 'selected' : '') . '>' . $item->Name . '</option>';
                }

                echo '</select>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
