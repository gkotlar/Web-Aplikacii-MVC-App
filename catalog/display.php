<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../styles.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <div class="container p-0">
        <?php include '../header.php'; ?>
        <div>
            <h3 class="text-center py-2"><?php echo $category_name?></h3>
        </div>
        <div class="row mb-2 mx-3">
            <?php foreach($products as $product) : ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?php echo '../products/' . $product['imgURL'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['productName'] ?></h5>
                        <p class="card-text"><?php echo $product['artistName'] ?></p>
                        <p class="card-text"><?php echo '$'.$product['listPrice'] ?></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                        <a href="<?php echo '/Web-Aplikacii-MVC-App/details/?productId=' . $product['productID'] ?>" class="btn btn-secondary">Details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php include '../footer.php'; ?>












<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>