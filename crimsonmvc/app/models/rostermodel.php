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

    function isWorkingRequest($id, $dayOfWeek, $rosterRequestID)
    {
        $sql = "SELECT * FROM RosterRequestItems WHERE EmployeeID = :id AND DayOfWeek = :dayOfWeek AND RosterRequestID = :rosterRequestID";

        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->bind(':dayOfWeek', $dayOfWeek);
        $this->db->bind(':rosterRequestID', $rosterRequestID);
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

    function acceptRosterRequest($rosterRequestID)
    {
        try {
            // Delete records from Roster
            $deleteRosterSql = "DELETE FROM Roster";
            $this->db->query($deleteRosterSql);
            $this->db->execute();

            // Insert records from RosterRequestItems to Roster
            $insertRosterSql = "
            INSERT INTO Roster (EmployeeID, DayOfWeek)
            SELECT EmployeeID, DayOfWeek FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID
        ";
            $this->db->query($insertRosterSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete records from RosterRequestItems
            $deleteItemsSql = "DELETE FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID";
            $this->db->query($deleteItemsSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete record from RosterRequest
            $deleteRequestSql = "DELETE FROM RosterRequest WHERE ID = :rosterRequestID";
            $this->db->query($deleteRequestSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function denyRosterRequest($rosterRequestID)
    {
        try {
            // Delete records from RosterRequestItems
            $deleteItemsSql = "DELETE FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID";
            $this->db->query($deleteItemsSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete record from RosterRequest
            $deleteRequestSql = "DELETE FROM RosterRequest WHERE ID = :rosterRequestID";
            $this->db->query($deleteRequestSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function getRosterRequests()
    {
        try {
            $sql = "
                SELECT Employees.Name, RosterRequest.ID AS RosterRequestID
                FROM Employees
                JOIN RosterRequest ON Employees.ID = RosterRequest.EmployeeID;
               ";

            $this->db->query($sql);

            return $this->db->resultSet();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function employeeRequestName($rosterRequestID)
    {
        try {
            $sql = "
            SELECT Employees.Name, RosterRequest.ID AS RosterRequestID
            FROM Employees
            JOIN RosterRequest ON Employees.ID = RosterRequest.EmployeeID
            WHERE RosterRequest.ID = :rosterRequestID;
        ";

            $this->db->query($sql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);

            return $this->db->single();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    function getRosterRequestItems($rosterRequestID)
    {
        //sql query should get all the items

    }

    function makeRosterRequest($data)
    {
        $requestEmployeeID = getSession('user_id');
        try {

            $rosterRequestSql = "INSERT INTO RosterRequest(EmployeeID) Values($requestEmployeeID)";
            $this->db->query($rosterRequestSql);
            $this->db->execute();
            $rosterRequestID = (int) $this->db->getLastInsertID();
            //delete all records from roster

            foreach ($data as $day => $employees) {
                foreach ($employees as $id) {
                    $sql = "INSERT INTO RosterRequestItems(EmployeeID, DayOfWeek, RosterRequestID) Values ($id, $day, $rosterRequestID)";
                    $this->db->query($sql);
                    $this->db->execute();
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
