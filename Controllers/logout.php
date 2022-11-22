<?php
session_start();
session_destroy();

header('location:http://localhost/Store/Views/admin/admin-login.php');
