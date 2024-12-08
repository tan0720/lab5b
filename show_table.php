<?php
// Include necessary files for database connection, user management, and session validation
include 'Database.php';  // Database connection
include 'User.php';      // User class for handling user data
include 'ck_session.php'; // Session validation to ensure the user is logged in

// Create an instance of the Database class and establish a connection
$database = new Database();
$db = $database->getConnection();  // Get the database connection

// Create an instance of the User class
$user = new User($db);

// Retrieve all users from the database
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Set up the document's metadata (character set, viewport, title) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title> <!-- Title of the page -->
</head>

<body>
    <!-- Create a table to display the list of users -->
    <table border="1"> <!-- Add a border to the table -->
        <tr>
            <!-- Define the table headers -->
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
        </tr>

        <?php
        // Check if there are any users returned from the database
        if ($result->num_rows > 0) {
            // Loop through each row and display the user's data
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Display each user's data in a new row -->
                <tr>
                    <td><?php echo $row["matric"]; ?></td> <!-- Display matric number -->
                    <td><?php echo $row["name"]; ?></td>   <!-- Display name -->
                    <td><?php echo $row["role"]; ?></td>   <!-- Display role -->
                </tr>
                <?php
            }
        } else {
            // If no users are found, display a message
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }

        // Close the database connection
        $db->close();
        ?>
    </table>
</body>

</html>
