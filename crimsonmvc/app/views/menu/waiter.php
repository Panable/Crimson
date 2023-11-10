<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/template.php'; ?>

<section class="card-section pt-4 mx-4">
    <div class="my-5 mx-3">
        <h2> Menu </h2>
    </div>
    <div class="my-5 mx-3">
    </div>
    <form action="<?php echo URLROOT; ?>menu/waiter/" method="post">
        <button type="submit" class="btn btn-primary">Checkout</button>
        <div class="row">
            <?php
            function value($id)
            {
                $cart = getSession('WaiterCart');
                if ($cart) {
                    if (isset($cart[$id])) {
                       return $cart[$id];  
                    }
                }

                return 0;
            }
            foreach ($data['menu'] as $item) {
                $description_source = $item->description;
                $name_source = $item->name;
                $price_source = $item->price;
                $img_source = URLROOT . $item->photo;
                $quantityHtml = '<div class="input-group quantity-selector">
  <input type="number" name="' . $item->id . '"id="inputQuantitySelector" class="form-control" value="'. value($item->id) . '" min="0" max="100" step="1">
</div>';
                $itemCard = buildItemWithQuantity($quantityHtml, $img_source, $name_source, $price_source, $description_source);
                echo $itemCard;
            }
            ?>
        </div>
</section>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
