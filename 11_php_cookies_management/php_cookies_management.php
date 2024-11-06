<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Management</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #35424a; }
        p { line-height: 1.6; }
        button { background: #35424a; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        button:hover { background: #2c3e50; }
        input { padding: 10px; width: calc(100% - 22px); margin-bottom: 10px; border: 1px solid #ccc; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['delete'])) {
            // Delete the cookie
            setcookie('userVisit', '', time() - 3600); // expire the cookie
            echo "<h1>Cookie Deleted!</h1>";
            echo "<p>The cookie has been successfully deleted.</p>";
        } elseif (isset($_POST['username'])) {
            // Set the cookie if user input is provided
            $cookie_name = "userVisit";
            $cookie_value = htmlspecialchars($_POST['username']);
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30)); // 30 days
            echo "<h1>Cookie Set!</h1>";
            echo "<p>Cookie named '" . $cookie_name . "' is set with value: " . $cookie_value . "</p>";
        } elseif (isset($_COOKIE['userVisit'])) {
            // Show the cookie value if it exists
            echo "<h1>Welcome back, " . htmlspecialchars($_COOKIE['userVisit']) . "!</h1>";
            echo "<p>Your cookie value: " . htmlspecialchars($_COOKIE['userVisit']) . "</p>";
        } else {
            echo "<h1>Welcome!</h1>";
            echo "<p>Please enter your name to set a cookie:</p>";
        }
        ?>
        <form method="post">
            <input type="text" name="username" placeholder="Enter your name" required>
            <button type="submit">Set Cookie</button>
        </form>
        <form method="post">
            <button type="submit" name="delete">Delete Cookie</button>
        </form>
    </div>
</body>
</html>
