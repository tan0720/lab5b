<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Specify the document type and define the language as English -->
    <meta charset="UTF-8"> <!-- Set the character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Ensure proper display on all devices -->
    <title>Document</title> <!-- Set the title of the webpage -->
</head>

<body>
    <!-- Display a heading for the login page -->
    <h1>Login Page</h1>

    <!-- Create a form for user login -->
    <form action="authenticate.php" method="post"> <!-- Set the form's action to 'authenticate.php' and method to POST -->

        <!-- Create a label and input field for the matric value -->
        <label for="matric">Matric:</label>
        <input type="text" name="matric" id="matric" required> <!-- Input field for matric is required -->
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Create a label and input field for the password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required> <!-- Input field for password is required -->
        <br><br> <!-- Add line breaks for spacing -->

        <!-- Add a submit button to send the form data -->
        <input type="submit" name="submit" value="Submit">

        <!-- Add a link to the registration page -->
        <p><a href="register_form.php" class="register-link">Register</a> here if you have not.</p>
    </form>
</body>

</html>
