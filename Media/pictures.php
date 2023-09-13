<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config.php';
// Retrieve the search query from the GET parameters
?>
<?php include "../Include/header.php"?>

<body>
        <?php include "../Include/navigation.php";?>

       <section class="media-gallery">
       <div class="search-bar"><h1> CGC pictures</h1><span><input type="text" id="filterInput" placeholder="Search here">
<button id="filterButton">search</button></span></div>
<div class="video-container">
<?php   
// Retrieve the videos from the database
 // Replace the placeholders with your actual database connection and table name
$pictures= mysqli_query($conn, "SELECT * FROM picture");
?>
    <?php foreach ($pictures as $video) : ?>
        <div class="video-item">
    <img src="<?php echo $video['url']; ?>" alt="picture">
      <h3><?php echo $video['comment']; ?></h3>
      <a href=" <?php echo $video['url']; ?> ">view </a>
          <p>Date: <?php echo $video['date']; ?></p>
       </div>
    <?php endforeach; ?>
</div>


  </section>

 <?php include "../Include/footer.php" ?>
