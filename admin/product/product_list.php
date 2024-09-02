<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1 class="top">Product Manager - List Products</h1>
            <p>To view, edit, or delete a product, select the product.</p>
            <p>To add a product, select the "Add Product" link.</p>
            <?php if (count($products) == 0) : ?>
                <p>There are no products for this category.</p>
            <?php else : ?>
                <h1 class="top">All Products</h1>
                <?php foreach ($categories as $category) : ?>
                    <h3>
                        <?php echo $category['categoryName'] ?>
                    </h3>
                    <?php $category_products = get_products_by_category($category['categoryID']);
                        foreach($category_products as $product):
                    ?>
                        <a href="?action=view_product&amp;product_id=<?php
                                echo $product['productID']; ?>">
                            <?php echo $product['productName']; ?>
                        </a> <br>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
            <?php endif; ?>

            <h1>Links</h1>
            <p><a href="index.php?action=show_add_form">Add Product</a></p>

        </div>
    </div>

    <?php include '../../footer.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>