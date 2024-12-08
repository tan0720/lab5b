<?php
// Define the Database class
class Database
{
    // Declare private properties for database credentials
    private $host = "localhost";       // Hostname of the database server
    private $db_name = "lab_5b";       // Name of the database
    private $username = "root";        // Database username
    private $password = "";            // Database password
    public $conn;                      // Property to store the database connection

    // Define a method to establish and return the database connection
    public function getConnection()
    {
        // Initialize the connection using mysqli and class properties
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Check if the connection was successful
        if ($this->conn->connect_error) {
            // If the connection fails, terminate the script and show the error
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            // Indicate a successful connection (commented out)
            // echo "Connected successfully";
        }

        // Return the connection object
        return $this->conn;
    }
}
