<?php
/*
 * Menu Class
 * Extends the base Controller class, handles menu-related operations
 */
class menu extends controller
{
    /*
     * Private method to send an error response
     * @param string $message - Error message to be included in the response
     */
    private function sendError($message)
    {
        // Construct a JSON response for an error
        $errorResponse = [
            'error' => [
                'message' => $message,
            ],
        ];

        // Set the HTTP response status code to indicate an error (e.g., 400 for Bad Request)
        http_response_code(400);

        // Set the Content-Type header to indicate JSON
        header('Content-Type: application/json');

        // Send the JSON response
        echo json_encode($errorResponse);
        exit;
    }

    /*
     * Method to handle menu creation
     */
    public function create()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize
                $putData = file_get_contents("php://input");

                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    // Parse the raw data as JSON
                    $putParams = json_decode($putData, true);
                    if ($putParams === null) {
                        throw new Exception("Failed to parse JSON data");
                    }
                } else {
                    parse_str($putData, $putParams);
                }

                // Sanitize the PUT data (apply htmlspecialchars or other filtering)
                $sanitizedData = array_map('htmlspecialchars', $putParams);

                // Attempt to create a new row
                $this->postModel->createRow('menu', $sanitizedData);

                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    $this->sendSuccess();
                } else {
                    // Set success session variables and redirect
                    $_SESSION['statusHeader'] = "SUCCESS";
                    $_SESSION['statusMsg'] = "Successfully created menu";
                    redirect('pages/status');
                }
            } else {
                $tableData = $this->postModel->getColumnNames('menu');
                $data = [
                    'tableData' => $tableData,
                    'tableName' => 'menu'
                ];
                $this->view('menu/create', $data);
            }
        } catch (Exception $e) {
            if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                $this->sendError($e->getMessage());
            } else {
                // Set error session variables and redirect
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = "Error Creating menu: " . $e->getMessage();
                redirect('pages/status');
            }
        }
    }

    /*
     * Private method to send a success response
     */
    private function sendSuccess()
    {
        // Construct a JSON response for success
        $successResponse = [
            'data' => [
                'message' => 'SUCCESS!',
                // You can include additional data as needed
            ],
        ];

        // Set the HTTP response status code to indicate success (e.g., 200 for OK)
        http_response_code(200);

        // Set the Content-Type header to indicate JSON
        header('Content-Type: application/json');

        // Send the JSON response
        echo json_encode($successResponse);
    }

    /*
     * Method to handle menu item deletion
     * @param int $id - ID of the menu item to be deleted
     */
    public function delete($id)
    {
        try {
            $this->postModel->deleteRow('menu', $id);
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendSuccess();
            } else {
                // Set success session variables and redirect
                $_SESSION['statusHeader'] = "SUCCESS";
                $_SESSION['statusMsg'] = "Deleted successfully id of: $id";
                redirect('pages/status');
            }
        } catch (Exception $e) {
            if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
                $this->sendError($e->getMessage());
            } else {
                // Set error session variables and redirect
                $_SESSION['statusHeader'] = "ERROR";
                $_SESSION['statusMsg'] = $e->getMessage();
                redirect('pages/status');
            }
        }
    }

    /*
     * Constructor method
     * Initializes the model for handling menu data
     */
    public function __construct()
    {
        $this->postModel = $this->model('menumodel');
    }

    /*
     * Method to handle the index page for the menu
     */
    public function index()
    {
        $menu = $this->postModel->getMenu();
        $data = [
            'title' => 'Menu: ',
            'menu' => $menu
        ];
        $this->view('menu/index', $data);
    }

    /*
     * Method to handle menu pickup
     */
    public function pickup()
    {
        try {
            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                setSession('UserCart', $_POST);
                redirect('order/usercheckout');
            } else {
                $menu = $this->postModel->getMenu();
                $data = [
                    'title' => 'Online Ordering:',
                    'menu' => $menu
                ];
                $this->view('menu/pickup', $data);
            }
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Method to handle menu waiter orders
     */
    public function waiter()
    {
        try {
            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                setSession('WaiterCart', $_POST);
                redirect('order/waiterCheckout');
            } else {
                $menu = $this->postModel->getMenu();
                $data = [
                    'title' => 'Online Ordering:',
                    'menu' => $menu
                ];
                $this->view('menu/waiter', $data);
            }
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Method to handle the admin page for the menu
     */
    public function admin()
    {
        $menu = $this->postModel->getMenu();
        $data = [
            'title' => 'Menu: ',
            'menu' => $menu
        ];
        $this->view('menu/admin', $data);
    }

    /*
     * Method to handle menu item editing
     * @param int $id - ID of the menu item to be edited
     */
    public function edit($id)
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT') {
                // Get the raw PUT data from the request
                $putData = file_get_contents("php://input");

                if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                    // Parse the raw data as JSON
                    $putParams = json_decode($putData, true);
                    if ($putParams === null) {
                        throw new Exception("Failed to parse JSON data");
                    }
                } else {
                    parse_str($putData, $putParams);
                }

                // Sanitize the PUT data (apply htmlspecialchars or other filtering)
                $sanitizedPutData = array_map('htmlspecialchars', $putParams);

                if (!isset($sanitizedPutData['id'])) {
                    $sanitizedPutData['id'] = $id;
                }

                // Attempt to edit the menu item
                $this->postModel->editRow('menu', $sanitizedPutData);

                if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
                    $this->sendSuccess();
                } else {
                    // Set success session variables and redirect
                    $_SESSION['statusHeader'] = "SUCCESS";
                    $_SESSION['statusMsg'] = "Successfully edited $id";
                    redirect('pages/status');
                }
            } else {
                // Get menu item data for editing
                $table = $this->postModel->readRow('menu', $id);

                $data = [
                    'tableName' => 'menu',
                    'menu' => $table
                ];
                $this->view('menu/edit', $data);
            }
        } catch (Exception $e) {
            // Set error session variables and redirect
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Method to handle reading menu data
     */
    public function read()
    {
        try {
            // Get menu data
            $table = $this->postModel->readTable('menu');

            // Check if the request method is GET and send JSON response
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo json_encode($table);
            }
        } catch (Exception $e) {
            // Check if the request method is GET and send JSON error response
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                if (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
                    $this->sendError($e->getMessage());
                }
            }
        }
    }
}
