<?php
// Include required files for database operations, user management, and session checks
include 'Database.php';
include 'User.php';
include 'ck_session.php';

// Check if the request method is GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Retrieve the 'matric' value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and establish a database connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Call the deleteUser method of the User class to delete the user with the given matric
    $user->deleteUser($matric);

    // Close the database connection
    $db->close();
}
