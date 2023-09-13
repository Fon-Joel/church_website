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
       <div class="search-bar"><h1> Surmons </h1><span><input type="text" id="filterInput" placeholder="Search here">
<button id="filterButton">search</button></span></div>

<!-- HTML markup for the video container and grid -->
<div class="video-container">
<?php   
// Retrieve the videos from the database
 // Replace the placeholders with your actual database connection and table name
$stmt = mysqli_query($conn, "SELECT * FROM surmons ORDER BY date DESC");
?>
    <?php foreach ($stmt as $video) : ?>
        <div class="video-item">
          <iframe class="video-iframe" src="<?php echo $video['url']; ?>" frameborder="0" allowfullscreen></iframe>
          <h3><?php echo $video['title']; ?></h3>
          <p>Teacher: <?php echo $video['preacher']; ?></p>
          <p> if video doesn't play, watch <a href="<?php echo $video['url']; ?>">here</a></p>
          <p>Date: <?php echo $video['date']; ?></p>
       </div>
    <?php endforeach; ?>
</div>


  </section>
       <?php include "../Include/footer.php" ?>
