<?php
class menumodel
{
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }
}
