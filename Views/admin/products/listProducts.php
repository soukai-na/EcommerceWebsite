<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}


include_once("../../../Models/Product.php");

if (!empty($_GET['delid'])) {

    $id = $_GET['delid'];

    $product = new Product();
    $product->deleteProduct($id);
    header('location:http://localhost/Store/Views/admin/products/listProducts.php');
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
    <title>Products- Store.</title>
</head>

<body>

    <div class="container">
        <?php
        $statut3 = "hovered";
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
                    <h2>Products</h2>
                </div>
                <a href="http://localhost/Store/Views/admin/products/addProduct.php" class="btn">
                    <i class="fa-solid fa-plus"></i> Add New product
                </a>
                <div class="table">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $product = new Product();
                            $result = $product->allProducts();
                            if (mysqli_num_rows($result) != 0) {
                                while ($data = mysqli_fetch_array($result)) {
                            ?>

                                    <tr>
                                        <td><img src="http://localhost/Store/Views/uploads/<?php echo $data['image']; ?>" alt="product"></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['price']; ?> $</td>
                                        <td class='icons'>
                                            <a href="http://localhost/Store/Views/admin/products/updateProduct.php?editid=<?php echo $data['id'];  ?>" class="icon" title="Update product"><i class="fa-solid fa-pen"></i></a>
                                            <a href="http://localhost/Store/Views/admin/products/listProducts.php?delid=<?php echo $data['id'];  ?>" onclick=" return confirm('Do You really want to delete this record')" class="icon" title="Delete product"><i class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <td colspan="4" style="text-align:center;">No data found - Please add records</th>
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