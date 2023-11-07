<?php require APPROOT . '/views/inc/header.php'; ?>

<h1>Book your table!</h1>

<form action="<?php echo URLROOT . 'booking'  ?>" method="post">
    <div id="edit-section">
        <!-- Phone Number Form -->
        <div class="form-group">
            <label for="Phone_Number">Phone Number</label>
            <input type="tel" name="Phone_Number" class="form-control" required>
        </div>

        <!-- Time Form -->
        <div class="form-group">
            <label for="Time">Time</label>
            <input type="time" name="Time" class="form-control" required>
        </div>

        <!-- Date Form -->
        <div class="form-group">
            <label for="Date">Date</label>
            <input type="date" name="Date" class="form-control" required>
        </div>

        <!-- Guests Form -->
        <div class="form-group">
            <label for="Guests">Guests</label>
            <input type="number" name="Guests" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary m-3">Submit</button>
    </div>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
