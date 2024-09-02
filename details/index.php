<?php 
    require('../model/database.php');
    require('../model/product_db.php');
    require('../model/category_db.php');
    require_once('../util/main.php');
    require_once('../util/secure_conn.php');



    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];
    } else if (isset($_GET['productId'])) {
        $productId = $_GET['productId'];
    } else {
        $productId = 0;
    }

    $product = get_product($productId);
    include('view_details.php');

?>
