<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <?php include './header.php'; ?>
    <div class="container p-0">
        <div>
            <h3 class="text-center py-2">Home</h3>
            <h5 class="text-center nav-link mb-3">Featured Items</h5>
        </div>
        <div class="row mb-2 mx-3">
            <?php foreach($ids_rand as $rand_num) : ?>
                <?php $product = get_product($rand_num) ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?php echo './products/' . $product['imgURL'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['productName'] ?></h5>
                            <p class="card-text"><?php echo $product['artistName'] ?></p>
                            <p class="card-text"><?php echo '$'.$product['listPrice'] ?></p>
                            <?php if(isset($_SESSION['user'])): ?>
                                <form action="/Web-Aplikacii-MVC-App/cart/" method="get" style="display:inline;">
                                    <input type="hidden" name="action" value="add" />
                                    <input type="hidden" name="product_id"
                                        value="<?php echo $product['productID']; ?>" />
                                    <input type="hidden" name="quantity" value="1" />
                                    <input type="submit" value="Add to Cart" class="btn btn-primary"/>
                                </form>
                            <?php endif; ?>
                            <a href="<?php echo '/Web-Aplikacii-MVC-App/details/?productId=' . $product['productID'] ?>" class="btn btn-secondary">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php include './footer.php'; ?>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>