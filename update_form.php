<?php
// Include necessary files for database connection, user management, and session validation
include 'Database.php';  // Include the Database class for DB connection
include 'User.php';      // Include the User class for user operations
include 'ck_session.php'; // Include the session check to ensure the user is logged in

// Check if the matric value is provided in the GET request
if (isset($_GET['matric']) && $_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    // Create an instance of the User class
    $user = new User($db);

    // Fetch the user details using the matric value
    $userDetails = $user->getUser($matric);

    // Check if the user details were fetched successfully
    if ($userDetails) {
        // Display the update form with the fetched user data
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update User</title> <!-- Title of the page -->
        </head>

        <body>
            <!-- Form to update the user data -->
            <form action="update.php" method="post">
                <label for="matric">Matric:</label>
                <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($userDetails['matric']); ?>"><br><br> <!-- Pre-fill matric number -->
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>"><br><br> <!-- Pre-fill name -->

                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="">Please select</option>
                    <!-- Set selected option based on the current role of the user -->
                    <option value="lecturer" <?php echo ($userDetails['role'] == 'lecturer') ? 'selected' : ''; ?>>Lecturer</option>
                    <option value="student" <?php echo ($userDetails['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
                </select><br><br>

                <input type="submit" value="Update"> <!-- Submit button for updating the user -->
                <a href="read.php">Cancel</a> <!-- Link to go back to the list of users without saving changes -->
            </form>
        </body>

        </html>
        <?php
    } else {
        // Display a message if no user is found
        echo "User not found.";
    }

    // Close the database connection
    $db->close();
} else {
    // Handle invalid requests where matric is not provided in the GET request
    echo "Invalid request.";
}
?>
