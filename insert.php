<?php
// Include required files for database operations, user management, and session checks
include 'Database.php';
include 'User.php';
include 'ck_session.php';

// Create an instance of the Database class and establish a database connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Register the user by calling the createUser method and passing POST data
$user->createUser($_POST['matric'], $_POST['name'], $_POST['password'], $_POST['role']);

// Redirect the user to show_table.php after successful registration
header("Location: show_table.php");
exit();  // Ensure no further code is executed after the redirection

// Close the database connection
$db->close();



