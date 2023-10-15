<?php

class user extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('usermodel');
    }

    private function hasCredentialErrors($data)
    {
        if (!empty($data['email_err']) || !empty($data['password_err']))
            return true;
        return false;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //sanitize
            $_POST = array_map("htmlspecialchars", $_POST);
            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if ($this->hasCredentialErrors($data)) {
                $this->view('user/login', $data);
            }

            if ($this->postModel->login($data['email'], $data['password']))
            {
                die('Logged in!');
            }
            else
            {
                $data['password_err'] = 'Incorrect Credentials';
                $this->view('user/login', $data);
            }
        }
        $this->view('user/login');
    }
}
