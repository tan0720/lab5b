<?php

// Include necessary files for database and user management
include 'Database.php';
include 'User.php';

// Start a session to manage user login state
session_start();

// Check if the form is submitted via POST method
if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {

    // Create a database connection
    $database = new Database();
    $db = $database->getConnection();

    // SSanitize inputs using mysqli_real_escape_string to prevent SQL injection
    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    // Validate inputs to ensure required fields are not empty
    if (!empty($matric) && !empty($password)) {

        // Create a User object and fetch user details based on the matric
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        // Check if the user exists and verify the password using password_verify
        if ($userDetails && password_verify($password, $userDetails['password'])) {

            // Set session variable to indicate successful login
            $_SESSION["login"] = true;

            // Display a success message (optional)
            echo 'Login Successful';

            // Redirect to read.php after successful login
            header("Location: read.php");
            exit();  // Ensure no further code is executed after the redirection
        } else {
            // Handle invalid credentials
            echo 'Invalid username or password, try <a href="login.php">login</a> again.';
        }
    } else {
        // Handle missing input fields
        echo 'Please fill in all required fields.';
    }
}
