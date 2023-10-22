<?php require APPROOT . '/views/inc/sidebar.php'; ?>


<div class="col py-3" style="margin-left: 280px;"> <!-- Adjust the margin-left to your desired width -->
    <section>
        <form action="">
            <div class="row">
                <div class="col">
                    <div class="input-title"> ID</div>
                    <input type="text" readonly="readonly" placeholder="ID">
                    <!-- Add this if required in column <span class="material-symbols-outlined"> more_horiz </span>  -->
                </div>

                <div class="col">
                    <div class="input-title"> Name</div>
                    <input type="text" placeholder="Name">
                    <!-- Add this if required in column <span class="material-symbols-outlined"> more_horiz </span>  -->
                </div>


                <div class="col">
                    <div class="input-title"> Price</div>
                    <input type="text" placeholder="Price">
                </div>

                <div class="col">
                    <div class="input-title"> Description</div>
                    <input type="text" placeholder="Description">
                </div>
            </div>
        </form>
    </section>
</div>


