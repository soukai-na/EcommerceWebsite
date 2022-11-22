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
    <section class="search">
        <input class="search__input" type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search">
    </section>
    <section class="all-products" id="myDiv">
        <?php
        include_once("../Models/Category.php");
        include_once("../Models/Product.php");

        $product = new Product();
        $results = $product->allProducts();
        while ($productData = mysqli_fetch_array($results)) {
        ?><span>
                <div class="product">
                    <img src=" http://localhost/Store/Views/uploads/<?php echo $productData['image']; ?>" alt="">
                    <div class="infos">
                        <h1><?php echo $productData['name']; ?></h1>
                        <p><?php echo $productData['price']; ?> $</p>
                        <p><?php echo $productData['category']; ?></p>
                        <a href="http://localhost/Store/views/product.php?prod=<?php echo $productData['id']; ?>" class="shop-btn">Buy now</a>
                    </div>
                </div>
            </span>
        <?php
        }
        ?>
    </section>
    <?php include('includes/footer.php'); ?>
    <script language="JavaScript" type="text/javascript" src="http://localhost/Store/Views/js/script.js"></script>
</body>

</html>