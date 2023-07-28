<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eventName = $_POST["eventName"];
  $eventDescription = $_POST["eventDescription"];
  $eventDate = $_POST["eventDate"];
  
  // Handle file upload and move the image to a desired location
   $image = $_FILES['eventImage']['name'];
  $imageTmp = $_FILES['eventImage']['tmp_name'];
  $imagePath = 'images/' . $image;
  move_uploaded_file($imageTmp, $imagePath);
  
  // Insert event data into the upcoming_event table
  $sql = "INSERT INTO current_event (event_name, event_description, event_date, event_image) 
          VALUES (:eventName, :eventDescription, :eventDate, :eventImage)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':eventName', $eventName);
  $stmt->bindParam(':eventDescription', $eventDescription);
  $stmt->bindParam(':eventDate', $eventDate);
  $stmt->bindParam(':eventImage', $imagePath);
  
  if ($stmt->execute()) {
    // Event added successfully, redirect to the event page or show a success message
    header("Location: news.php");
    exit;
  } else {
    // Error occurred while inserting the event, show an error message
    echo "Failed to add the event. Please try again.";
  }
}
?>
