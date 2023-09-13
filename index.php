<?php include 'config.php'; ?>
<?php include 'Include/header.php'?>
<link type="text/css" rel="stylesheet" href="/stylehome.css">
<body>
<?php include "Include/navigation.php";?>
<link href="/css/styles.css" rel="stylesheet" />
<style type="text/css">
  .drop-down-menu {
        z-index: 3 !important;
      }
    

    
</style>
<div class="background-overlay"></div>
<header class="bg-dark py-5 bg-transparent" >
                <div class="row gx-5 justify-content-center " >
                    <div class="col-lg-6">
                            <h1 class="display-5 fw-bolder text-white mb-2" style="color:yellow !important;">Welcome to the Chariots Of God Chapel</h1>
                            <p class="lead text-white-50 mb-4" style="color:white !important">You are indeed welcome to our community, where hearts are open and embraced with love, just as it is written in Romans 15:7: 'Accept one another, then, just as Christ accepted you, in order to bring praise to God.' May you find comfort, fellowship, and spiritual nourishment as we journey together in faith, following the path illuminated by the Word of God.</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center live" >
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" style =" background-color:red !important;"  href="#features">Join Live </a>
                                <a class="btn btn-outline-light btn-lg px-4" style =" background-color:blue;"  href="/About/about.php">Learn More</a>
                            </div>
                        </div>
                  
                <p>If you missed out on sunday service, you can watch <a  class="text-danger text-decoration-none" href="/Service/sunday_service.php"> Here </a></p>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0" style="background-color:grey !important;">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0 " style="background-color:#ffa !important;">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4" style="background-color:grey !important;">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Featured title</h2>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                        <a class="text-decoration-none" href="#!">
                            Call to action
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Testimonials section-->
        <section class="py-5 border-bottom" >
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    
                <!--    <p class="lead mb-0">Our customers love working with us</p> --> 
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Testimonial 1-->
                        <div class="card mb-4 bg-secondary" style="border:solid purple  2px;">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="">
                                        <p class="mb-4 fs-2 text-warning fw-bolder">THEME OF THE YEAR</p>
                                        <?php 
                                        $yearTheme = mysqli_query($conn, "SELECT * FROM theme_of_the_year"); 
                                        foreach($yearTheme as $theme){
                                        ?>
                                        <p class="mb-1 fs-4 text-info fw-bolder"><?php echo $theme['theme'];?></p>
                                        <p class="mb-1 text-white"><?php echo $theme['verse'];?></p>
                                        <div class="small text-warning"><?php echo $theme['scripture']; ?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card mb-4 bg-secondary" style="border:solid purple  2px;">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="">
                                    <p class="mb-4 fs-2 text-warning fw-bolder" >THEME OF THE MONTH</p>
                                        <?php 
                                        $monthTheme = mysqli_query($conn, "SELECT * FROM theme_of_the_month"); 
                                        foreach($monthTheme as $theme){
                                        ?>
                                        <p class="mb-1 fs-4 text-info fw-bolder"><?php echo $theme['theme'];?></p>
                                        <p class="mb-1 text-white"><?php echo $theme['verse'];?></p>
                                        <div class="small text-warning"><?php echo $theme['scripture']; ?> </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder text-light">Get in touch</h2>
                    <p class="lead mb-0 " style="color:white;">Signin as a Chariots Member for more follow up by email and join the Chariots Forum </p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <form  action="" method="">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="" type="text" placeholder="Enter your name..."  />
                                <label for="name">Full name</label>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="" type="email" placeholder="name@example.com" />
                                <label for="email">Email address</label>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="" type="tel" placeholder="(123) 456-7890"  />
                                <label for="phone">Phone number</label>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="" type="text" placeholder="Enter your message here..." style="height: 10rem" ></textarea>
                                <label for="message">Message</label>
                            </div>
                             <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-lg" style="background-color:purple; color:yellow;" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
      <?php include "Include/footer.php" ?>
