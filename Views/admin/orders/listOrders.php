<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}


include_once("../../../Models/Order.php");

if (!empty($_GET['delid'])) {

    $id = $_GET['delid'];

    $order = new Order();
    $order->deleteOrder($id);
    header('location:http://localhost/Store/Views/admin/orders/listOrders.php');
}

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
    <title>Orders- Store.</title>
</head>

<body>

    <div class="container">
        <?php
        $statut4 = "hovered";
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
            <div class="body">
                <div class="title">
                    <h2>Orders</h2>
                </div>
                <div class="table">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Full name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $order = new Order();
                            $result = $order->allOrders();
                            if (mysqli_num_rows($result) != 0) {
                                while ($data = mysqli_fetch_array($result)) {
                            ?>

                                    <tr>
                                        <td><?php echo $data['product']; ?></td>
                                        <td><?php echo $data['fname']; ?></td>
                                        <td><?php echo $data['quantity']; ?></td>
                                        <td class='icons'>
                                            <a href="http://localhost/Store/Views/admin/orders/listOrder.php?orderId=<?php echo $data['id'];  ?>" class="icon" title="Show order"><i class="fa-solid fa-eye"></i></a>
                                            <a href="http://localhost/Store/Views/admin/orders/listOrders.php?delid=<?php echo $data['id'];  ?>" onclick=" return confirm('Do You really want to delete this order')" class="icon" title="Delete order"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <td colspan="3" style="text-align:center;">There is no order yet!</th>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <script src="http://localhost/Store/Views/js/admin-script.js"></script>
</body>

</html>