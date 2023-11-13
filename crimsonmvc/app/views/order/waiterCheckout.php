<?php require APPROOT . '/views/inc/header.php'; ?>
<?php userEntry() ?>

<h1>
    Waiter Checkout
</h1>
<a href="<?php echo URLROOT . 'menu/waiter'  ?>">
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

        <form action="<?php echo URLROOT . 'order/waiterCheckout'  ?>" method="post">
            <div id="edit-section">
                <!-- Phone Number Form -->
                <div class="form-group">
                    <label for="TableNumber">Table Number</label>
                    <input type="number" name="TableNumber" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary m-3">Confirm Order</button>
            </div>
        </form>

        <?php require APPROOT . '/views/inc/footer.php'; ?>
