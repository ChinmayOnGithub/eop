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
        
        // String length
        echo "<p>Length: <span class='result'>" . strlen($text) . "</span></p>";
        
        // Uppercase
        echo "<p>Uppercase: <span class='result'>" . strtoupper($text) . "</span></p>";
        
        // Lowercase
        echo "<p>Lowercase: <span class='result'>" . strtolower($text) . "</span></p>";
        
        // Reverse
        echo "<p>Reversed: <span class='result'>" . strrev($text) . "</span></p>";
        
        // Word count
        echo "<p>Word Count: <span class='result'>" . str_word_count($text) . "</span></p>";
        
        // Find position of substring
        $substring = "World";
        $position = strpos($text, $substring);
        echo "<p>Position of '$substring': <span class='result'>" . ($position !== false ? $position : "Not found") . "</span></p>";
        
        // Replace text
        $replace = "Universe";
        echo "<p>Replace 'World' with 'Universe': <span class='result'>" . str_replace("World", $replace, $text) . "</span></p>";
        
        // Shuffle string
        echo "<p>Shuffled: <span class='result'>" . str_shuffle($text) . "</span></p>";
        ?>
    </div>
</body>
</html>
