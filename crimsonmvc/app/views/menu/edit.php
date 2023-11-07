<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div id="content" class="d-flex justify-content-center">
    <div class="container">
        <div class="row d-flex align-items-center ms-xl-6 mt-5 pt-5 justify-content-center">
            <!-- -->
            <div id="item-image" class="content bg-dark">
                <div class="content d-flex flex-row align-items-end p-5 pb-0 position-relative z-index-10">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa0PHv0Qqh3jMHjenGgD9-yy9wACuWZXc7ww&usqp=CAU" alt="Mocha">
                    <label id="item-name" class="text-white fs-2 px-3"> Mocha </label>
                </div>
            </div>
        </div>
        <!-- FORM TAG ACTION HERE-->
        <form action="<?php echo URLROOT; ?>menu/edit/<?php echo $data['menu']->id; ?>" method="post">
            <div id="edit-section">
                <div class="col-12 d-flex">
                    <!-- ID Form -->
                    <div class="form-group d-block m-5">
                        <label for="id">ID</label>
                        <div id="item-input-wrapper">
                            <label for="id">
                                <input type="number" name="id" class="form-control" readonly value="<?php echo $data['menu']->id; ?>">
                            </label>
                        </div>
                    </div>

                    <!-- Name Form -->
                    <div class="form-group d-block m-5">
                        <label id="item-field">Name</label>
                        <div id="item-input-wrapper">
                            <label for="name">
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $data['menu']->name; ?>">
                            </label>
                        </div>
                    </div>

                    <!-- Price Form -->
                    <div class="form-group d-block m-5">
                        <label id="item-field">Price</label>
                        <div id="item-input-wrapper">
                            <label for="price">
                                <input type="number" step="0.1" name="price" id="price" class="form-control" value="<?php echo $data['menu']->price; ?>">
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Description Form -->
                <div class="col mx-5">
                    <div class="form-group d-block">
                        <label id="item-field">Description</label>
                        <textarea name="description" id="notes" class="form-control" rows="3"><?php echo $data['menu']->description; ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <button type="submit" class="btn btn-sm btn-primary px-4 ms-auto mb-1">Save</button>
            <a href="<?php echo URLROOT . 'menu/delete/' . $data['menu']->id; ?>" class="btn btn-sm btn-danger my-5 float-end">Delete</a>
        </form>

    </div>
</div>
