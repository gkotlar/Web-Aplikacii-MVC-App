<?php
require_once('../../util/main.php');
require_once('../../util/secure_conn.php');
require_once('../../util/valid_admin.php');
require_once('../../util/images.php');
require_once('../../model/product_db.php');
require_once('../../model/category_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_products';
}

$action = strtolower($action);
switch ($action) {
    case 'list_products':
        // get categories and products
        //$category_id = $_GET['category_id'];
        if (empty($category_id)) {
            $category_id = 1;
        }
        $current_category = get_category($category_id);
        $categories = get_categories();
        $products = get_products_by_category($category_id);

        // display product list
        include('product_list.php');
        break;
    case 'view_product':
        $categories = get_categories();
        $product_id = $_GET['product_id'];
        $product = get_product($product_id);
        $product_order_count = get_product_order_count($product_id);
        include('product_view.php');
        break;
    case 'delete_product':
        $category_id = $_POST['category_id'];
        $product_id = $_POST['product_id'];
        delete_product($product_id);
        
        // Display the Product List page for the current category
        header("Location: .?category_id=$category_id");
        break;
    case 'show_edit_form':
        if (isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
        } else {
            $product_id = $_POST['product_id'];
        }
        $product = get_product($product_id);
        $categories = get_categories();
        include('product_edit.php');
        break;
    case 'show_add_form':
        $categories = get_categories();
        include('product_add.php');
        break;
    case 'add_product':
        /*$category_id = $_POST['category_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $product_id = add_product($category_id, $code, $name,
                    $description, $price, $discount_percent);
            $product = get_product($product_id);
            include('product_view.php');
        }*/
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $artist_name = $_POST['artist_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $product_img = $_FILES['product_img']['name'];
        $product_img_tmp = $_FILES['product_img']['tmp_name'];
        $folder = $doc_root . '/musicshop/products/';
                
        // Validate the inputs
        if (empty($category_id) || empty($product_name) || empty($price) || empty($artist_name) || empty($product_img)) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            $product_id = add_product($category_id, $artist_name, $product_name, $price, $product_img, $description);
            $product = get_product($product_id);
            move_uploaded_file($product_img_tmp, $folder . $product_img);
            include('product_view.php');
        }
        break;
    case 'update_product':
        /*$product_id = $_POST['product_id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount_percent = $_POST['discount_percent'];
        $category_id = $_POST['category_id'];

        // Validate inputs
        if (empty($code) || empty($name) || empty($description) ||
            empty($price) ) {
            $error = 'Invalid product data.
                      Check all fields and try again.';
            include('../../errors/error.php');
        } else {
            $categories = get_categories();
            update_product($product_id, $code, $name, $description,
                           $price, $discount_percent, $category_id);
            $product = get_product($product_id);
            include('product_view.php');
        }*/
        $product_id = $_POST['product_id'];
        $category_id = $_POST['category_id'];
        $product_name = $_POST['product_name'];
        $artist_name = $_POST['artist_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $product_img = $_FILES['product_img']['name'];
        $product_img_tmp = $_FILES['product_img']['tmp_name'];
        $folder = $doc_root . '/musicshop/products/';
        $product = get_product($product_id);
                
        // Validate the inputs
        if (empty($category_id) || empty($product_name) || empty($price) || empty($artist_name)) {
            echo "<script type='text/javascript'>alert('categoryID: $category_id, productName: $product_name,
            price: $price, description: $description');</script>";
        } else {
            $categories = get_categories();
            if(!empty($product_img) && !empty($product_img_tmp)){
              move_uploaded_file($product_img_tmp, $folder . $product_img);  
            }
            else{
                $product_img = $product['imgURL'];
            }
            update_product($product_id, $category_id, $artist_name, $product_name, $price, $product_img, $description);
            $product = get_product($product_id);
            include('product_view.php');
        }

        break;
    case 'upload_image':
        $product_id = $_POST['product_id'];
        $product = get_product($product_id);
        $product_code = $product['productCode'];

        $image_filename = $product_code . '.png';
        $image_dir = $doc_root . $app_path . $image_dir . 'images/';

        if (isset($_FILES['file1'])) {
            $source = $_FILES['file1']['tmp_name'];
            $target = $image_dir . DIRECTORY_SEPARATOR . $image_filename;

            // save uploaded file with correct filename
            move_uploaded_file($source, $target);

            // add code that creates the medium and small versions of the image
            process_image($image_dir, $image_filename);

            // display product with new image
            include('product_view.php');
        }
        break;
}
?>