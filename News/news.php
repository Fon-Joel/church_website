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
     <link type="text/css" rel="stylesheet" href="/News/news.css">
     <link type="text/css" rel="stylesheet" href="/About/styleabout.css">
     <link type="text/css" rel="stylesheet" href="/Service/service.css">
    <script src="https://kit.fontawesome.com/fefb911c4f.js" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <li><a href="/Service/sunday_service.php">Sunday Service</a></li>
                <li><a href="/Service/bible_studies.php">Bible Studies</a></li>
                <li><a href="/Service/surmons.php">Surmons</a></li>
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
      <section class="announcement">
        <h1> Weekly Activities</h1>
      <table>
  <tr>
    <th>Weekdays</th>
    <th>Program</th>
    <th>Time</th>
  </tr>
  <tr>
    <td>Tuesday</td>
    <td>Prayers</td>
    <td>6pm - 7pm</td>
  </tr>
  <tr>
    <td>Thursday</td>
    <td>Bible Studies</td>
    <td>6pm - 8pm</td>
  </tr>
  <tr>
    <td>Sundays</td>
    <td>Service</td>
    <td>9am - 12pm</td>
  </tr>
</table>
<h2>Announcements</h2>
<?php if($isAdmin) : ?>
<form class="add_leader" action="announcement.php" method="POST" enctype="multipart/form-data">
<label> Enter New announcement </label>
<input type="text" name="announcement" required>
<button type"submit">Add Anouncement</button>
</form>
<?php endif; ?>
 <?php 
       $stmt = $pdo->query("SELECT * FROM announcement");
       $anouncement = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<ul>
    <?php foreach ($anouncement as $text) : ?>
    <li> <?php echo $text['data']; ?> </li>
    <?php if($isAdmin) : ?>
     <form class="remove_leader" action="remove_announcement.php" method="POST">
      <input type="hidden" name="id" value="<?= $text['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this event?')">Remove</button></form><?php endif; ?>
      <?php endforeach; ?>
      </ul>

      </section>
      <section class="theme-section">
  <?php
// Retrieve the leaders' information from the database
$stmt = $pdo->query("SELECT * FROM theme_of_the_year");
$leaders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="theme">
  <h2> Theme Of The Year <h2>
  <!-- Display the theme section on the webpage -->
  <?php foreach ($leaders as $theme): ?>
      <h3>"<?php echo $theme['theme']; ?>"</h3>
      <p><?php echo $theme['scripture']; ?><br>"
      <?php echo $theme['verse']; ?>"</p>
    <?php if ($isAdmin) : ?>
     <form class="remove_leader" action="remove_yeartheme.php" method="POST">
      <input type="hidden" name="id" value="<?= $theme['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this Theme?')">Remove</button>
    </form>
     <?php endif; ?>
  <?php endforeach; ?>
  </div>
   <?php if ($isAdmin) : ?>
  <form class="add_leader" method="POST" action="add_yeartheme.php">
  <label >Year Theme:</label>
  <input type="text" name="theme">
  <label >Scripture:</label>
  <input type="text" name="scripture">
  <label >Readings:</label>
  <input type="text" name="verse" >
  <button type="submit">Put theme</button>
</form>
 <?php endif; ?>
 <div class="theme">
  <h2> Theme Of The Month <h2>
  <?php
// Include the database configuration file

// Retrieve the theme data from the database
$stmt = $pdo->query("SELECT * FROM theme_of_the_month");
$themes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Display the theme section on the webpage -->
  <?php foreach ($themes as $theme): ?>
      <h3>"<?php echo $theme['theme']; ?>"</h3>
      <p><?php echo $theme['scripture']; ?><br>"
      <?php echo $theme['verse']; ?>"</p>
    <?php if ($isAdmin) : ?>
     <form class="remove_leader" action="remove_theme.php" method="POST">
      <input type="hidden" name="id" value="<?= $theme['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this Theme?')">Remove</button>
    </form>
     <?php endif; ?>
  <?php endforeach; ?>
  </div>
  <?php if ($isAdmin) : ?>
  <form class="add_leader" method="POST" action="add_theme.php">
  <label >Month Theme:</label>
  <input type="text" name="theme">
  <label >Scripture:</label>
  <input type="text" name="scripture">
  <label >Readings:</label>
  <input type="text" name="verse" >
  <button type="submit">Put theme</button>
</form>
 <?php endif; ?>
  </section>
       <section class="current-events">
        <?php if($isAdmin) : ?>
            <form method="POST" action="add_now.php" enctype="multipart/form-data" class="add_leader">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventNames" name="eventName" required>
        <label for="eventDescription">Event Description:</label>
        <textarea id="eventDescriptions" name="eventDescription" required></textarea>
        <label for="eventDates">Event Date:</label>
        <input type="date" id="eventDates" name="eventDate" required>
        <label for="eventImages">Event Image:</label>
        <input type="file" id="eventImages" name="eventImage" accept="image/*">
        <button type="submit">Add Event</button>
      </form>
        <?php endif; ?>
      <h1> Current Events</h1>
      <?php 
       $stmt = $pdo->query("SELECT * FROM current_event ORDER BY event_date DESC");
       $eventnews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php foreach ($eventnews as $eventnew) : ?>
     <div class="event">
    <img src="<?php echo $eventnew['event_image']; ?>" alt="No Image">
 
          <h3><?php echo $eventnew['event_name']; ?></h3>
          <p>description: <?php echo $eventnew['event_description']; ?></p>
          <p>date: Ongoing </p>
       <?php if($isAdmin) : ?>
     <form class="remove_leader" action="remove_currentevent.php" method="POST">
      <input type="hidden" name="id" value="<?= $eventnew['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this event?')">Remove</button></form>
      <?php endif; ?>
        </div>
         <?php endforeach; ?>
        </section>

        <section class="upcoming-events">
           <?php if($isAdmin) : ?>
             <form method="POST" action="add_event.php" enctype="multipart/form-data" class="add_leader">
             
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>  
        <label for="eventDescription">Event Description:</label>
        <textarea id="eventDescription" name="eventDescription" required></textarea>
        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required>
        <label for="eventImage">Event Image:</label>
        <input type="file" id="eventImage" name="eventImage" accept="image/*">
        <button type="submit">Add Event</button>
      </form>
      <?php endif; ?>
      <h1> Upcoming Events</h1>
       <div class="event-container">
       <?php 
       $stmt = $pdo->query("SELECT * FROM upcoming_event ORDER BY event_date ASC");
       $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php foreach ($videos as $video) : ?>
    <div class="events">
    <img src="<?php echo $video['event_image']; ?>" alt="No Image">
 
          <h3><?php echo $video['event_name']; ?></h3>
          <p>description: <?php echo $video['event_description']; ?></p>
          <p>Date: <?php echo $video['event_date']; ?></p>
       <?php if($isAdmin) : ?>
     <form class="remove_leader" action="remove_event.php" method="POST">
      <input type="hidden" name="id" value="<?= $video['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this event?')">Remove</button> </form>
      <?php endif; ?>
        </div>
         <?php endforeach; ?>
          </div>
        </section>
  
    <footer>
        <p>&copy; 2023 CGC. All rights reserved.</p>
    </footer>
      <script type="text/javascript" src="/script.js" ></script>
      <script type="text/javascript" src="/About/about.js" ></script>
</body>
</html>