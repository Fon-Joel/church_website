<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $leaderId = $_POST['id'];

  // Prepare and execute the DELETE query
  $stmt = $pdo->prepare("DELETE FROM theme_of_the_month WHERE id = ?");
  $stmt->execute([$leaderId]);

  // Redirect back to the about page after removal
  header("Location: about.php");
  exit();
}
?>