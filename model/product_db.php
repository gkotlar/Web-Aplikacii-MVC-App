<?php
function get_products_by_category($category_id) {
    global $db;
    $query = '
        SELECT *
        FROM products p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
        WHERE p.categoryID = :category_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product($product_id) {
    global $db;
    $query = '
        SELECT *
        FROM products p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
       WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function get_product_order_count($product_id) {
    global $db;
    $query = '
        SELECT COUNT(*) AS orderCount
        FROM orderitems
        WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $product = $statement->fetch();
        $order_count = $product['orderCount'];
        $statement->closeCursor();
        return $order_count;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function add_product($category_id, $artistName, $productName, $price,
        $imgurl, $description) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, artistName, productName, listPrice, imgURL, description, dateAdded)
              VALUES
                 (:category_id, :artistName, :productName, :listPrice, :imgURL,
                  :description, NOW())';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':artistName', $artistName);
        $statement->bindValue(':productName', $productName);
        $statement->bindValue(':listPrice', $price);
        $statement->bindValue(':imgURL', $imgurl);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();

        // Get the last product ID that was automatically generated
        $product_id = $db->lastInsertId();
        return $product_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function update_product($product_id, $category_id, $artistName, 
            $productName, $price, $imgurl, $desc) {
    global $db;
    $query = '
        UPDATE products
        SET categoryID= :category_id,
            artistName = :aName,
            productName = :pName,
            listPrice = :price,
            imgURL = :imgurl
            description = :desc
        WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);

        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':aName', $artistName);
        $statement->bindValue(':pName', $productName);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':imgurl', $imgurl);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM products WHERE productID = :product_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        display_db_error($error_message);
    }
}
?>