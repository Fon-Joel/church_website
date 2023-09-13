<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config.php';
// Retrieve the search query from the GET parameters
?>
<?php include "../Include/header.php"?>
<link href="/css/styles.css" rel="stylesheet" />
<body>
        <?php include "../Include/navigation.php";?>

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
 <?php 
       $anouncement = mysqli_query($conn, "SELECT * FROM announcement");
?>
<ul>
    <?php foreach ($anouncement as $text) : ?>
    <li> <?php echo $text['data']; ?> </li>
      <?php endforeach; ?>
      </ul>
</section>
      <section class="theme-section">
      <?php
// Retrieve the leaders' information from the database
$themes_year = mysqli_query($conn, "SELECT * FROM theme_of_the_year");
?>
 <div class="card-body p-4 ">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-4 fs-2 text-danger">THEME OF THE YEAR</p>
                                        <?php 
                                        $yearTheme = mysqli_query($conn, "SELECT * FROM theme_of_the_year"); 
                                        foreach($yearTheme as $theme){
                                        ?>
                                        <p class="mb-1 fs-4 text-primary"><?php echo $theme['theme'];?></p>
                                        <p class="mb-1 text-secondary"><?php echo $theme['verse'];?></p>
                                        <div class="small text-muted"><?php echo $theme['scripture']; ?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4 ">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                    <div class="ms-4">
                                    <p class="mb-4 fs-2 text-danger" >THEME OF THE MONTH</p>
                                        <?php 
                                        $monthTheme = mysqli_query($conn, "SELECT * FROM theme_of_the_month"); 
                                        foreach($monthTheme as $theme){
                                        ?>
                                        <p class="mb-1 fs-4 text-primary"><?php echo $theme['theme'];?></p>
                                        <p class="mb-1 text-secondary"><?php echo $theme['verse'];?></p>
                                        <div class="small text-muted"><?php echo $theme['scripture']; ?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                                        </div>
                                             <section class="current-events">
    <?php include "../Include/footer.php" ?>
