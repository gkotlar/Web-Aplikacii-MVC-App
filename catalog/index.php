<?php 
    require('../model/database.php');
    require('../model/product_db.php');
    require('../model/category_db.php');
    require_once('../util/main.php');
    require_once('../util/secure_conn.php');



    if (isset($_POST['categoryId'])) {
        $categoryId = $_POST['categoryId'];
    } else if (isset($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];
    } else {
        $categoryId = 0;
    }

    $category_name = get_category_name($categoryId);
    $products = get_products_by_category($categoryId);
    include('display.php');

?>
