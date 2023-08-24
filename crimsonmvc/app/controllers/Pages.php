<?php
class Pages
{
    public function __construct()
    {
    }

    public function index()
    {
        echo "you are on pages.index";
    }

    public function about($id)
    {
        echo "about loaded " . $id;
    }
}
