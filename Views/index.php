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
    $color1 = "#4B8673";
    include('includes/menu.php'); 
    ?>
    <section class="slide">
        <img src="http://localhost/Store/Views/images/slide.gif" alt="">
    </section>
    <section class="products">
        <div class="title">
            <h1>OUR PRODUCTS</h1>
        </div>
        <div class="parts">
            <?php
            include_once("../Models/Product.php");
            $product = new Product();
            $result = $product->homeProducts();
            if (mysqli_num_rows($result) != 0) {
                while ($data = mysqli_fetch_array($result)) {
            ?>
                    <div class="part">
                        <img src="http://localhost/Store/Views/uploads/<?php echo $data['image']; ?>" alt="">
                        <div class="infos">
                            <h1><?php echo $data['name']; ?></h1>
                            <p><?php echo $data['price']; ?> $</p>
                            <a href="http://localhost/Store/views/product.php?prod=<?php echo $data['id']; ?>" class="shop-btn">Buy now</a>
                        </div>
                    </div><?php
                        }
                    }
                            ?>
        </div>
        <div class="link">
            <a href="http://localhost/Store/Views/products.php">>>> See more products</a>
        </div>
    </section>
    <section class="numbers">
        <div class="container">
            <div class="counter">
                <div class="number">
                    <span>+</span>
                    <p data-target="50" class="count">0</p>
                </div>
                <h6>Products</h6>
            </div>
            <div class="counter">
                <div class="number">
                    <span>+</span>
                    <p data-target="1000" class="count">0</p>
                </div>
                <h6>Clients</h6>
            </div>
            <div class="counter">
                <div class="number">
                    <span>+</span>
                    <p data-target="10" class="count">0</p>
                </div>
                <h6>Stores</h6>
            </div>
        </div>
    </section>
    <section class="reviews">
        <h2 class="title">Reviews</h2>
        <div class="cards">
            <div class="card">
                <img src="http://localhost/Store/Views/images/person2.jpg" alt="">
                <div class="infos">
                    <h5>Alfredo Perry</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="http://localhost/Store/Views/images/person4.jpeg" alt="">
                <div class="infos">
                    <h5>David Yoder</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="http://localhost/Store/Views/images/person1.jpg" alt="">
                <div class="infos">
                    <h5>Tony Henson</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="delivery-infos">
        <img src="http://localhost/Store/Views/images/delivery.png" alt="">
        <div class="infos">
            <h1>Fast & Free delivery</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis tellus id interdum velit laoreet id donec. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras.</p>
            <a href="http://localhost/Store/Views/products.php"><button>SHOP NOW</button></a>
        </div>
    </section>
    <?php include('includes/footer.php'); ?>
    <script language="JavaScript" type="text/javascript" src="http://localhost/Store/Views/js/script.js"></script>
</body>

</html>