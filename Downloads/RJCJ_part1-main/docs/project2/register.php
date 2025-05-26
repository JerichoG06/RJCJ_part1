 <?php
    require_once "settings.php";
    $errors = [];
    $success = "";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(empty($username) || empty($password)){
            $errors[] = "All fields are required";
        }
        if (!preg_match('/^(?=.*\d).{8,}$/', $password)){
            $errors[] = "Password must be at least 8 characters and include at least one number.";
        }
        $stmt = $conn->prepare("SELECT * FROM managers WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $existingUser = $stmt->get_result()->fetch_assoc();
        if($existingUser){
            $errors[] = "Username already exists";
        }
        if(empty($errors)){
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO managers (username, password) VALUES (?, ?)");
            $insert->bind_param("ss", $username, $hashedPassword);
                if($insert->execute()){
                    $success = "Manager registered successfully."
                } else{
                    $errors[] = "Database error: " . $conn->error;
                }
        }
    }
 ?>
 <!DOCTYPE html>
<html>
<head>
    <title>Manager Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label>Username:
            <input type="text" name="username" required>
        </label><br><br>

        <label>Password:
            <input type="password" name="password" required>
        </label><br><br>

        <label>Confirm Password:
            <input type="password" name="confirm_password" required>
        </label><br><br>
