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
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/style.css">
    <link type="text/css" rel="stylesheet" href="styleabout.css">
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
            <li><a href="about.php">About</a></li>
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

  <section class="about-section">
    <h1>Chariots Of God Chapel</h1>
    <div id="welcome-message">
  <p>
    Welcome to Chariots Of God Chapel We are thrilled that you have taken the time to visit our website and learn more about our church community.
  </p>
  <div id="expanded-message" style="display: none;">
    <p>
At CGC, our doors are wide open, and we embrace everyone with open arms.<br><br>

Our mission is to love God, love people, and make a difference in our world. We believe in creating a warm and welcoming environment where individuals and families can grow in their faith, experience the transforming power of God's love, and find support and encouragement from a community of believers.<br><br>

Whether you are new to the area, searching for spiritual guidance, or looking for a place to call home, we invite you to join us. Our diverse congregation is made up of people from all walks of life, and we celebrate the beauty of our differences as we come together to worship, learn, and serve.<br><br>

Through inspiring worship services, engaging ministries, and meaningful outreach initiatives, we strive to make a positive impact on our community and beyond. We are passionate about sharing the message of hope, forgiveness, and redemption found in Jesus Christ.<br><br>

We invite you to explore our website to learn more about our various ministries, upcoming events, and ways to get involved. If you have any questions or need assistance, please don't hesitate to reach out. We would be honored to connect with you and assist you on your spiritual journey.<br>

Once again, thank you for visiting us online. We hope to have the opportunity to meet you in person and welcome you into the CGC family.<br>

May God bless you abundantly.<br><br>

In Christ's love,<br>
Pastor, Sanchez.
    </p>
  </div>
  <a href="#" id="read-more-link">Read More</a>
</div>
<h2>Our History</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tincidunt leo eu nisi vestibulum, vitae gravida urna aliquet.</p>
    <p>Nulla facilisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In malesuada commodo ipsum ac efficitur. Curabitur bibendum odio id turpis aliquam, vel scelerisque nulla commodo.</p>
  </section>

  <section class="vision-section">
    <h2>Our Vision</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ultricies libero vitae lorem lobortis efficitur.</p>
    <ul>
      <li>Lorem ipsum dolor sit amet</li>
      <li>Consectetur adipiscing elit</li>
      <li>Aliquam ultricies libero vitae lorem</li>
      <li>Lobortis efficitur</li>
    </ul>
  </section>
  <section class="leadership-section">
    <h2>Leadership Team</h2>
    <div id="leaders-container" class="leaders-container">
      <div class="leader">

<?php
// Retrieve the leaders' information from the database
$stmt = $pdo->query("SELECT * FROM leaders");
$leaders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Generate the HTML to display the leaders -->
<?php foreach ($leaders as $leader) : ?>
  <div>
   <img src="<?= $leader['image'] ?>" alt="Leader Image">
    <h3><?= $leader['name'] ?></h3>
    <p>Role: <?= $leader['position'] ?></p>
     <?php if ($isAdmin) : ?>
     <form class="remove_leader" action="remove_leader.php" method="POST">
      <input type="hidden" name="leader_id" value="<?= $leader['id'] ?>">
      <button type="submit" onclick="return confirm('Are you sure you want to remove this leader?')">Remove</button>
    </form>
     <?php endif; ?>
     </div>
<?php endforeach; ?>
</div>
  </div>
 <?php if ($isAdmin) : ?>
<form class="add_leader" id="leaderForm" action="add_leader.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" required>
  
  <label for="position">Position:</label>
  <input type="text" name="position" id="position" required>

  <label for="image">Image:</label>
  <input type="file" name="image" id="image" accept="image/*" required>
  <button type="submit">Add Leader</button>
</form>

 <?php endif; ?>
  </section>
 
 <script>
  document.getElementById("read-more-link").addEventListener("click", function(event) {
    event.preventDefault(); // Prevents the link from scrolling to the top of the page

    var expandedMessage = document.getElementById("expanded-message");

    if (expandedMessage.style.display === "none") {
      expandedMessage.style.display = "block";
      this.innerText = "Read Less";
    } else {
      expandedMessage.style.display = "none";
      this.innerText = "Read More";
    }
  });
</script>
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
  
  
  
  

  <footer>
    <p> location: ENTREECENTRE EQUESTRE, BESSEKE ANCIENNE ROUTE BONABERI <br>
    &copy; 2023 CGC. All rights reserved.</p>
  </footer>
      <script type="text/javascript" src="/script.js" ></script> 
      <script type="text/javascript" src="about.js" ></script> 
      </body>