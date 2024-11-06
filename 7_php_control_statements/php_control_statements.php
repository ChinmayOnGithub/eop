<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Statements</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #35424a; }
        p { line-height: 1.6; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Grade Evaluation</h1>
        <?php
        $score = 85; // Change this value to test different grades

        echo "<p>Your score: $score</p>";

        if ($score >= 90) {
            echo "<p>Grade: <strong style='color: green;'>A</strong></p>";
        } elseif ($score >= 80) {
            echo "<p>Grade: <strong style='color: blue;'>B</strong></p>";
        } elseif ($score >= 70) {
            echo "<p>Grade: <strong style='color: orange;'>C</strong></p>";
        } else {
            echo "<p>Grade: <strong style='color: red;'>D</strong></p>";
        }
        ?>
    </div>
</body>
</html>
