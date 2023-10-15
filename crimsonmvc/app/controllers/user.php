<?php

class user extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('usermodel');
    }

    public function login()
    {
        $this->view('login/login');
    }
}
