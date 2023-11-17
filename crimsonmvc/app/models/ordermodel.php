<?php
/*
 * OrderModel Class
 * Extends the base Model class, handles database operations related to orders
 */

class ordermodel extends model
{
    // Method to retrieve menu items from the 'menu' table
    public function getMenu()
    {
        // Prepare and execute a query to select all records from the 'menu' table
        $this->db->query("SELECT * FROM menu");
        return $this->db->resultSet();
    }

    // Method to get the name and price of items based on provided IDs
    public function getNamePrice($ids)
    {
        $sql = 'SELECT id, name, price FROM menu WHERE id IN (' . $ids . ')';
        $this->db->query($sql);
        $this->db->execute();
        $result = $this->db->resultSet();
        return $result;
    }

    // Method to create a waiter order in the database
    public function createWaiterOrder($data)
    {
        $OrderID = -1;

        // Extract user and item data from the provided data array
        $user_data = $data['user'];
        $item_data = $data['cart'];

        $orderSQL = "INSERT INTO Orders (TableNumber) VALUES (:TableNumber)";
        $orderItemSQL = "INSERT INTO OrderItems (OrderID, ItemID, Quantity) VALUES (:OrderID, :ItemID, :Quantity)";

        try {
            // Insert order record
            $this->db->query($orderSQL);
            $this->db->bind(':TableNumber', $user_data['TableNumber']);
            $this->db->execute();
            $OrderID = (int) $this->db->getLastInsertID();

            // Insert order item records
            foreach ($item_data as $item) {
                $this->db->query($orderItemSQL);
                $this->db->bind(':OrderID', $OrderID);
                $this->db->bind(':ItemID', $item->id);
                $this->db->bind(':Quantity', $item->quantity);
                $this->db->execute();
            }
            // Check if a row was inserted (success)
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to create an online order in the database
    public function createOnlineOrder($data)
    {
        $OnlineOrderID = -1;
        $OrderID = -1;

        // Extract user and item data from the provided data array
        $user_data = $data['user'];
        $item_data = $data['cart'];

        $orderSQL = "INSERT INTO Orders (TableNumber) VALUES (NULL)";
        $onlineOrderSQL = "INSERT INTO OnlineOrders (Name, Phone_Number, OrderID) VALUES (:Name, :Phone_Number, :OrderID)";
        $orderItemSQL = "INSERT INTO OrderItems (OrderID, ItemID, Quantity) VALUES (:OrderID, :ItemID, :Quantity)";

        try {
            // Insert order record
            $this->db->query($orderSQL);
            $this->db->execute();
            $OrderID = (int) $this->db->getLastInsertID();

            // Insert online order record
            $this->db->query($onlineOrderSQL);
            $this->db->bind(':Name', $user_data['Name']);
            $this->db->bind(':Phone_Number', $user_data['Phone_Number']);
            $this->db->bind(':OrderID', $OrderID);
            $this->db->execute();
            $OnlineOrderID = (int) $this->db->getLastInsertID();

            // Insert order item records
            foreach ($item_data as $item) {
                $this->db->query($orderItemSQL);
                $this->db->bind(':OrderID', $OrderID);
                $this->db->bind(':ItemID', $item->id);
                $this->db->bind(':Quantity', $item->quantity);
                $this->db->execute();
            }

            // Return the ID of the online order
            return $OnlineOrderID;
            // Check if a row was inserted (success)
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to insert an order into the 'Orders' table
    public function insertOrder($data)
    {
        // Remove 'ID' and 'id' from the data
        unset($data['ID']);
        unset($data['id']);

        // Generate placeholders for the columns and values
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        // Construct the SQL query for insertion
        $sql = "INSERT INTO Orders ($columns) VALUES ($placeholders)";

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
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}
