<div class="navigation" id="navigation">
    <ul>
        <li>
            <a href="http://localhost/Store/Views/admin/dashboard.php">
                <img src="http://localhost/Store/Views/images/logo%20--white.png" alt="logo">
            </a>
        </li>
        <li class="<?php echo $statut1; ?>">
            <a href="http://localhost/Store/Views/admin/dashboard.php">
                <i class="fa-solid fa-house-chimney icon"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="<?php echo $statut2; ?>">
            <a href="http://localhost/Store/Views/admin/categories/listCategories.php">
                <i class="fa-solid fa-layer-group icon"></i>
                <span class="title">Categories</span>
            </a>
        </li>
        <li class="<?php echo $statut3; ?>">
            <a href="http://localhost/Store/Views/admin/products/listProducts.php">
                <i class="fa-solid fa-box icon"></i>
                <span class="title">Products</span>
            </a>
        </li>
        <li class="<?php echo $statut4; ?>">
            <a href="http://localhost/Store/Views/admin/orders/listOrders.php">
                <i class="fa-solid fa-cart-shopping icon"></i>
                <span class="title">Orders</span>
            </a>
        </li>
        <li class="<?php echo $statut5; ?>">
            <a href="http://localhost/Store/Views/admin/contacts/messages.php">
                <i class="fa-solid fa-message icon"></i>
                <span class="title">Messages</span>
            </a>
        </li>
        <li class="<?php echo $statut6; ?>">
            <a href="http://localhost/Store/Controllers/logout.php">
                <i class="fa-solid fa-right-from-bracket icon"></i>
                <span class="title">Logout</span>
            </a>
        </li>
    </ul>
</div>