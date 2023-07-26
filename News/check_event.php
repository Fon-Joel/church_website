<?php
require_once 'config.php';

// Get the current date
$currentDate = date('Y-m-d');

// Select upcoming events with the event date matching the current date
$sql = "SELECT * FROM upcoming_event WHERE event_date = :currentDate";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':currentDate', $currentDate);
$stmt->execute();
$upcomingEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Move the upcoming events to the current_event table
foreach ($upcomingEvents as $event) {
  $eventName = $event['event_name'];
  $eventDescription = $event['event_description'];
  $eventDate = $event['event_date'];
  $eventImage = $event['event_image'];
  
  // Insert the event into the current_event table
  $sql = "INSERT INTO current_event (event_name, event_description, event_date, event_image) 
          VALUES (:eventName, :eventDescription, :eventDate, :eventImage)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':eventName', $eventName);
  $stmt->bindParam(':eventDescription', $eventDescription);
  $stmt->bindParam(':eventDate', $eventDate);
  $stmt->bindParam(':eventImage', $eventImage);
  $stmt->execute();
  
  // Delete the event from the upcoming_event table
  $sql = "DELETE FROM upcoming_event WHERE event_name = :eventName";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':eventName', $eventName);
  $stmt->execute();
}

echo count($upcomingEvents) . " events moved to the current_event table.";
?>
