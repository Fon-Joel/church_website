<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../config.php';
?>
<?php include '../Include/header.php' ?>
<link href="/css/styles.css" rel="stylesheet" />

<body>
    <?php include "../Include/navigation.php";?>


<style type="text/css">
body::after {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("/assets/crowd.png");
      background-repeat: no-repeat;
      background-size: cover;
      z-index:-2;
    }
    .background-overlay {
      position: fixed !important ;
      top: 0 !important;
      left: 0 !important;
      width: 100% !important;
      height: 100% !important;
      background-color: black !important; /* Adjusted to set dark opacity */
      z-index: -1 !important;
      opacity:0.7 !important;
    }
  </style>

<div class="background-overlay"></div>
 <div class=" px-4 px-lg-4 my-5 pt-3" >
            <!-- Heading Row-->
            <h1 class="text-info">Our Strategy</h1>
            <p class="text-light">We shall RAISE “CHARIOTS OF GOD” In Every Quarter, Village, Town, and Nation of the Earth by:</p>
            <ul class="text-light mb-5">
            <li>Preaching The Undiluted Gospel of Jesus Fearlessly To The Lost;</li>
            <li>Organizing Evangelistic Outreaches And Crusades to meet the Lost;</li>
            <li>Engaging Practical Prayers and Deliverance as a Tool For Spiritual Growth And Stability in Church;</li>
            <li>Planting A New Church After Every Two Years of existence in a place;</li>
            <li>Creating the Chariots Academy Institutions To Educate Our Children;</li>
            <li>Creating the Chariots Medical Foundations For Physical Wellbeing of members;</li>
            <li>Creating the Chariots School Of Ministry For Pastoral Training;</li>
            <li>Creating social centers like Orphanages and rehabilitation centers to Take Care Of The Needy; Etc...</li>
            </ul>

              <div class="row align-items-center gx-4 my-4">
    <div class="col-6 text-center"><button class="btn bg-primary"><a href="vision.php" class="text-decoration-none text-white">Our Vision</a></button></button> </div>
    <div class="col-6 text-center"><button class="btn bg-primary"><a href="name.php" class="text-decoration-none text-white">Our Name</a></button></button> </div>
</div>
</div>








 <!-- Page Content-->
 <div class="background-overlay"></div>
 <?php include "../Include/footer.php" ?>