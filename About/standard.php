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
            <h1 class="text-info my-5 mt-sm-0">What Is Expected From Every Chariot!</h1>
            <p class="text-light">Every “Chariots Member” MUST ABIDE by the following standards:</p>
            <ul class="text-light mb-5">
            <li>HOLINESS shall be our LIFESTYLE;</li>
            <li>HEAVEN shall be our only FOCUS;</li>
            <li>GENUINE LOVE for one another shall be our CHARACTER </li>
            <li>PUNCTUALITY AND ORDERLINESS in church shall be our IDENTITY.</li>
            <li>GIVING to  the work of God shall be our NATURE</li>
            </ul>

              <div class="row align-items-center gx-4 my-4">
    <div class="col-6 text-center my-5"><button class="btn bg-primary"><a href="vision.php" class="text-decoration-none text-white">Our Vision</a></button></button> </div>
    <div class="col-6 text-center my-5"><button class="btn bg-primary"><a href="name.php" class="text-decoration-none text-white">Our Name</a></button></button> </div>
</div>
</div>








 <!-- Page Content-->
 <div class="background-overlay"></div>
 <?php include "../Include/footer.php" ?>