<?php
include 'ck_session.php'; // Include the session check file to ensure only authenticated users can access this page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Set the document's character encoding, viewport settings, and title -->
    <meta charset="UTF-8"> <!-- Specify the character encoding as UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Make the page responsive to all devices -->
    <title>Document</title> <!-- Define the title of the page -->
</head>

<body>
    <!-- Create a form to collect user input for inserting data -->
    <form action="insert.php" method="post"> <!-- Set the form action to 'insert.php' and method to POST -->

        <!-- Input field for matric -->
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required> <!-- Input is required -->
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Input field for name -->
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required> <!-- Input is required -->
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Input field for password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required> <!-- Input is required -->
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Dropdown for selecting role -->
        <label for="role">Role:</label>
        <select name="role" id="role" required> <!-- Dropdown selection is required -->
            <option value="">Please select</option> <!-- Default option -->
            <option value="lecturer">Lecturer</option> <!-- Option for lecturer -->
            <option value="student">Student</option> <!-- Option for student -->
        </select>
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Submit button -->
        <input type="submit" name="submit" value="Submit"> <!-- Submit form data -->
    </form>
</body>

</html>

