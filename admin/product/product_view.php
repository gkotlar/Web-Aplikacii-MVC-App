<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1>Product Manager - View Product</h1>
            
            <!-- display product -->
            <div class="my-2">
                <h3 class="text-center">Details</h3>
                <h5 class="text-center"><?php echo $product['productName']?></h5>
                <h6 class="text-center"><strong><?php echo $product['artistName']?></strong></h6>
            </div>
            <div class="container-fluid" style="width: 70%">
                <div class="row">
                    <div class="col-md-8">
                        <img src="<?php echo '../../products/' . $product['imgURL'] ?>" class="img-thumbnail" style="height: 90%"/>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group list-group-flush pb-2">
                            <li class="list-group-item"><strong>Title:</strong> <?php echo $product['productName'] ?></li>
                            <li class="list-group-item"><strong>Artist:</strong> <?php echo $product['artistName'] ?></li>
                            <li class="list-group-item"><strong>Category:</strong> <?php echo $product['categoryName'] ?></li>
                            <li class="list-group-item"><strong>Price:</strong> <?php echo '$' . $product['listPrice'] ?></li>
                            <li class="list-group-item"><strong>Description:</strong> <?php echo $product['description'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- display buttons -->
            <br />
            <div id="edit_and_delete_buttons">
                <form action="" method="post" id="edit_button_form" >
                    <input type="hidden" name="action" value="show_edit_form"/>
                    <input type="hidden" name="product_id"
                        value="<?php echo $product['productID']; ?>" />
                    <input type="hidden" name="category_id"
                        value="<?php echo $product['categoryID']; ?>" />
                    <input type="submit" value="Edit Product" class="btn btn-primary mb-1"/>
                </form>
                <form action="" method="post" id="delete_button_form" >
                    <input type="hidden" name="action" value="delete_product"/>
                    <input type="hidden" name="product_id"
                        value="<?php echo $product['productID']; ?>" />
                    <input type="hidden" name="category_id"
                        value="<?php echo $product['categoryID']; ?>" />
                    <input type="submit" value="Delete Product" class="btn btn-danger mb-1"/>
                </form>
            </div>
        </div>
    </div>


    <?php include '../../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>