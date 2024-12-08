<?php
// Include required files for database operations, user management, and session validation
include 'Database.php';
include 'User.php';
include 'ck_session.php';

// Create an instance of the Database class and establish a connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);

// Retrieve the list of users using the getUsers method
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Set the document type, character encoding, and viewport for responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title> <!-- Set the title of the webpage -->
</head>

<body>
    <!-- Create a table to display the user data -->
    <table border="1"> <!-- Add a border for the table -->
        <tr>
            <!-- Define the table headers -->
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        // Check if the result contains any rows
        if ($result->num_rows > 0) {

            // Loop through each row in the result set
            while ($row = $result->fetch_assoc()) {
                ?>
                <!-- Display the data in table rows -->
                <tr>
                    <td><?php echo $row["matric"]; ?></td> <!-- Display the matric value -->
                    <td><?php echo $row["name"]; ?></td> <!-- Display the name -->
                    <td><?php echo $row["role"]; ?></td> <!-- Display the user role -->
                    <!-- Add action links for updating and deleting the user -->
                    <td><a href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
                    <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>
                </tr>
                <?php
            }
        } else {
            // If no rows are found, display a message
            echo "<tr><td colspan='5'>No users found</td></tr>";
        }
        // Close the database connection
        $db->close();
        ?>
    </table>
</body>

</html>
