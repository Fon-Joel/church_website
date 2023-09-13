<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
if (isset($_POST['submit'])) {
  $themeId = $_POST['id'];

  // Prepare and execute the DELETE query
    $query = ($conn, "DELETE FROM theme_of_the_month WHERE id = $themeId");
   // Redirect back to the about page after removal
  header("Location: about.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>