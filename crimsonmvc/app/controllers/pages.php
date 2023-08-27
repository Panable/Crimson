<?php
class pages extends controller
{
    private $postModel;
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
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }
}
