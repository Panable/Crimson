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

    public function createWaiterOrder($data)
    {
        $OrderID = -1;
        $OrderItemID = -1;
        $user_data = $data['user'];
        $item_data = $data['cart'];

        $orderSQL = "INSERT INTO Orders (TableNumber) VALUES (:TableNumber)";
        $onlineOrderSQL = "INSERT INTO OnlineOrders (Name, Phone_Number, OrderID) VALUES (:Name, :Phone_Number, :OrderID)";
        $orderItemSQL = "INSERT INTO OrderItems (OrderID, ItemID, Quantity) VALUES (:OrderID, :ItemID, :Quantity)";

        try {

            //order
            $this->db->query($orderSQL);
            $this->db->bind(':TableNumber', $user_data['TableNumber']);
            $this->db->execute();
            $OrderID = (int) $this->db->getLastInsertID();

            //orderitem
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

    public function createOnlineOrder($data)
    {
        $OnlineOrderID = -1;
        $OrderID = -1;
        $OrderItemID = -1;
        $user_data = $data['user'];
        $item_data = $data['cart'];

        $orderSQL = "INSERT INTO Orders (TableNumber) VALUES (NULL)";
        $onlineOrderSQL = "INSERT INTO OnlineOrders (Name, Phone_Number, OrderID) VALUES (:Name, :Phone_Number, :OrderID)";
        $orderItemSQL = "INSERT INTO OrderItems (OrderID, ItemID, Quantity) VALUES (:OrderID, :ItemID, :Quantity)";

        try {

            //order
            $this->db->query($orderSQL);
            $this->db->execute();
            $OrderID = (int) $this->db->getLastInsertID();

            //onlineorder
            $this->db->query($onlineOrderSQL);
            $this->db->bind(':Name', $user_data['Name']);
            $this->db->bind(':Phone_Number', $user_data['Phone_Number']);
            $this->db->bind(':OrderID', $OrderID);
            $this->db->execute();
            $OnlineOrderID = (int) $this->db->getLastInsertID();


            //orderitem
            foreach ($item_data as $item) {
                $this->db->query($orderItemSQL);
                $this->db->bind(':OrderID', $OrderID);
                $this->db->bind(':ItemID', $item->id);
                $this->db->bind(':Quantity', $item->quantity);
                $this->db->execute();
            }

            return $OnlineOrderID;
            // Check if a row was inserted (success)
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function insertOrder($data)
    {
        unset($data['ID']);
        unset($data['id']);

        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));


        // Construct the SQL query for insertion
        $sql = "INSERT INTO Orders ($columns) VALUES ($placeholders)";

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
}
