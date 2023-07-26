<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database configuration file
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $theme = $_POST['announcement'];
  // Prepare the INSERT statement
  $stmt = $pdo->prepare("INSERT INTO announcement (data) VALUES (?)");

  // Bind the parameters and execute the statement
  $stmt->execute([$theme]);

  // Redirect back to the about page after insertion
  header("Location: news.php");
  exit();
}
?>
