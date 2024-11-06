<?php
// Start the session
session_start();

// Check if the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store user input in the session
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
}

// Check if the user wants to log out
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Management</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
        h1 { color: #35424a; }
        p { line-height: 1.6; }
        input { padding: 10px; width: 80%; margin-bottom: 10px; }
        button { padding: 10px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Check if the session variable is set
        if (isset($_SESSION['username'])) {
            // Greet the user
            echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
            echo '<form method="post"><button name="logout">Logout</button></form>';
        } else {
            // Show the login form
            echo "<h1>Please log in:</h1>";
            echo '<form method="post">
                    <input type="text" name="username" placeholder="Enter your name" required>
                    <button type="submit">Login</button>
                  </form>';
        }
        ?>
    </div>
</body>
</html>
