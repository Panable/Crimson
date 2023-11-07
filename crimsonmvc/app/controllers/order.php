<?php
class order extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('ordermodel');
    }
}
