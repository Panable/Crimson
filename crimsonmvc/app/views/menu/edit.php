<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div id="content" class="d-flex justify-content-center">
    <div class="container">
        <div class="row d-flex align-items-center ms-xl-6 mt-5 pt-5 justify-content-center">
            <!-- -->
                <div id="item-image" class="content bg-dark">
                    <div class="content d-flex flex-row align-items-end p-5 pb-0 position-relative z-index-10">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa0PHv0Qqh3jMHjenGgD9-yy9wACuWZXc7ww&usqp=CAU" alt="Mocha">
                        <label id="item-name" class="text-white fs-2 px-3"> Mocha </label>
                        <!-- Save Button -->
                        <button type="button" class="btn btn-sm btn-primary px-4 ms-auto mb-1"> Save</button>
                    </div>
                </div>
            </div>
        <!-- FORM TAG ACTION HERE-->
        <form action="">
            <div id="edit-section">
                <div class="col-12 d-flex">
                    <!-- Form elements -->
                    <!-- ID Form -->
                    <div class="form-group d-block m-5">
                        <label id="item-field" class="">ID</label>
                        <div id="item-input-wrapper">
                            <label for="item-input">
                                <input type="number" id="item-input" class="form-control" readonly value="1">
                            </label>
                        </div>
                    </div>

                    <!-- Menu Item Name-->
                    <div class="form-group d-block m-5">
                        <label id="item-field">Name</label>
                        <div id="item-input-wrapper">
                            <label for="item-input">
                                <input type="text" id="item-input" class="form-control" value="Mocha">
                            </label>
                        </div>
                    </div>

                    <!-- Menu Item Price -->
                    <div class="form-group d-block m-5">
                        <label id="item-field">Price</label>
                        <div id="item-input-wrapper">
                            <label for="item-input">
                                <input type="number" step="0.1" id="item-input" class="form-control" value="Mocha">
                            </label>
                        </div>
                    </div>
                </div>


                <!-- Menu Item Description-->
                <div class="col mx-5">
                    <div class="form-group d-block">
                        <label id="item-field">Description</label>
                        <textarea id="notes" class="form-control" rows="3"></textarea>



                        <button type="button" class="btn btn-sm btn-danger my-5 float-end">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
