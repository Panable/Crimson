<?php require APPROOT . '/views/inc/sidebar.php'; ?>

<div id="content" class="d-flex justify-content-center">
    <div class="container">
        <div class="row d-flex align-items-center ms-xl-6 mt-5 pt-5 justify-content-center">
            <!-- -->
                <div id="item-image" class="content bg-dark">
                    <div class="content d-flex flex-row align-items-end p-5 pb-0 position-relative z-index-10">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQa0PHv0Qqh3jMHjenGgD9-yy9wACuWZXc7ww&usqp=CAU" alt="Mocha">
                        <label> Mocha </label>
                        <button type="button" class="btn btn-sm btn-primary ml-5"> Save</button>
                    </div>
                </div>
            </div>
            <div id="edit-section" class="row">
                <div class="col-12 d-flex flex-row">
                    <!-- Form elements -->
                    <div class="form-group d-block m-5">
                        <label for="score">ID</label>
                        <div id="item-input-wrapper">
                            <label for="item-input">
                                <input type="number" id="item-input" class="form-control" readonly value="1">
                            </label>
                        </div>
                    </div>


                    <div class="form-group d-block m-5">
                        <label for="score">Name</label>
                        <div id="item-input-wrapper">
                            <label for="item-input">
                                <input type="text" id="item-input" class="form-control" value="mocha">
                            </label>
                        </div>
                    </div>

                    <div class="form-group d-block m-5">
                        <label for="score">Price</label>
                        <div id="item-input-wrapper">
                            <label>
                                <input type="number" min="1" step="any" class="form-control" value="$5.20">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group d-block">
                        <label for="notes">Description</label>
                        <textarea id="notes" class="form-control" rows="1"></textarea>
                    </div>

                    <!-- Delete Button -->
                    <div class="form-group d-block">
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
