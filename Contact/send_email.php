<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database configuration file
require_once 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $date = $_POST['date'];
  $country = $_POST['country'];
  $Uname = $_POST['name'];
   $Pmessage = $_POST['message'];
     $email = $_POST['email'];

  // Prepare the INSERT statement
  $stmt = $pdo->prepare("INSERT INTO contact (name, message, date, country, email) VALUES (?, ?, ?, ?, ?)");

  // Bind the parameters and execute the statement
  $stmt->execute([$Uname, $Pmessage, $date, $country, $email]);

  // Redirect back to the about page after insertion
  header("Location: contact.php");
  exit();
}
?>
