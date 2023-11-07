<?php
class bookingmodel extends model
{
    public function getMenu()
    {
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }

    public function insertBooking($data)
    {
        unset($data['id']);

        // Generate placeholders for the columns and values
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Construct the SQL query for insertion
        $sql = "INSERT INTO OnlineBookings ($columns) VALUES ($placeholders)";

        try {
            $this->db->query($sql);

            // Bind the data values
            foreach ($data as $column => $value) {
                $this->db->bind(":$column", $value);
            }

            // Execute the query
            $this->db->execute();

            // Check if a row was inserted (success)
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getColumnNames()
    {
        try {
            $sql = "SHOW COLUMNS FROM OnlineBookings";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
