<?php
    // tart a session to check the login state
    session_start();

    // Check if the session is null or if the login status is not valid
    if ($_SESSION == null || $_SESSION["login"] == null || $_SESSION["login"] != true) {

        // Display an alert message indicating the user must log in
        echo '<script>alert("U must login")</script>';

        // Reset the login status in the session to null
        $_SESSION["login"] = null;

        // Unset all session variables
        unset($_SESSION);

        // Destroy the session to clear all session data
        session_destroy();

        // Redirect the user to the login page using JavaScript
        echo "<script>window.location.href = 'login.php'</script>";

        // Stop further execution of the script after redirection
        exit();
    }
?>
