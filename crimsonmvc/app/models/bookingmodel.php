<?php
/*
 * BookingModel Class
 * Extends the base Model class, handles database operations related to bookings
 */

class bookingmodel extends model
{
    // Method to retrieve menu items from the database
    public function getMenu()
    {
        // Prepare and execute a query to select all records from the 'menu' table
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }

    // Method to insert booking data into the 'OnlineBookings' table
    public function insertBooking($data)
    {
        // Remove the 'id' field from the data array
        unset($data['id']);

        // Generate placeholders for the columns and values
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Construct the SQL query for insertion
        $sql = "INSERT INTO OnlineBookings ($columns) VALUES ($placeholders)";

        try {
            // Set the query in the database handler
            $this->db->query($sql);

            // Bind the data values to the placeholders
            foreach ($data as $column => $value) {
                $this->db->bind(":$column", $value);
            }

            // Execute the query
            $this->db->execute();

            // Check if a row was inserted (success)

        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to get the column names of the 'OnlineBookings' table
    public function getColumnNames()
    {
        try {
            // Execute a query to show the columns from the 'OnlineBookings' table
            $sql = "SHOW COLUMNS FROM OnlineBookings";
            $this->db->query($sql);

            // Get and return the result set
            $result = $this->db->resultSet();
            return $result;

        } catch (PDOException $e) {
            // Catch and throw an exception for any database errors
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
