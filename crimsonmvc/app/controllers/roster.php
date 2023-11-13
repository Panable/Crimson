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

    public function isWorkingTodayRequest($id, $dayOfWeek, $rosterRequestID)
    {
        return $this->postModel->IsWorkingRequest($id, $dayOfWeek, $rosterRequestID);
    }

    private function postHandlerRequest()
    {
        try {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //$this->postModel->updateMainRoster($_POST);

            $this->postModel->makeRosterRequest($_POST);
            $_SESSION['statusHeader'] = "SUCCESS!";
            $_SESSION['statusMsg'] = "Roster Request Sent!";
            redirect('pages/status');
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Roster Request has Failed" . $e->getMessage();
            redirect('pages/status');
        }
    }

    private function postHandler()
    {
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
            $_SESSION['statusMsg'] = "Error updating roster" . $e->getMessage();
            redirect('pages/status');
        }
    }

    private function postRequestOptionHandler($id)
    {
        if (isset($_POST['accept'])) {

            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $this->postModel->acceptRosterRequest($id);
                $_SESSION['statusHeader'] = "SUCCESS!";
                $_SESSION['statusMsg'] = "Accepted Roster Request!";
                redirect('pages/status');
            } catch (Exception $e) {
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = "Error Accepting Roster Request" . $e->getMessage();
                redirect('pages/status');
            }
        } elseif (isset($_POST['deny'])) {
            try {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $this->postModel->denyRosterRequest($id);
                $_SESSION['statusHeader'] = "SUCCESS!";
                $_SESSION['statusMsg'] = "Denied Roster Request!";
                redirect('pages/status');
            } catch (Exception $e) {
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = "Denied Accepting Roster Request" . $e->getMessage();
                redirect('pages/status');
            }
        }
    }
    public function rosterRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandlerRequest();
            return;
        }
        $data = $this->postModel->getNames();

        $this->view('roster/rosterRequest', $data);
    }

    public function adminRoster()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandler();
            return;
        }
        $data = [];
        $data['roster'] = $this->postModel->getNames();
        $data['requests'] = $this->postModel->getRosterRequests();

        $this->view('roster/adminRoster', $data);
    }

    public function viewRosterRequest($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postRequestOptionHandler($id);
            return;
        }
        $data = [];
        $data['roster'] = $this->postModel->getNames();
        $data['rosterRequestID'] = $id;
        $data['nameOfRequest'] = $this->postModel->employeeRequestName($id);

        $this->view('roster/viewRosterRequest', $data);
    }
}
