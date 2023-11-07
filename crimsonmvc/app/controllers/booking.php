<?php
class booking extends controller
{

    function sanitize_input($input)
    {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    // Sanitize $_POST data
    public function __construct()
    {
        $this->postModel = $this->model('bookingmodel');
    }


    private function postHandler()
    {
        try {
            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $table_data['Phone_Number'] = trim($_POST['Phone_Number']);
            $table_data['Time'] = trim($_POST['Time']);
            $table_data['Date'] = trim($_POST['Date']);
            $table_data['Guests'] = trim($_POST['Guests']);

            $this->postModel->insertBooking($table_data);
            $_SESSION['statusHeader'] = "SUCCESS";
            redirect('pages/status');
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandler();
            return;
        }
        $colNames = $this->postModel->getColumnNames();
        $data = [
            'name' => $colNames,
        ];
        $this->view('booking/booking', $data);
    }
}
