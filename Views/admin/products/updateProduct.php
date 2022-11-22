<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}
include_once("../../../Models/Category.php");
include_once("../../../Models/Product.php");

$id = $_GET['editid'];

$product = new Product();

$data = $product->productbyid($id);

if (isset($_POST['submit'])) {



    $product->updateProduct($_POST['name'], $_POST['price'], $_POST['description'], $_POST['category'], $id);
    header('location:http://localhost/Store/Views/admin/products/listProducts.php');
}

if (isset($_POST['picture'])) {
    $image = $_FILES["image"]["name"];
    $extension = substr($image, strlen($image) - 4, strlen($image));
    $allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif");

    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
        //rename the image file
        $imgnewfile = md5($imgfile) . time() . $extension;
        move_uploaded_file($_FILES["image"]["tmp_name"], "../../uploads/" . $imgnewfile);
    }


    $product->updatePicture($imgnewfile,  $id);
    header('location:http://localhost/Store/Views/admin/products/listProducts.php');
}




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
    <title>Edit product- Store.</title>
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
                    <h2>Update category</h2>
                </div>
                <div class="update-image">
                    <img src="http://localhost/Store/Views/uploads/<?php echo $data['image']; ?>" alt="">
                    <div class="update-btn">
                        <span id="edit-btn">Update Product Image</span>
                    </div>
                </div>

                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span id="close" class="close">&times;</span>
                            <h2>Edit <?php echo $data['name']; ?></h2>
                        </div>
                        <div class="modal-body">
                            <form class="form" method="POST" action="" enctype="multipart/form-data">
                                <label>Product image:</label>
                                <input type="file" name="image" required><br>
                                <input type="submit" name="picture" onclick=" return alert('The image is updated')">
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>

                </div>


                <form class="form" method="POST" action="" enctype="multipart/form-data">


                    <label>name</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br />

                    <label>Price</label>
                    <span class="reminder">The price in $.</span>
                    <input type="number" step="0.01" name="price" value="<?php echo $data['price']; ?>" required><br />

                    <label>description</label>
                    <textarea name="description" id="description" cols="30" rows="10" required><?php echo $data['description']; ?> </textarea><br />

                    <label>Category</label>
                    <?php
                    $category = new Category();
                    $result = $category->allCategories();
                    ?>
                    <select name="category" value="<?php echo $data['category']; ?>" required>
                        <option value="Autres">Autres</option>
                        <?php
                        while ($dataoption = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $dataoption['name'] ?>" <?php if ($dataoption['name'] == $data['category']) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $dataoption['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>

                    <input type="submit" name="submit">

                </form>

            </div>
        </div>

    </div>
    <script src="http://localhost/Store/Views/js/admin-script.js"></script>
</body>

</html>