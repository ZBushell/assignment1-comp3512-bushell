<?php

try {
    // Create (connect to) SQLite database in file
    $pdo = new PDO('sqlite:./data/f1.db');

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
} catch (Exception $e) {
    echo "<h1>Connection failed: " . $e->getMessage() . "</h1>";
}
?>


