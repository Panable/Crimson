<?php
class roster extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('rostermodel');
    }

    public function isWorkingToday($id, $dayOfWeek)
    {
        return $this->postModel->IsWorking($id, $dayOfWeek);
    }

    private function postHandler()
    {
        //array(5) 
        //{[1]=> array(2) { [0]=> string(1) "1" [1]=> string(1) "5" } 
        //[2]=> array(2) { [0]=> string(1) "2" [1]=> string(1) "3" } 
        //[3]=> array(1) { [0]=> string(1) "2" } 
        //[4]=> array(1) { [0]=> string(1) "1" }
        //[5]=> array(1) { [0]=> string(1) "5" } } 
        try {
            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //$table_data['Phone_Number'] = trim($_POST['Phone_Number']);

            $this->postModel->updateMainRoster($_POST);
            $_SESSION['statusHeader'] = "SUCCESS!";
            $_SESSION['statusMsg'] = "Updated Roster!";
            redirect('pages/status');
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    public function adminRoster()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandler();
            return;
        }
        $data = $this->postModel->getNames();

        $this->view('roster/adminRoster', $data);
    }
}
