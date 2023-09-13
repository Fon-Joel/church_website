<?php
// Assuming you have established a database connection
// ...
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database configuration file
  include 'config.php';
// Process the form submission and add the new leader to the database
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $position = $_POST['position'];

  // Process the uploaded image
  $image = $_FILES['image']['name'];
  $imageTmp = $_FILES['image']['tmp_name'];
  $destination = 'images/' . $image;
  move_uploaded_file($imageTmp, $destination);

  // Insert the leader information into the database
  $query = mysqli_query($conn, "INSERT INTO leaders (name, position, image) VALUES ($name, $position, $destination])");
  // Refresh the page to display the newly added leader
  header("Location: about.php");
  if (!$query){
    die("Query failed" . mysqli_error($conn));
  }
  exit();
}



?>
