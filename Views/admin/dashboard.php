<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}

include_once('../../Models/User.php');

$user = new User();

//fetch user data
$sql = "SELECT * FROM user WHERE id = '" . $_SESSION['user'] . "'";
$row = $user->details($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ecommerce website">
    <link rel="stylesheet" href="http://localhost/Store/Views/css/admin-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="shortcut icon" href="http://localhost/Store/Views/images/logo%20--white.svg" type="image/x-icon">
    <title>Store.</title>
</head>

<body>
    <div class="container">
        <?php
        $statut1 = "hovered";
        include('../includes/admin-navbar.php'); ?>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa-solid fa-bars icon"></i>
                </div>
                <div class="user">
                    <img src="http://localhost/Store/Views/images/admin.jpg" alt="admin">
                </div>
            </div>
            <h1>Hello, <?php echo $row['fname']; ?></h1>
            <div class="dashboard">
                <?php
                include_once("../../Models/Product.php");
                include_once("../../Models/Category.php");
                include_once("../../Models/Order.php");
                include_once("../../Models/Contact.php");

                $product = new Product();
                $prodresults = $product->allProducts();
                $productcount = mysqli_num_rows($prodresults);

                $category = new Category();
                $categresults = $category->allCategories();
                $categorycount = mysqli_num_rows($categresults);

                $order = new Order();
                $odrresults = $order->allOrders();
                $ordercount = mysqli_num_rows($odrresults);

                $msg = new Contact();
                $msgresults = $msg->allMessages();
                $msgcount = mysqli_num_rows($msgresults);

                ?>
                <div class="stat">
                    <h2>Products</h2>
                    <p><?php echo $productcount; ?></p>
                </div>
                <div class="stat">
                    <h2>Categories</h2>
                    <p><?php echo $categorycount; ?></p>
                </div>
                <div class="stat">
                    <h2>Orders</h2>
                    <p><?php echo $ordercount; ?></p>
                </div>
                <div class="stat">
                    <h2>Messages</h2>
                    <p><?php echo $msgcount; ?></p>
                </div>
            </div>
            <div class="galleries">
                <?php
                while ($productData = mysqli_fetch_array($prodresults)) {
                ?>
                    <div class="gallery">
                        <img src="http://localhost/Store/Views/uploads/<?php echo $productData['image']; ?>">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://localhost/Store/Views/js/admin-script.js"></script>



</body>

</html>