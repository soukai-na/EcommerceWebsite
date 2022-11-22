<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}
include_once("../../../Models/Contact.php");

$id = $_GET['id'];

$message = new Contact();

$data = $message->messagebyid($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ecommerce website">
    <link rel="stylesheet" href="http://localhost/Store/Views/css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="shortcut icon" href="http://localhost/Store/Views/images/logo%20--white.svg" type="image/x-icon">
    <title>Contact- Store.</title>
</head>

<body>
    <div class="container">
        <?php
        $statut5 = "hovered";
        include('../../includes/admin-navbar.php'); ?>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-bars icon"></i>
                </div>
                <div class="user">
                    <img src="http://localhost/Store/Views/images/admin.jpg" alt="admin">
                </div>
            </div>
            <div class="card">
                <h1>Contact:</h1>
                <div class="item">
                    <i class="fa-solid fa-user"></i>
                    <label>Full name:</label>
                    <p><?php echo $data['fname']; ?></p>
                </div>
                <div class="item">
                    <i class="fa-solid fa-at"></i>
                    <label>Email:</label>
                    <p><?php echo $data['email']; ?></p>
                </div>
                <div class="item">
                    <i class="fa-solid fa-message"></i>
                    <label>Message:</label>
                    <p><?php echo $data['message']; ?></p>
                </div>
            </div>
        </div>

    </div>
    <script src="http://localhost/Store/Views/js/admin-script.js"></script>
</body>

</html>