    <footer>
        <div class="container">
            <div class="content">
                <h3>About</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Posuere morbi leo urna molestie at elementum eu facilisis sed.</p>
            </div>
            <div class="content">
                <h3>Products</h3>
                <?php
                include_once("../Models/Category.php");
                $category = new Category();
                $result = $category->allCategories();
                ?>
                <ul class="list">
                    <?php while ($data = mysqli_fetch_array($result)) { ?>
                        <li><?php echo $data['name']; ?></li>
                    <?php }  ?>
                </ul>
            </div>
            <div class="content">
                <h3>Contact</h3>
                <ul class="contact">
                    <li><i class="fa-solid fa-phone"></i> +82 123456789</li>
                    <li><i class="fa-solid fa-at"></i> store@business.com</li>
                    <li><i class="fa-solid fa-location-dot"></i> 4032 Doctors Drive, California,</li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright &copy; Developed by BENDAOUD SOUKAINA</p>
        </div>
    </footer>