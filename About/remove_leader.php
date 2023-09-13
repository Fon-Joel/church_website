<!-- Assuming you have established a database connection and included the necessary files -->

<?php
include'/config.php';
if (isset($_POST['submit'])) {
  $leaderId = $_POST['leader_id'];

  // Prepare and execute the DELETE query
  $query = ($conn, "DELETE FROM leaders WHERE id = $leaderId");
  // Redirect back to the about page after removal
  header("Location: about.php");
   if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}
?>
