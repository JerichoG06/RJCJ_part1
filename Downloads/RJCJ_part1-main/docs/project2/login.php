<?php
session_start(); 
define('ALLOW_SETTINGS', true); 
require_once("settings.php"); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the form was submitted using the POST method
    $input_username = trim($_POST['username']); 
    $input_password = trim($_POST['password']); 
    // Retrieve and trim the submitted username and password

    $stmt = $conn->prepare("SELECT * FROM managers WHERE username = ?"); // Prepare a SQL statement to prevent SQL injection
    $stmt->bind_param("s", $input_username);  // Bind the input username to the SQL query as a string
    $stmt->execute(); // Execute the prepared SQL statement
    $result = $stmt->get_result(); // Get the result set from the executed statement
    $user = $result->fetch_assoc(); // Fetch the first matching user (if any) as an associative array
    if ($user) {
        $_SESSION['username'] = $user['username']; // If the user exists, store their username in the session for access control
        header("Location: manage.php"); // Redirect the user to the protected manage.php page
        exit(); 
    } else {
        echo "Incorrect username or password."; // Display an error message if the login failed
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
<h2>Login</h2>
<form method="post" action="login.php">
    <label>Username:
        <input type="text" name="username" required>
    </label><br><br>
    <label>Password:
        <input type="password" name="password" required>
    </label><br><br>
    <input type="submit" value="Login">
</form>

<p>Don't have an account? <a href="register.php">Register here</a></p>
<!-- Link to registration page -->
</body>

<script>
        window.addEventListener('scroll', () => {
          const arrow = document.body;
          if (window.scrollY > 50) {
            arrow.style.setProperty('--scroll-indicator-opacity', '0');
            document.body.style.setProperty('opacity', '1'); // Ensure full visibility
            document.body.style.setProperty('scroll-behavior', 'smooth');
            document.body.style.setProperty('--scroll-indicator-visibility', 'hidden');
          }
        });
      </script>
</html>
