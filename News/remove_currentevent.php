<!-- Assuming you have established a database connection and included the necessary files -->

<?php
require_once '/config.php';
if (isset($_POST['submit'])) {
  $data = $_POST['id'];

  // Prepare and execute the DELETE query
  $query = ($conn, "DELETE FROM  current_event WHERE id = $data");
  // Redirect back to the about page after removal
  header("Location: news.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>