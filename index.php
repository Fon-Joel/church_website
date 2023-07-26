<?php
// Set caching headers
$expiration = 60 * 60 * 24 * 7; // 1 week (adjust as needed)
header("Cache-Control: public, max-age=$expiration");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expiration) . " GMT");
?>

<?php
$isAdmin = false; 
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin']) {
    $isAdmin = true;
}
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="stylehome.css">
    <script src="https://kit.fontawesome.com/fefb911c4f.js" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
          <div class="nav-logo"><img src="chariots-logo.png" alt="Church Logo"></div>
          <span class="church-name">Chariots Of God Chapel</span>
        </div>
        <div class="menu-items" id="menu">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="About/about.php">About</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle">Service</a>
              <ul class="dropdown-menu">
                <li><a href="Service/sunday_service.php">Sunday Service</a></li>
                <li><a href="Service/bible_studies.php">Bible studies</a></li>
                <li><a href="Service/surmons.php">Surmons</a></li>
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
      <div class="welcome-container">
        <h1 class="welcome-statement">WELCOME TO THE CHARIOTS OF GOD CHAPEL</h1>
      </div>
      <div class="welcome-speech-container">
        <div class="welcome-speech"> 
          You are indeed welcome to our community, where hearts are open and embraced with love, just as it is written in Romans 15:7: 'Accept one another, then, just as Christ accepted you, in order to bring praise to God.' May you find comfort, fellowship, and spiritual nourishment as we journey together in faith, following the path illuminated by the Word of God. </div>
      </div>
      <div class="bottom-container">
        <span class="online-button">
          <button>watch live service</button>
        </span>
    
        <span class="online-button">
          <button id="about-button">learn more about church</button>
        </span>
      </div>
<div class="info-bar">      
  <label class="help-button">If you miss out on the sunday service you can always watch it <a href="/Service/sunday_service.php">here</a></label>
</div>

<footer>
  <p>&copy; 2023 CGC. All rights reserved.</p>
</footer>  
      <div class="background-overlay"></div>
     <script type="text/javascript" src="script.js" ></script> 
     <script type="text/javascript" src="scriptshome.js" ></script> 
</body>
</html>