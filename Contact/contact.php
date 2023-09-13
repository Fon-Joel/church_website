<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../config.php';
// Retrieve the search query from the GET parameters
?>
<?php include "../Include/header.php"?>

<body>
    <?php include "../Include/navigation.php";?>
    <header>
        <h1>Contact Us</h1>
    </header>
        <section class="prayer-request">
            <h3>If you have any prayer request, you can fill in the form below so that our Pastor can join you in seeking God's guidance, comfort, and blessings during this time of need</h3>
            <p class="note"> Send your Request to the church Below</p>
            <form id="contactForm" method="POST" action="send_email.php">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="optional, but it is advice to fill this field for proper follow up">
                 <label for="email">Email</label>
                 <input type="email" id="email" name="email" placeholder="optional, but it is advice to fill this field for proper follow up">
                <label for="country">country<label>
                <input type="text" id="country" name="country" required>
                <label for="date">date</label>
                <input type="date" id="date" name="date" required>
                <label for="message">prayer request</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
        <section class="contact-us">
        <div class="contact-container">
         <p>For more information and guidance, contact Pst. Sanchez by clicking;</p>
      <div> <i class="fa-brands fa-whatsapp"></i> <a href="https://wa.me/+237651767482" target="_blank">Click here to send message on WhatsApp</a></div>
       <div><i class="fa-brands fa-facebook"></i><a href="https://www.facebook.com/messages/your-page-id" target="_blank">Click here to send message on Facebook</a></div>
<div><i class="fa-solid fa-envelope"></i><a href="mailto:pssanchez2016@gmail.com">Click here to send an email</a></div>
</section>
<?php include "../Include/footer.php" ?>
