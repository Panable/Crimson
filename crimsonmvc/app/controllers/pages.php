<?php
class pages extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('menumodel');
    }

    public function index()
    {
        $posts = $this->postModel->getMenu();
        $data = [
            'title' => 'Welcome',
            'menu' => $posts
        ];
        if (isLoggedIn()) {
            $this->view('pages/controlpanel', $data);
        } else {
            $this->view('pages/index', $data);
        }
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    public function status()
    {
        $this->view('pages/status');
    }
}
