<?php
// Include necessary files for database connection, user management, and session validation
include 'Database.php';  // Include the Database class to handle DB connection
include 'User.php';      // Include the User class to manage user operations
include 'ck_session.php'; // Include the session check to ensure the user is logged in

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];  // Get the matric number from the form
    $name = $_POST['name'];      // Get the name from the form
    $role = $_POST['role'];      // Get the role from the form

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection(); // Establish the database connection

    // Create an instance of the User class
    $user = new User($db);

    // Update the user data using the User class's updateUser method
    $user->updateUser($matric, $name, $role);  // Pass the matric, name, and role to updateUser method

    // Close the database connection
    $db->close(); // Close the database connection after the operation
}
?>
