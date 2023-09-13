<?php
// Assuming you have established a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once 'config.php';
// Retrieve the video information from the form
if (isset($_POST['submit'])) {
$videoUrl = $_POST['videoUrl'];
$videoTitle = $_POST['videoTitle'];
$videoPreacher = $_POST['videoPreacher'];
$videoDate = $_POST['videoDate'];

// Insert the video information into the database
// Replace the placeholders with your actual database connection and table name
 $stmt = mysqli_query($conn, "INSERT INTO videos (title, preacher, url, date) VALUES ($videoTitle, $videoPreacher, $videoUrl, $videoDate)");
// Redirect back to the media page after the video is added
header("Location: sunday_service.php");
if(!$stmt){
  die("Query failed" . mysqli_error($conn));
}
exit();
}
?>
