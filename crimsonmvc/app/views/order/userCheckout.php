<?php require APPROOT . '/views/inc/header.php'; ?>
<h1>
    USER CHECKOUT
</h1>
<a href="<?php echo URLROOT . 'menu/pickup'  ?>">
    <button type="button" class="btn btn-secondary">Edit Selection</button>
</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
        </tr>

    </thead>
    <tbody>
        <?php
        $table = '';
        foreach ($data['items'] as $item) {
            $table .= '<tr>';
            $table .= '<td>' . $item->name . '</td>';
            $table .= '<td>' . "$" . $item->price . '</td>';
            $table .= '<td>' . $item->quantity . '</td>';
            $table .= '<td>' . "$" . $item->total . '</td>';
            $table .= '</tr>';
        }
        $table .= '<tr>';
        $table .= '<td>-</td>';
        $table .= '<td>-</td>';
        $table .= '<td>-</td>';
        $table .= '<td>' . "$" . $data['total'] . '</td>';
        $table .= '</tr>';
        $table .= '</tbody>';
        $table .= '</table>';
        echo $table;
        ?>
        <br>

        <form action="<?php echo URLROOT . 'order/userCheckout'  ?>" method="post">
            <div id="edit-section">
                <!-- Phone Number Form -->
                <div class="form-group">
                    <label for="Phone_Number">Phone Number</label>
                    <input type="tel" name="Phone_Number" class="form-control" required>
                </div>

                <!-- Time Form -->
                <div class="form-group">
                    <label for="Time">Name</label>
                    <input type="text" name="Name" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary m-3">Confirm Order</button>
            </div>
        </form>

        <?php require APPROOT . '/views/inc/footer.php'; ?>
