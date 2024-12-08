<?php
class User
{
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create a new user
    public function createUser($matric, $name, $password, $role)
    {
        // Hash the password using bcrypt for security
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert a new user into the database
        $sql = "INSERT INTO users (matric, name, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        // Check if the statement is prepared correctly
        if ($stmt) {
            // Bind parameters to the query
            $stmt->bind_param("ssss", $matric, $name, $password, $role);
            // Execute the query
            $result = $stmt->execute();

            // Check if the insertion was successful
            if ($result) {
                return true;  // Successfully inserted
            } else {
                return "Error: " . $stmt->error;  // Return error message if insertion fails
            }

            $stmt->close();  // Close the statement
        } else {
            return "Error: " . $this->conn->error;  // Return connection error if statement fails
        }
    }

    // Read all users
    public function getUsers()
    {
        $sql = "SELECT matric, name, role FROM users";  // Select matric, name, and role from users
        $result = $this->conn->query($sql);  // Execute the query
        return $result;  // Return the result set
    }

    // Read a single user by matric
    public function getUser($matric)
    {
        $sql = "SELECT * FROM users WHERE matric = ?";  // Query to fetch a user by matric
        $stmt = $this->conn->prepare($sql);  // Prepare the statement

        if ($stmt) {
            $stmt->bind_param("s", $matric);  // Bind the matric parameter
            $stmt->execute();  // Execute the query
            $result = $stmt->get_result();  // Get the result set
            $user = $result->fetch_assoc();  // Fetch the user data as an associative array

            $stmt->close();  // Close the statement
            return $user;  // Return the user data
        } else {
            return "Error: " . $this->conn->error;  // Return error if query preparation fails
        }
    }

    // Update a user's information
    public function updateUser($matric, $name, $role)
    {
        $sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";  // SQL query to update user details
        $stmt = $this->conn->prepare($sql);  // Prepare the statement

        if ($stmt) {
            $stmt->bind_param("sss", $name, $role, $matric);  // Bind parameters for name, role, and matric
            $result = $stmt->execute();  // Execute the query

            // Check if the update was successful
            if ($result) {
                return true;  // Successfully updated
            } else {
                return "Error: " . $stmt->error;  // Return error message if update fails
            }

            $stmt->close();  // Close the statement
        } else {
            return "Error: " . $this->conn->error;  // Return error if query preparation fails
        }
    }

    // Delete a user by matric
    public function deleteUser($matric)
    {
        $sql = "DELETE FROM users WHERE matric = ?";  // SQL query to delete a user by matric
        $stmt = $this->conn->prepare($sql);  // Prepare the statement

        if ($stmt) {
            $stmt->bind_param("s", $matric);  // Bind the matric parameter
            $result = $stmt->execute();  // Execute the query

            // Check if the deletion was successful
            if ($result) {
                return true;  // Successfully deleted
            } else {
                return "Error: " . $stmt->error;  // Return error message if deletion fails
            }

            $stmt->close();  // Close the statement
        } else {
            return "Error: " . $this->conn->error;  // Return error if query preparation fails
        }
    }
}
?>
