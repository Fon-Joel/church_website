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
 <div class=" px-4 px-lg-4 " >
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5 ">
                <div class="col-lg-7 mt-5"><img  class="img-fluid rounded mb-4 mb-lg-0" src="/assets/sanchez-family-3.png" alt="..." /></div>
                <div class="col-lg-5 mt-lg-5">
                    <h1 class="font-weight-light text-warning">Our Name</h1>
                    <p class="text-info">We are the Chariots of God</p><p> <i class="text-danger
                "> The chariots of God are tens of thousands and thousands of thousands; the Lord has come from Sinai into his sanctuary.<i class="text-warning">   Psalm 68:17</i></i></p>
                <h2 class="font-weight-light text-warning">Our Congregation</h2>
                <p class="text-white">When ever the chariots of God gather together, they shall be called <i class="text-info">Chariots of God Chapel (CGC)</i></p>
                </div>
            </div>
            <div class="text-light"><p>The verse highlights the grandeur and majesty of God's presence by using the imagery of chariots. </p>
            <p class="text-info">The chariots of God are tens of thousands and thousands of thousands...</p><p> This part of the verse emphasizes the vast number and might of God's heavenly chariots.
            Chariots were formidable war machines in ancient times, often associated with kings and conquerors. In this context, they symbolize God's power and authority. The phrase "tens of thousands
             and thousands of thousands" signifies an innumerable host or multitude, emphasizing the overwhelming nature of God's power.</p>
            <p class="text-info">...the Lord has come from Sinai into his sanctuary:</p><p>This part of the verse suggests a significant event. It mentions God coming from Mount Sinai into His sanctuary. 
            Mount Sinai is a historically significant location in the Bible where God gave the Ten Commandments to Moses. It represents the place of divine revelation and the establishment of God's covenant
             with the Israelites.</p>
             God's journey from Sinai to His sanctuary signifies His presence and glory coming to rest in the Temple, which was considered His earthly dwelling place in Jerusalem. This movement from Sinai to 
             the sanctuary is a powerful image of God's divine presence descending upon His people.<br>
In summary,<i class="text-info"> Psalm 68:17</i> underscores the idea that God's power is immense, as symbolized by the countless chariots, and it also emphasizes the notion of God's presence and glory descending upon His sanctuary,
 bringing His divine authority and protection to His people. This verse is part of a larger psalm that celebrates God's victorious and majestic nature.
<div class="row align-items-center gx-4 my-4">
    <div class="col-6 text-center"><button class="btn bg-primary"><a href="vision.php" class="text-decoration-none text-white">Our Vision</a></button></button> </div>
    <div class="col-6 text-center"><button class="btn bg-primary"><a href="mandate.php" class="text-decoration-none text-white">Our Mandate</a></button></button> </div>
</div>
<div>








 <!-- Page Content-->
 <div class="background-overlay"></div>
 <?php include "../Include/footer.php" ?>