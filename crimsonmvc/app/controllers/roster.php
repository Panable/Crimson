<?php
class roster extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('rostermodel');
    }

    public function adminRoster()
    {

        $this->view('roster/adminRoster');
    }
}
