<?php
class Menu
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }
}
