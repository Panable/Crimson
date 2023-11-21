<?php require APPROOT . '/views/inc/header.php'; ?>

<body id="booking-body">

<a href="<?php echo URLROOT; ?>" class="text-decoration-none fs-3 d-flex align-items-center my-3" id="icon-home">
    <span class="material-symbols-outlined fs-2 me-3"> arrow_back </span>
    <span> Back to Home Page</span>
</a>

<div class="row justify-content-center my-5">
    <div class="col-md-12 col-lg-10 my-5 rounded rounded-3" id="edit-section">
        <form class="my-5 mx-5" action="<?php echo URLROOT . 'booking' ?>" method="post">
            <div class="form-group">
                <p class="ml-2 fs-1 text-center" id="booking-title"> Make a Booking Reservation </p>
                <hr>

                <label for="Phone_Number" id="booking-field"  class="fs-4 my-3">Phone Number</label>
                <input type="tel" name="Phone_Number" class="form-control" required>

                <label for="Time" id="booking-field" class="fs-4 my-3">Time</label>
                <input type="time" name="Time" class="form-control" required>

                <label for="Date" id="booking-field" class="fs-4 my-3">Date</label>
                <input type="date" name="Date" class="form-control" required>

                <label for="Guests" id="booking-field" class="fs-4 my-3">Guests</label>
                <input type="number" name="Guests" class="form-control" required>

                <button type="submit" class="btn btn-lg my-5 rounded rounded-2 px-5 float-end" id="booking-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
