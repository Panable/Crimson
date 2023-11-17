<?php
/*
 * usermodel Class
 * Handles user-related database operations
 */
class usermodel extends model
{
    /*
     * Method to attempt user login using provided email and password
     * @param string $email - User's email address
     * @param string $password - User's password
     * @return mixed - Returns user data if login is successful, otherwise returns false
     */
    public function login($email, $password)
    {
        // Check if user with the provided email exists
        if (!$this->findUserByEmail($email)) {
            return false;
        }

        // Query to retrieve user data based on email
        $this->db->query('SELECT * FROM Employees WHERE Email = :email');
        $this->db->bind(':email', $email);

        // Fetch the user data
        $row = $this->db->single();

        // Retrieve hashed password from the database
        $hashed_password = $row->Password;

        // Verify provided password against the hashed password
        if (password_verify($password, $hashed_password)) {
            return $row; // Return user data if password is correct
        } else {
            return false; // Return false if password is incorrect
        }
    }

    /*
     * Method to check if a user with the provided email exists
     * @param string $email - User's email address
     * @return bool - Returns true if user exists, otherwise returns false
     */
    public function findUserByEmail($email)
    {
        // Query to check if a user with the provided email exists
        $this->db->query('SELECT * FROM Employees WHERE Email = :email');

        // Bind the email value
        $this->db->bind(':email', $email);

        // Fetch a single row
        $row = $this->db->single();

        // Check if any rows were affected (user with the given email found)
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
