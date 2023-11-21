<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php privelagedEntry() ?>


<div class="container mt-5 mx-5">
        <span class="d-flex align-items-center mb-3 my-5" id="admin-title">
            <span class="material-symbols-outlined fs-1"> menu_book </span>
            <label class="ml-2 fs-3"> Create Menu Item </label>
        </span>

    <form action="<?php echo URLROOT; ?>menu/create/" method="post">
        <?php
        $tableData = $data['tableData'];
        echo '<form action="http://localhost/crimsonmvc/menu/create/" method="post">';

        foreach ($tableData as $item) {
            if ($item->Field == 'id') continue;
            echo '<div class="form-group">';
            echo '<label for="' . $item->Field . '">' . $item->Field . '</label>';
            echo '<input type="text" name="' . $item->Field . '" id="' . $item->Field . '" class="form-control">';
            echo '</div>';
        }

        echo '<button type="submit" class="btn btn-primary"> SUBMIT</button>';
        echo '<button type="reset" class="btn btn-danger"> RESET</button>';
        echo '</form>';


        ?>


    </form>

