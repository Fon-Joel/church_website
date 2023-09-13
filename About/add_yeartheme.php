<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database configuration file
require_once '/config.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the form data
  $theme = $_POST['theme'];
  $scripture = $_POST['scripture'];
  $verse = $_POST['verse'];

  // Prepare the INSERT statement
 $query = ($conn, "INSERT INTO theme_of_the_year (theme, scripture, verse) VALUES ($theme, $scripture, $verse)");
  // Redirect back to the about page after insertion
  header("Location: about.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>
