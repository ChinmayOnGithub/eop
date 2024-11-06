<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Operations</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        h1 { color: #35424a; }
        p { line-height: 1.6; }
        .result { background: #e3f2fd; padding: 10px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>String Operations</h1>
        <?php
        $text = "Hello, World!";
        echo "<p>Original Text: <span class='result'>$text</span></p>";
        echo "<p>Length: <span class='result'>" . strlen($text) . "</span></p>";
        echo "<p>Uppercase: <span class='result'>" . strtoupper($text) . "</span></p>";
        echo "<p>Lowercase: <span class='result'>" . strtolower($text) . "</span></p>";
        ?>
    </div>
</body>
</html>
