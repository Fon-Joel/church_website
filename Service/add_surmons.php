<?php
// Assuming you have established a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once 'config.php';
// Retrieve the video information from the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$videoUrl = $_POST['videoUrl'];
$videoTitle = $_POST['videoTitle'];
$videoPreacher = $_POST['videoPreacher'];
$videoDate = $_POST['videoDate'];

// Insert the video information into the database
// Replace the placeholders with your actual database connection and table name
$stmt = $pdo->prepare("INSERT INTO surmons (title, preacher, url, date) VALUES (?, ?, ?, ?)");
$stmt->execute([$videoTitle, $videoPreacher, $videoUrl, $videoDate]);

// Redirect back to the media page after the video is added
header("Location: surmons.php");
exit();
}
?>
