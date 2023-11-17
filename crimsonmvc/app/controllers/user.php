<?php

/*
 * User Class
 * Extends the base Controller class, handles user-related functionality
 */
class user extends controller
{
    /*
     * Constructor method
     * Initializes the model for handling user data
     */
    public function __construct()
    {
        $this->postModel = $this->model('usermodel');
    }

    /*
     * Method to check if there are credential errors in the data
     */
    private function hasCredentialErrors($data)
    {
        if (!empty($data['email_err']) || !empty($data['password_err'])) {
            return true;
        }
        return false;
    }

    /*
     * Method to handle the login process
     */
    public function login()
    {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize
            $_POST = array_map("htmlspecialchars", $_POST);
            
            // Initialize data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for credential errors
            if ($this->hasCredentialErrors($data)) {
                $this->view('user/login', $data);
            }

            // Attempt to login
            $user = $this->postModel->login($data['email'], $data['password']);

            if ($user) {
                // SUCCESS
                $this->createUserSession($user);
            } else {
                $data['password_err'] = 'Incorrect Credentials';
                $this->view('user/login', $data);
            }
        }

        $data = [
            'name' => '',
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
        ];
        $this->view('user/login');
    }

    /*
     * Method to create user session upon successful login
     */
    public function createUserSession($user)
    {
        setSession('user_id', $user->ID);
        setSession('user_email', $user->Email);
        setSession('user_name', $user->Name);
        setSession('user_position', $user->Position);
        redirect('pages/index');
    }

    /*
     * Method to handle user logout
     */
    public function logout()
    {
        unsetSession('user_id');
        unsetSession('user_email');
        unsetSession('user_name');
        unsetSession('user_position');

        session_destroy();
        redirect('pages/index');
    }

    /*
     * Method to check if a user is logged in
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
