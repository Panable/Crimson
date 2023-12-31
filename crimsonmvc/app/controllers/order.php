<?php
/*
 * Order Class
 * Extends the base Controller class, handles order-related operations
 */
class order extends controller
{
    /*
     * Constructor method
     * Initializes the model for handling order data
     */
    public function __construct()
    {
        $this->postModel = $this->model('ordermodel');
    }

    /*
     * Private method to generate waiter cart data for checkout
     * @return array - Array containing items and total for the waiter's cart
     */
    private function generateWaiterCartData()
    {
        $raw_data = getSession('WaiterCart');
        $ids = '';
        $total = 0;

        foreach ($raw_data as $key => $value) {
            if ($value == '0')
                continue;
            if (empty($ids))
                $ids = $key;
            else
                $ids = $ids . ',' . $key;
        }

        if (empty($ids))
            redirect('menu/pickup');

        $raw_table_data = $this->postModel->getNamePrice($ids);

        foreach ($raw_table_data as $item) {
            $item->quantity = $raw_data[$item->id];
            $item->total = round((float) $item->quantity * (float) $item->price, 2);
            $total += $item->total;
        }

        $data['items'] = $raw_table_data;
        $data['total'] = $total;
        return $data;
    }

    /*
     * Private method to generate user cart data for checkout
     * @return array - Array containing items and total for the user's cart
     */
    private function generateUserCartData()
    {
        $raw_data = getSession('UserCart');
        $ids = '';
        $total = 0;

        foreach ($raw_data as $key => $value) {
            if ($value == '0')
                continue;
            if (empty($ids))
                $ids = $key;
            else
                $ids = $ids . ',' . $key;
        }

        if (empty($ids))
            redirect('menu/pickup');

        $raw_table_data = $this->postModel->getNamePrice($ids);

        foreach ($raw_table_data as $item) {
            $item->quantity = $raw_data[$item->id];
            $item->total = round((float) $item->quantity * (float) $item->price, 2);
            $total += $item->total;
        }

        $data['items'] = $raw_table_data;
        $data['total'] = $total;
        return $data;
    }

    /*
     * Private method to handle waiter-specific order processing
     */
    private function waiterPostHandler()
    {
        try {
            $create_data = [];

            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user_data['TableNumber'] = trim($_POST['TableNumber']);

            $previous_data = $this->generateWaiterCartData();
            $cart_data = $previous_data['items'];

            $create_data['user'] = $user_data;
            $create_data['cart'] = $cart_data;

            $order_number = $this->postModel->createWaiterOrder($create_data);

            unsetSession('WaiterCart');
            unset($_POST);

            $_SESSION['statusHeader'] = "SUCCESS";
            $_SESSION['statusMsg'] = "Your Order has been successfully placed! Table Number is " . $user_data["TableNumber"];
            redirect('pages/status');
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Private method to handle general order processing
     */
    private function postHandler()
    {
        try {
            $create_data = [];

            // Sanitize $_POST data
            //FILTER_SANITIZE_FULL_SPECIAL_CHARS
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user_data['Phone_Number'] = trim($_POST['Phone_Number']);
            $user_data['Name'] = trim($_POST['Name']);

            $previous_data = $this->generateUserCartData();
            $cart_data = $previous_data['items'];

            $create_data['user'] = $user_data;
            $create_data['cart'] = $cart_data;

            $order_number = $this->postModel->createOnlineOrder($create_data);

            unsetSession('UserCart');
            unset($_POST);

            $_SESSION['statusHeader'] = "SUCCESS";
            $_SESSION['statusMsg'] = "Your Order has been successfully placed! Your Order Number is: " . $order_number;
            redirect('pages/status');
        } catch (Exception $e) {
            $_SESSION['statusHeader'] = "ERROR";
            $_SESSION['statusMsg'] = "Error Booking Table: " . $e->getMessage();
            redirect('pages/status');
        }
    }

    /*
     * Method to handle waiter checkout
     * Shows the checkout page for waiter orders and processes the order on submission
     */
    public function waiterCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->waiterPostHandler();
        } else {
            $data = $this->generateWaiterCartData();
            $this->view('order/waiterCheckout', $data);
        }
    }

    /*
     * Method to handle user checkout
     * Shows the checkout page for online orders and processes the order on submission
     */
    public function userCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postHandler();
        } else {
            $data = $this->generateUserCartData();
            $this->view('order/userCheckout', $data);
        }
    }
}
