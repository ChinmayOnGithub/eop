<?php
// Start the session
session_start();

// Define a session timeout duration (in seconds)
$timeout_duration = 300;

// Check for user inactivity and timeout session if exceeded
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset(); // Unset session variables
    session_destroy(); // Destroy the session
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

// Check if the user has submitted the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && !empty(trim($_POST['username']))) {
        // Sanitize and store user input in session
        $_SESSION['username'] = htmlspecialchars(trim($_POST['username']));
        $_SESSION['login_time'] = date("Y-m-d H:i:s");

        // Optionally, store the username in a cookie for 30 days
        setcookie('username', $_SESSION['username'], time() + (86400 * 30), "/");
    } elseif (isset($_POST['logout'])) {
        // Check if the user wants to log out
        session_destroy(); // Destroy the session
        setcookie('username', "", time() - 3600, "/"); // Expire the cookie
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Retrieve the username from a cookie if available
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Session Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h1 {
            color: #35424a;
        }

        p {
            line-height: 1.6;
        }

        input {
            padding: 10px;
            width: 100%;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px;
            background-color: #35424a;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #2c3e50;
        }

        .error {
            color: red;
        }

        .welcome {
            color: green;
        }
    </style>
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }
    </script>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION['username'])) {
            // Display welcome message and last login time
            echo "<h1 class='welcome'>Welcome, " . $_SESSION['username'] . "!</h1>";
            if (isset($_SESSION['login_time'])) {
                echo "<p>Last Login: " . $_SESSION['login_time'] . "</p>";
            }
            echo '<form method="post" onsubmit="return confirmLogout();">
                    <button name="logout">Logout</button>
                  </form>';
        } else {
            // Show login form
            echo "<h1>Please Log In</h1>";
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty(trim($_POST['username']))) {
                echo "<p class='error'>Please enter a valid name to log in.</p>";
            }
            echo '<form method="post">
                    <input type="text" name="username" placeholder="Enter your name" required>
                    <button type="submit">Login</button>
                  </form>';
        }
        ?>
    </div>
</body>

</html>