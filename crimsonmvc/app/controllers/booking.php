<?php
/*
 * Booking Class
 * Extends the base Controller class, handles booking-related operations
 */
class booking extends controller
{
    /*
     * Method to sanitize input using FILTER_SANITIZE_STRING
     * @param string $input - Input data to be sanitized
     * @return string - Sanitized input data
     */
    function sanitize_input($input)
    {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    /*
     * Constructor method
     * Initializes the model for handling booking data
     */
    public function __construct()
    {
        $this->postModel = $this->model('bookingmodel');
    }

    /*
     * Private method to handle POST data for booking
     */
    private function postHandler()
    {
        try {
            // Sanitize $_POST data using FILTER_SANITIZE_FULL_SPECIAL_CHARS
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $table_data['Phone_Number'] = trim($_POST['Phone_Number']);
            $table_data['Time'] = trim($_POST['Time']);
            $table_data['Date'] = trim($_POST['Date']);
            $table_data['Guests'] = trim($_POST['Guests']);

            // Insert booking data using the model
            $this->postModel->insertBooking($table_data);

            // Set success message and redirect to status page
            $_SESSION['statusHeader'] = "SUCCESS";
            $_SESSION['statusMsg'] = "Your table has been successfully booked";
            redirect('pages/status');
        } catch (Exception $e) {
            // Set error message and redirect to status page in case of an exception
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Method to handle the index page for booking
     */
    public function index()
    {
        // Check if the request method is POST and handle accordingly
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandler();
            return;
        }

        // Get column names from the model
        $colNames = $this->postModel->getColumnNames();

        // Prepare data to be passed to the booking view
        $data = [
            'name' => $colNames,
        ];

        // Load the booking view with the prepared data
        $this->view('booking/booking', $data);
    }
}
