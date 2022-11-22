<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim($_SESSION['user']) == '')) {
    header('location:http://localhost/Store/Views/admin/admin-login.php');
}

include_once("../../../Models/Category.php");

$id = $_GET['editid'];

$category = new Category();

$data = $category->categorybyid($id);

if (isset($_POST['submit'])) {



    $category->updateCategory($_POST['name'], $_POST['description'], $id);
    header('location:http://localhost/Store/Views/admin/categories/listCategories.php');
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
    <title>Edit category- Store.</title>
</head>

<body>

    <div class="container">
        <?php
        $statut2 = "hovered";
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
                <form class="form" method="POST" action="">

                    <label>name</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br />

                    <label>description (facultatif)</label>
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $data['description']; ?></textarea><br />



                    <input type="submit" name="submit">

                </form>

            </div>
        </div>

    </div>
    <script src="http://localhost/Store/Views/js/admin-script.js"></script>
</body>

</html>