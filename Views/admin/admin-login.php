<?php
//start session
session_start();

//redirect if logged in
if (isset($_SESSION['user'])) {
    header('location:http://localhost/Store/Views/admin/dashboard.php');
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
    <title>Login- Store.</title>
</head>

<body>
    <main class="login-admin">
        <div class="logo-login">
            <img src="http://localhost/Store/Views/images/logo%20--white.png" alt="logo">
        </div>
        <div class="form">
            <form action="http://localhost/Store/Controllers/login.php" method="post">
                <div class="title">
                    <h1>Login</h1>

                    <?php
                    if (isset($_SESSION['message'])) {
                    ?>
                        <div class="danger">
                            <?php echo $_SESSION['message']; ?>
                        </div>
                    <?php

                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-user icon"></i>
                    <input type="text" name="username" placeholder="Write your username" required>
                </div>
                <div class="input-container">
                    <i class="fa-solid fa-lock icon"></i>
                    <input type="password" name="password" placeholder="Write your password" required>
                </div>
                <input type="submit" name="login" value="Submit">
            </form>
        </div>
    </main>
</body>

</html>