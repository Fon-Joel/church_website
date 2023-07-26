<?php
// Database configuration
$servername = "localhost";
$username = "fjoel";
$password = "school1";
$database = "leaders";

// Create the database connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
