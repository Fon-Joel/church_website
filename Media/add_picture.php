<?php
// Assuming you have established a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once 'config.php';
// Retrieve the video information from the form
// Check if the form is submitted and process the video upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the uploaded video file
  $videoFile = $_FILES['videoFile']['tmp_name'];
  $video = $_FILES['videoFile']['name'];
  // Move the uploaded video file to a desired location
  $targetFileName = "images/" .$video;
  move_uploaded_file($videoFile, $targetFileName);

  // Get the other form input values
  $videoTitle = $_POST['videoTitle'];
  $videoDate = $_POST['videoDate'];

  // Insert the video details into the database
  $stmt = $pdo->prepare("INSERT INTO picture (url, comment, date) VALUES (?, ?, ?)");
  $stmt->execute([$targetFileName, $videoTitle, $videoDate]);
    // Refresh the page to display the newly added leader
}
header("Location: pictures.php");
exit();
?>