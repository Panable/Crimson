<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/template.php'; ?>

<h1>
    <?php echo $data['title']; ?>
</h1>
<section class="card-section pt-4 mx-4">
    <div class="my-5 mx-3">
    </div>
    <div class="row">
        <?php
        foreach ($data['menu'] as $item) {
            $description_source = $item->description;
            $name_source = $item->name;
            $price_source = $item->price;
            $itemCard = buildItem($img_source, $name_source, $price_source, $description_source);
            echo $itemCard;
        }
        ?>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
