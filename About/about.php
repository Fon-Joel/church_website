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

 <!-- Page Content-->
 <div class="background-overlay"></div>
 <div class=" px-4 px-lg-4 " >
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5 ">
                <div class="col-lg-7 mt-5"><img  class="img-fluid rounded mb-4 mb-lg-0" src="/assets/church-babtism.png" alt="..." /></div>
                <div class="col-lg-5">
                    <h1 class="font-weight-light text-warning">Chariots Of God Chapel</h1>
                    <p class="text-light"> Welcome to Chariots Of God Chapel We are thrilled that you have taken the time to visit our website and learn more about our church community.</p>
                    <a class="btn btn-primary" href="#!">Read more</a>
                </div>
            </div>
            <!-- Call to Action-->
            <div class="card my-5 py-4 text-center" style="background-color:purple !important;">
                <p class=" m-0 " style="color:yellow !important;">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
            </div>
            <!-- leadership section -->
            <section class="leadership-section">
    <h2 class="text-warning">Leadership Team</h2>
    <div id="leaders-container" class="leaders-container">
      <div class="leader">

<?php
// Retrieve the leaders' information from the database
$query = mysqli_query($conn, "SELECT * FROM leaders");
?> 

<!-- Generate the HTML to display the leaders -->
<?php foreach ($query as $leader) : ?>
  <div class="border-top border-1 border-info pt-3">
   <img src="<?php echo  $leader['image'] ?>" alt="Leader Image">
    <h3 class="text-white"><?php echo  $leader['name'] ?></h3>
    <p class="text-info">Role: <?php echo $leader['position'] ?></p>
     </div>
<?php endforeach; ?>
</div>
  </div>
  </section>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100 border border-2 border-secondary bg-secondary">
                        <div class="card-body">
                            <h2 class="text-warning">The Mandate</h2>
                            <p class="text-light fst-italic">“Go and Bring My People out of bondage by revealing to them the hidden might I have kept inside of them”.<br> (Judges 6:14)</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm text-white" href="mandate.php">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5 ">
                    <div class="card h-100 border border-2 border-secondary bg-secondary">
                        <div class="card-body ">
                            <h2 class="text-warning">Our Vision</h2>
                            <p class="text-light fst-italic">We are going to place where “The Weakest Amongst Us in Faith Shall Be like King David and The Strongest Shall Be like God.<br> (Zechariah 12:8)</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm text-white" href="vision.php">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100 border border-2 border-secondary bg-secondary">
                        <div class="card-body">
                            <h2 class="text-warning ">Our Name</h2>
                            <p class="text-light fst-italic">We are “CHARIOTS OF GOD”: The chariots of God are tens of thousands and thousands of thousands; the Lord has come from Sinai into his sanctuary.<br>(Psalms 68:17)</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary btn-sm text-white" href="name.php">More Info</a></div>
                    </div>
                </div>
            </div>
        </div>
    <div class="px-0 px-sm-0 m-0">
      <div class="row align-items-center mb-4">
        <div class="col-6 text-center ps-4">
          <p class="text-light fs-5">Every Chariots Must abide by the following standards</p>
          <button class="btn text-white bg-primary"><a href="standard.php" class="text-light text-decoration-none">Read More</a></button>
        </div>
        <div class="col-6 pe-4">
          <img src="/assets/church-car-dedictation.png" alt="church-image" class="img-fluid rounded-pill border border-success">
        </div>


      </div>
    </div>
        <?php include "../Include/footer.php" ?>
  