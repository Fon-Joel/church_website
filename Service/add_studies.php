<?php
// Assuming you have established a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once 'config.php';
// Retrieve the video information from the form
// Check if the form is submitted and process the video upload
if (isset($_POST['submit'])) {
  // Retrieve the uploaded video file
  $videoFile = $_FILES['videoFile']['tmp_name'];
  $video = $_FILES['videoFile']['name'];
  // Move the uploaded video file to a desired location
  $targetFileName = "videos/" .$video;
  move_uploaded_file($videoFile, $targetFileName);

  // Get the other form input values
  $videoTitle = $_POST['videoTitle'];
  $videoPreacher = $_POST['videoPreacher'];
  $videoDate = $_POST['videoDate'];

  // Insert the video details into the database
  $stmt = mysqli_query($conn, "INSERT INTO bible_studies (url, title, preacher, date) VALUES ($targetFileName, $videoTitle, $videoPreacher, $videoDate)");
    // Refresh the page to display the newly added leader
}
header("Location: bible_studies.php");
if(!$stmt){
  die("Query failed" . mysqli_error($conn));

}
exit();
?>