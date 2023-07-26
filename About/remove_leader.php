<!-- Assuming you have established a database connection and included the necessary files -->

<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $leaderId = $_POST['leader_id'];

  // Prepare and execute the DELETE query
  $stmt = $pdo->prepare("DELETE FROM leaders WHERE id = ?");
  $stmt->execute([$leaderId]);

  // Redirect back to the about page after removal
  header("Location: about.php");
  exit();
}
?>
