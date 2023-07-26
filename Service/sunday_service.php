<?php
// Set caching headers
$expiration = 60 * 60 * 24 * 7; // 1 week (adjust as needed)
header("Cache-Control: public, max-age=$expiration");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expiration) . " GMT");
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$isAdmin = false; 
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    $isAdmin = true;
}
require_once 'config.php';
// Retrieve the search query from the GET parameters
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/style.css">
     <link type="text/css" rel="stylesheet" href="/About/styleabout.css">
     <link type="text/css" rel="stylesheet" href="service.css">
    <script src="https://kit.fontawesome.com/fefb911c4f.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
          <div class="nav-logo"><img src="/chariots-logo.png" alt="Church Logo"></div>
          <span class="church-name">Chariots Of God Chapel</span>
        </div>
        <div class="menu-items" id="menu">
          <ul>
            <li><a href="/index.php">Home</a></li>
            <li><a href="/About/about.php">About</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle">Service</a>
              <ul class="dropdown-menu">
                <li><a href="sunday_service.php">Sunday Service</a></li>
                <li><a href="bible_studies.php">Bible Studies</a></li>
                <li><a href="surmons.php">Surmons</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle">Media</a>
              <ul class="dropdown-menu">
                <li><a href="/Media/testimony.php">Testimonies</a></li>
                <li><a href="/Media/pictures.php">Pictures</a></li>
              </ul>
            </li>
            <li><a href="/News/news.php">News</a></li>
            <li><a href="/Contact/contact.php">Contact</a></li>
          </ul>
        </div>
        <div class="dropdown-menu-toggle">
          <i class="fa-solid fa-bars dropdown-toggle-icon" ></i>
        </div>
      </nav>
       <section class="media-gallery">
       <div class="search-bar"><h1> Sunday Services </h1><span><input type="text" id="filterInput" placeholder="Search here">
<button id="filterButton">search</button></span></div>

<!-- HTML markup for the video container and grid -->
<?php if($isAdmin) : ?>
    <!-- Add more videos here -->
    <form id="videoForm" method="POST" action="add_videos.php" class="add_leader">
  <label for="videoUrl">Video URL:</label>
  <input type="text" id="videoUrl" name="videoUrl" required>
  <label for="videoTitle">Title:</label>
  <input type="text" id="videoTitle" name="videoTitle" required>
  <label for="videoPreacher">Preacher:</label>
  <input type="text" id="videoPreacher" name="videoPreacher" required>
  <label for="videoDate">Date:</label>
  <input type="date" id="videoDate" name="videoDate" required>
  <button type="submit">Upload</button>
</form>
<?php endif; ?>
<div class="video-container">
<?php   
// Retrieve the videos from the database
 // Replace the placeholders with your actual database connection and table name
$stmt = $pdo->query("SELECT * FROM videos ORDER BY date DESC");
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php foreach ($videos as $video) : ?>
        <div class="video-item">
          <iframe id="videoPlayer" class="video-iframe" src="<?php echo $video['url']; ?>" frameborder="0" allowfullscreen></iframe>
          <h3><?php echo $video['title']; ?></h3>
          <p>Preacher: <?php echo $video['preacher']; ?></p>
          <p> if video doesn't play, watch <a href="<?php echo $video['url']; ?>">here</a></p>
          <p>Date: <?php echo $video['date']; ?></p>
       <?php if($isAdmin) : ?>
     <form class="remove_leader" action="remove_videos.php" method="POST">
      <input type="hidden" name="id" value="<?= $video['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this video?')">Remove</button>
    </form>
     <?php endif; ?>
       </div>
    <?php endforeach; ?>
</div>
  </section>

  <footer>
    <p>&copy; 2023 CGC. All rights reserved.</p>
  </footer>
      
      <script type="text/javascript" src="service.js"></script>
      <script type="text/javascript" src="/script.js" ></script>
      </body>
      </html>