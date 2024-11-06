<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #35424a; }
        input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 3px; }
        input[type="submit"] { background: #35424a; color: white; padding: 10px; border: none; border-radius: 3px; cursor: pointer; }
        input[type="submit"]:hover { background: #2c3e50; }
        .error { color: red; }
        .success { background: #e3f2fd; padding: 10px; border-radius: 3px; color: #2e7d32; }
    </style>
    <script>
        function validateForm() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                document.getElementById("error").innerText = "Passwords do not match!";
                return false;
            }
            document.getElementById("error").innerText = ""; // Clear any previous errors
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>User Registration Form</h1>
        <form action="" method="POST" onsubmit="return validateForm()">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <div id="error" class="error"></div>
            <input type="submit" value="Register">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));
            $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));
            $errors = [];

            // Server-side validation
            if ($password !== $confirm_password) {
                $errors[] = "Passwords do not match.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }

            // Display errors or success message
            if (empty($errors)) {
                echo "<div class='success'>";
                echo "<h2>Thank you, $name!</h2>";
                echo "<p>Your registration details:</p>";
                echo "<p><strong>Username:</strong> $username</p>";
                echo "<p><strong>Email:</strong> $email</p>";
                echo "</div>";
            } else {
                echo "<div class='error'>";
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
                echo "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
