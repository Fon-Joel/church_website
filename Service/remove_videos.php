<!-- Assuming you have established a database connection and included the necessary files -->

<?php
require_once '/config.php';
if (isset($_POST['submit'])) {
  $value= $_POST['id'];

  // Prepare and execute the DELETE query
    $stmt = mysqli_query($conn, "DELETE FROM videos WHERE id = $value");
  header("Location: sunday_service.php");
  if(!$stmt){
    die("Query failed" . mysqli_error($conn));

  }
  exit();
}
?>
