<?php
/*
 * RosterModel Class
 * Extends the base Model class, handles database operations related to employee rosters
 */

class rostermodel extends model
{
    // Method to retrieve employee names and IDs from the 'Employees' table
    function getNames()
    {
        $this->db->query("SELECT ID, Name FROM Employees");
        return $this->db->resultSet();
    }

    // Method to check if an employee is scheduled to work on a specific day of the week
    function isWorking($id, $dayOfWeek)
    {
        $sql = "SELECT * FROM Roster WHERE EmployeeID = :id AND DayOfWeek = :dayOfWeek";

        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $this->db->bind(':dayOfWeek', $dayOfWeek);
        $this->db->execute();

        // Check if any rows were affected (success)
        if ($this->db->rowCount() == 0)
            return false;

        return true;
    }

    // Method to check if an employee has a roster request for a specific day of the week and roster request ID
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

    // Method to update the main roster based on provided data
    function updateMainRoster($data)
    {
        try {
            // Delete all records from the 'Roster' table
            $deleteSql = "DELETE FROM Roster";
            $this->db->query($deleteSql);
            $this->db->execute();

            // Insert new records into the 'Roster' table
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

    // Method to accept a roster request, updating the 'Roster' and related tables
    function acceptRosterRequest($rosterRequestID)
    {
        try {
            // Delete records from 'Roster'
            $deleteRosterSql = "DELETE FROM Roster";
            $this->db->query($deleteRosterSql);
            $this->db->execute();

            // Insert records from 'RosterRequestItems' to 'Roster'
            $insertRosterSql = "INSERT INTO Roster (EmployeeID, DayOfWeek) SELECT EmployeeID, DayOfWeek FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID";
            $this->db->query($insertRosterSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete records from 'RosterRequestItems'
            $deleteItemsSql = "DELETE FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID";
            $this->db->query($deleteItemsSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete record from 'RosterRequest'
            $deleteRequestSql = "DELETE FROM RosterRequest WHERE ID = :rosterRequestID";
            $this->db->query($deleteRequestSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to deny a roster request, updating the 'RosterRequestItems' and 'RosterRequest' tables
    function denyRosterRequest($rosterRequestID)
    {
        try {
            // Delete records from 'RosterRequestItems'
            $deleteItemsSql = "DELETE FROM RosterRequestItems WHERE RosterRequestID = :rosterRequestID";
            $this->db->query($deleteItemsSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();

            // Delete record from 'RosterRequest'
            $deleteRequestSql = "DELETE FROM RosterRequest WHERE ID = :rosterRequestID";
            $this->db->query($deleteRequestSql);
            $this->db->bind(':rosterRequestID', $rosterRequestID);
            $this->db->execute();
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to get roster requests along with employee names
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

    // Method to get the name of the employee making a roster request
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

    // Placeholder method for getting roster request items; needs implementation
    function getRosterRequestItems($rosterRequestID)
    {
        // Placeholder: SQL query should be implemented to get all the items
    }

    // Method to create a roster request, adding records to 'RosterRequest' and 'RosterRequestItems' tables
    function makeRosterRequest($data)
    {
        $requestEmployeeID = getSession('user_id');
        try {
            // Insert a record into 'RosterRequest'
            $rosterRequestSql = "INSERT INTO RosterRequest(EmployeeID) Values($request
