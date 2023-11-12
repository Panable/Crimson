<?php

class rostermodel extends model
{
    function getNames()
    {
        $this->db->query("SELECT ID, Name FROM Employees");
        return $this->db->resultSet();
    }

    function isWorking($id, $dayOfWeek)
    {
        $sql =  "SELECT * FROM Roster WHERE EmployeeID = :id AND DayOfWeek = :dayOfWeek";

        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->bind(':dayOfWeek', $dayOfWeek);
        $this->db->execute();

        // Check if any rows were affected (success)
        if ($this->db->rowCount() == 0)
            return false;

        return true;
    }

    function updateMainRoster($data)
    {
        try {

            //delete all records from roster

            $deleteSql = "DELETE FROM Roster";
            $this->db->query($deleteSql);
            $this->db->execute();

            foreach ($data as $day => $employees) {
                foreach ($employees as $id) {
                    $sql = "INSERT INTO Roster(EmployeeID, DayOfWeek) Values ($id, $day)";
                    $this->db->query($sql);
                    $this->db->execute();
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
