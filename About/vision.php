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
                <div class="col-lg-7 mt-5"><img  class="img-fluid rounded mb-4 mb-lg-0" src="/assets/sanchez-family-4.png" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light text-warning">Our Vision</h1>
                    <p class="text-info"> We are going to place where “The Weakest Amongst Us in Faith Shall Be like King David and The Strongest Shall Be like God.</p> <p><i class="text-danger
                "> On that day the LORD will shield those who live in Jerusalem, so that the feeblest among them will be like David, and the house of David will be like God, like the angel 
                of the LORD going before them:<i class="text-warning">   Zachariah 12:8</i></i></p>
                </div>
            </div>
            <div class="text-light"><p>This verse is part of a prophecy in the book of Zechariah, which contains a series of visions and messages from the prophet Zechariah.</p>
            <p class="text-info">the LORD will shield those who live in Jerusalem:</p><p> This part of the verse speaks of God's protection over the people of Jerusalem. It suggests that in a future time,
             God will provide a shield of protection to the inhabitants of the city.</p>
            <p class="text-info">So that the feeblest among them will be like David:</p><p>This is a powerful comparison. King David in the Bible was known for his courage and strength, especially when he 
            faced Goliath. This verse implies that even the weakest among the people of Jerusalem will be strengthened and emboldened by the Lord's protection, much like David.</p>
            <p class="text-info">And the house of David will be like God, like the angel of the LORD going before them:</p><p> This part of the verse suggests that the royal line of David (the descendants 
            of King David) will have a special divine presence and protection. They will be as mighty and awe-inspiring as the angel of the LORD leading them into battle.</p>

In summary, <i class="text-info">Zechariah 12:8</i> is a prophetic verse that speaks of a future time when God will provide extraordinary protection and strength to the people of Jerusalem, including those who are feeble. It also 
emphasizes the exalted status of the house of David, indicating that they will have a divine-like presence leading and protecting them. This verse is part of the broader context of Zechariah's prophecies 
regarding the restoration of Jerusalem and God's ultimate plan for His people.<br><br>
<div class="row align-items-center gx-4 my-4">
    <div class="col-5 col-sm-4  text-center mb-3"><button class="btn bg-primary"><a href="strategy.php" class="text-decoration-none text-white">Our Strategy</a></button></button> </div>
    <div class="col-5 col-sm-4 text-center mb-3"><button class="btn bg-primary"><a href="name.php" class="text-decoration-none text-white">Our Name</a></button></button> </div>
    <div class="col-5 col-sm-4 text-center mb-3"><button class="btn bg-primary"><a href="mandate.php" class="text-decoration-none text-white">Our Mandate</a></button></button> </div>
</div>
</div>








 <!-- Page Content-->
 <div class="background-overlay"></div>
 <?php include "../Include/footer.php" ?>