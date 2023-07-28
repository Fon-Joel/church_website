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
if (isset($_SESSION['pastor']) && $_SESSION['pastor']) {
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
     <link type="text/css" rel="stylesheet" href="contact.css">
     <link type="text/css" rel="stylesheet" href="/Service/service.css">
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
    <header>
        <h1>Contact Us</h1>
    </header>
        <section class="prayer-request">
            <h3>If you have any prayer request, you can fill in the form below so that our Pastor can join you in seeking God's guidance, comfort, and blessings during this time of need</h3>
            <p class="note"> NB: Your request will be seen only by the Pastor</p>
            <form id="contactForm" method="POST" action="send_email.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="optional, but it is advice to fill this field for proper follow up">
                 <label for="email">Email</label>
                 <input type="text" id="email" name="email" placeholder="optional, but it is advice to fill this field for proper follow up">
                <label for="country">country<label>
                <input type="text" id="country" name="country" required>
                <label for="date">date</label>
                <input type="date" id="date" name="date" required>
                <label for="message">prayer request</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
         <?php if($isAdmin) : ?>
        <button id="prayerRequest">view prayer Request</button>
        <section class="display-prayers">
        <?php   
// Retrieve the videos from the database
 // Replace the placeholders with your actual database connection and table name
$stmt = $pdo->query("SELECT * FROM contact ORDER BY date DESC");
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <?php foreach ($videos as $video) : ?>
    <div>
          <h3> Name:<?php echo $video['name']; ?></h3>
          <h3> Email:<?php echo $video['email']; ?></h3>
          <p><?php echo $video['message']; ?></p>
          <p>Location: <?php echo $video['country']; ?></p>
          <p class="note" >date: <?php echo $video['date']; ?></p>
          
            <form class="remove_leader" action="remove_prayer.php" method="POST">
      <input type="hidden" name="id" value="<?= $video['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this request?')">Remove</button>
    </form>
          </div>
          <?php endforeach; ?>
        </section>
        <?php endif; ?>
        <section class="contact-us">
        <div class="contact-container">
         <p>For more information and guidance, contact Pst. Sanchez by clicking;</p>
      <div> <i class="fa-brands fa-whatsapp"></i> <a href="https://wa.me/+237675804523" target="_blank">Send message on WhatsApp</a></div>
       <div><i class="fa-brands fa-facebook"></i><a href="https://www.facebook.com/messages/your-page-id" target="_blank">Send message on Facebook</a></div>
<div><i class="fa-solid fa-envelope"></i><a href="mailto:your-email@example.com">Send an email</a></div>
</section>
 <footer>
    <p>&copy; 2023 CGC. All rights reserved.</p>
  </footer>
        <script type="text/javascript" src="/script.js" ></script>
          <script type="text/javascript" src="contact.js" ></script>
      </body>
      </html>
