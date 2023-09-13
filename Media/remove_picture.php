<!-- Assuming you have established a database connection and included the necessary files -->

<?php
require_once 'config.php';
if (isset($_POST['submit'])) {
  $picture= $_POST['id'];

  // Prepare and execute the DELETE query
  $query = ($conn, "DELETE FROM pictures WHERE id = $picture");
  // Redirect back to the about page after removal
  header("Location: pictures.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>