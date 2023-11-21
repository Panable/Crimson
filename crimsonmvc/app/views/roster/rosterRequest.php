<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<?php userEntry() ?>
<div id="content" class="d-flex justify-content-center">
    <div class="container mt-5 mx-5">
        <span class="d-flex align-items-center mb-3 my-5" id="admin-title">
            <span class="material-symbols-outlined fs-1"> calendar_month </span>
            <label class="ml-2 fs-3"> Employee - Make Roster Request</label>
        </span>

        <form action="<?php echo URLROOT; ?>roster/rosterRequest/" method="post">
            <button type="submit" class="btn btn-primary mt-5 px-4">Submit</button>
            <div class="row my-5 mx-auto">
                <?php
                $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
                foreach ($daysOfWeek as $index => $day) {
                    echo '<div class="col text-center">';
                    echo '<div class="d-flex flex-column align-items-center" id="day-header">';
                    echo '<h4>' . $day . '</h4>';
                    echo '<select class="custom-select-lg mt-2 rounded rounded-2 w-100" multiple name="' . ($index + 1) . '[]" ' . '>';

                    foreach ($data as $item) {
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

