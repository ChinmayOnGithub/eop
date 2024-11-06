<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #35424a;
            font-size: 24px;
        }

        p {
            line-height: 1.6;
            color: #555;
            margin: 15px 0;
        }

        button {
            background: #35424a;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background: #2c3e50;
        }

        input {
            padding: 12px;
            width: calc(100% - 24px);
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        .message {
            color: #4caf50;
            font-weight: bold;
        }

        .error {
            color: #f44336;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $message = ""; // Message to display for setting or deleting the cookie
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['delete'])) {
                // Delete the cookie
                setcookie('userVisit', '', time() - 3600, "/");
                $message = "<p class='message'>Cookie has been successfully deleted.</p>";
            } elseif (isset($_POST['username']) && !empty(trim($_POST['username']))) {
                // Set the cookie with user input
                $cookie_name = "userVisit";
                $cookie_value = htmlspecialchars(trim($_POST['username']));
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 30 days
                $_COOKIE['userVisit'] = $cookie_value; // Update the $_COOKIE superglobal for immediate use
                $message = "<p class='message'>Cookie is set with value: <strong>" . $cookie_value . "</strong>.</p>";
            } else {
                $message = "<p class='error'>Please enter a valid name to set the cookie.</p>";
            }
        }

        // Display greeting if cookie exists
        if (isset($_COOKIE['userVisit']) && empty($message)) {
            echo "<h1>Welcome back, " . htmlspecialchars($_COOKIE['userVisit']) . "!</h1>";
            echo "<p>Your cookie value is: <strong>" . htmlspecialchars($_COOKIE['userVisit']) . "</strong></p>";
        } else {
            echo "<h1>Welcome!</h1>";
            echo "<p>Please enter your name to set a cookie:</p>";
        }

        echo $message;
        ?>

        <!-- Form to set the cookie -->
        <form method="post">
            <input type="text" name="username" placeholder="Enter your name" required>
            <button type="submit">Set Cookie</button>
        </form>

        <!-- Form to delete the cookie -->
        <form method="post" style="margin-top: 10px;">
            <button type="submit" name="delete">Delete Cookie</button>
        </form>
    </div>
</body>

</html>