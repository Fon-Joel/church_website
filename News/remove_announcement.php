<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
if (isset($_POST['submit'])) {
  $data = $_POST['id'];

  // Prepare and execute the DELETE query
  $query = ($conn, "DELETE FROM announcement WHERE id = $data");
  // Redirect back to the about page after removal
  header("Location: news.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>