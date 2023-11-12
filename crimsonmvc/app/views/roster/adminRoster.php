<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyewtvxUA+P9oJp1JbsA7fojYBbd+6NIcD" crossorigin="anonymous">
    <title>Days of the Week Selector</title>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <form action="<?php echo URLROOT; ?>roster/adminRoster/" method="post">
            <div class="row">
                <?php
                $daysOfWeek = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
                foreach ($daysOfWeek as $index => $day) {
                    echo '<div class="col">';
                    echo '<h4 class="text-center">' . $day . '</h4>';
                    echo '<select class="custom-select" multiple name="' . ($index + 1) . '[]">';

                    foreach ($data as $item) {
                        $isSelected = $this->isWorkingToday($item->ID, $index + 1);
                        echo '<option value="' . $item->ID . '" ' . ($isSelected ? 'selected' : '') . '>' . $item->Name . '</option>';
                    }

                    echo '</select>';
                    echo '</div>';
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9Jvo0bL+2Yb9I" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyewtvxUA+P9oJp1JbsA7fojYBbd+6NIcD" crossorigin="anonymous"></script>

</body>

</html>
