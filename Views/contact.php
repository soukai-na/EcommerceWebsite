<?php
include_once("../Models/Contact.php");
$message = new Contact();

if (isset($_POST['submit'])) {

    $message->sendMessage($_POST['fname'], $_POST['email'], $_POST['message']);
    header('location:http://localhost/Store/Views/contact.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ecommerce website">
    <link rel="stylesheet" href="http://localhost/Store/Views/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="shortcut icon" href="http://localhost/Store/Views/images/logo%20--white.svg" type="image/x-icon">
    <title>Store.</title>
</head>

<body>
    <?php
    $color3 = "#4B8673";
    include('includes/menu.php'); 
    ?>
    <h1 class="contact-title">Contact us</h1>
    <section class="contact-form">
        <div class="contact">
            <div class="social-media">
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
            <hr>
            <div class="formulaire">
                <form class="form" method="POST" action="">

                    <label>Full name</label>
                    <input type="text" name="fname" placeholder="Enter your name" required><br />

                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required><br />

                    <label>Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" required></textarea><br />



                    <input type="submit" name="submit" value="Send message" onclick=" return alert('Your message is successfully received')">

                </form>
            </div>
        </div>

        <img src="http://localhost/Store/Views/images/contact.gif" alt="">
    </section>
    <?php include('includes/footer.php'); ?>
    <script language="JavaScript" type="text/javascript" src="http://localhost/Store/Views/js/script.js"></script>
</body>

</html>