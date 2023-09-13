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
       <div class="search-bar"><h1> Bible studies <button id="reloadButton"> pause all videos</button></h1><span><input type="text" id="filterInput" placeholder="Search here">
<button id="filterButton">search</button></span></div>

<!-- HTML markup for the video container and grid -->
<div class="video-container">
<?php   
// Retrieve the videos from the database
 // Replace the placeholders with your actual database connection and table name
$stmt = mysqli_query($conn, "SELECT * FROM bible_studies ORDER BY date DESC");
?>
    <?php while($videos = mysqli_fetch_assoc($stmt)){
    $url = $videos['url'];
    $title = $videos['title'];
    $date= $videos['date'];
    $preacher = $videos['preacher'];
    
    
    ?>
        <div class="video-item">
          <video class="video-iframe" controls>
    <source src="<?php echo $url; ?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
          <h3><?php echo $title; ?></h3>
          <p>Teacher: <?php echo $preacher; ?></p>
          <p> if video doesn't play, watch <a href="<?php echo $url; ?>">here</a></p>
          <p>Date: <?php echo $date; ?></p>
       </div>
    <?php }?>
</div>


  </section>

      <?php include "../Include/footer.php" ?>
