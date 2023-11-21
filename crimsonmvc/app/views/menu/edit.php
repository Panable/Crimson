<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php privelagedEntry() ?>
<?php $img_source = URLROOT . $data['menu']->photo;

if (!@GetImageSize($img_source)) {
    $img_source = 'https://wiki.teamfortress.com/w/images/f/f4/Backpack_Sandvich.png';
}
?>

<div id="content" class="d-flex justify-content-center">
    <div class="container my-auto"> <!-- Added mx-auto class to center the content -->
        <!-- Repeatable Section -->
        <span class="d-flex align-items-center mb-3" id="admin-title">
            <span class="material-symbols-outlined fs-1"> edit </span>
            <label class="ml-2 fs-3"> Edit Menu Item</label>
        </span>

        <div class="row align-items-center d-flex justify-content-center">

            <!-- FORM TAG ACTION HERE-->
            <form action="<?php echo URLROOT; ?>menu/edit/<?php echo $data['menu']->id; ?>" method="post">

                <!-- Edit Image and Section -->
                <div id="item-image" class="content bg-dark rounded rounded-3">
                    <div class="content d-flex flex-row align-items-end p-5 pb-0 position-relative z-index-10 pb-3">

                        <!-- Need to add the corresponding item name and img source -->
                        <img src="<?php echo $img_source ?>" class="rounded rounded-3"
                             alt=" <?php echo $data['menu']->name; ?> ">
                        <label id="item-name" class="text-white fs-2 px-3"> <?php echo $data['menu']->name; ?> </label>

                        <!-- Save Button -->
                        <button type="submit" class="btn btn-sm btn-primary px-4 ms-auto mb-1">Save</button>
                    </div>
                </div>

                <!-- Edit Section -->
                <div id="edit-section" class="rounded rounded-3">
                    <div class="col-12 d-flex">


                        <!-- ID Form -->
                        <div class="form-group d-block m-5">
                            <label id="item-field" class="fs-4"> ID </label>
                            <div id="item-input-wrapper">
                                <label for="id">
                                    <input type="number" name="menu-item-edit" class="form-control" readonly
                                           value="<?php echo $data['menu']->id; ?>">
                                </label>
                            </div>
                        </div>

                        <!-- Name Form -->
                        <div class="form-group d-block m-5">
                            <label id="item-field" class="fs-4">Name</label>
                            <div id="item-input-wrapper">
                                <label for="name">
                                    <input type="text" name="name" id="menu-item-edit" class="form-control"
                                           value="<?php echo $data['menu']->name; ?>">
                                </label>
                            </div>
                        </div>

                        <!-- Price Form -->
                        <div class="form-group d-block m-5">
                            <label id="item-field" class="fs-4">Price</label>
                            <div id="item-input-wrapper">
                                <label for="price">
                                    <input type="number" step="0.1" name="price" id="menu-item-edit"
                                           class="form-control"
                                           value="<?php echo $data['menu']->price; ?>">
                                </label>
                            </div>
                        </div>


                        <!-- Upload New Photo Form -->
                        <div class="form-group d-block m-5">
                            <label id="item-field" class="fs-4">Upload New Photo</label>
                            <div id="item-input-wrapper" class="fs-4">
                                <label for="price">
                                    <input type="file" name="new_photo" id="menu-item-edit" class="form-control">
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Description Form -->
                    <div class="col mx-5">
                        <div class="form-group d-block">
                            <label id="item-field" class="fs-4">Description</label>
                            <textarea name="description" id="menu-item-edit" class="form-control"
                                      rows="3"><?php echo $data['menu']->description; ?></textarea>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
