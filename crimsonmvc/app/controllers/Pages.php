<?php
class Pages extends Controller
{
    private $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Menu');
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
        $this->view('pages/index', $data);
    }
}
