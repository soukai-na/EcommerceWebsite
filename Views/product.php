<?php
include_once("../Models/Product.php");
include_once("../Models/Order.php");

$id = $_GET['prod'];

$product = new Product();

$data = $product->productbyid($id);



$order = new Order();

if (isset($_POST['submit'])) {

        $order->addOrder($_POST['fname'], $_POST['phone'], $_POST['address'], $_POST['product'], $_POST['quantity']);
        header('location:http://localhost/Store/Views/products.php');
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
        $color2 = "#4B8673";
        include('includes/menu.php'); 
        ?>
        <section class="display-product">
                <img src="http://localhost/Store/Views/uploads/<?php echo $data['image']; ?>" alt="">
                <div class="product-infos">
                        <h1><?php echo $data['name']; ?></h1>
                        <p class="price"><?php echo $data['price']; ?> $</p>
                        <hr>
                        <label>Description:</label>
                        <p class="description"><?php echo $data['description']; ?></p>
                        <button type="submit" class="shop-btn" id="shop-btn"><i class="fa-solid fa-cart-shopping"></i> ORDER NOW</button>
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                                <div class="modal-header">
                                        <span id="close" class="close">&times;</span>
                                        <h2>Order your <?php echo $data['name']; ?></h2>
                                </div>
                                <div class="modal-body">
                                        <form class="form" method="POST" action="">
                                                <input type="hidden" name="product" value="<?php echo $data['name']; ?>" required>
                                                <label>Full name</label>
                                                <input type="text" name="fname" required><br />
                                                <label>Phone number</label>
                                                <input type="number" name="phone" required><br />
                                                <label>Address</label>
                                                <input type="text" name="address" required><br />
                                                <div class="counter">
                                                        <span class="down" onClick='decreaseCount(event, this)'>-</span>
                                                        <input type="text" name="quantity" value="1" style="width: 30px;">
                                                        <span class="up" onClick='increaseCount(event, this)'>+</span>
                                                </div>
                                                <input type="submit" name="submit" onclick=" return alert('Your order is done')">
                                        </form>
                                </div>
                                <div class="modal-footer">
                                        <h3>Shipping is free</h3>
                                </div>
                        </div>

                </div>

        </section>
        <section class="related-products">
                <h1>Related products</h1>
                <div class="all-products" style="background-color:#F6FBF4;">
                        <?php
                        include_once("../Models/Product.php");
                        ?>
                        <?php
                        $prod = new Product();
                        $results = $prod->productsSameCategory($data['category']);
                        while ($productData = mysqli_fetch_array($results)) {
                                if ($data['name'] != $productData['name']) {
                        ?>
                                        <div class="product">
                                                <img src="http://localhost/Store/Views/uploads/<?php echo $productData['image']; ?>" alt="">
                                                <div class="infos">
                                                        <h1><?php echo $productData['name']; ?></h1>
                                                        <p><?php echo $productData['price']; ?> $</p>
                                                        <p><?php echo $productData['category']; ?></p>
                                                        <a href="http://localhost/Store/views/product.php?prod=<?php echo $productData['id']; ?>" class="shop-btn">Buy now</a>
                                                </div>
                                        </div>
                        <?php
                                }
                        }
                        ?>
                </div>
        </section>
        <?php include('includes/footer.php'); ?>
        <script language="JavaScript" type="text/javascript" src="http://localhost/Store/Views/js/script.js"></script>
</body>

</html>