<?php
class ordermodel extends model
{
    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }

    public function getNamePrice($ids)
    {
        $sql = 'SELECT id, name, price FROM menu WHERE id IN (' . $ids . ')';
        $this->db->query($sql);
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }
}
