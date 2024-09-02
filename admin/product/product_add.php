<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <?php
            if (isset($product_id)) {
                $heading_text = 'Edit Product';
            } else {
                $heading_text = 'Add Product';
            }
            ?>
            <h1>Product Manager - <?php echo $heading_text; ?></h1>
            <form action="index.php" method="post" id="add_product_form" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add_product" />

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    <select class="form-select" id="inputGroupSelect01" name="category_id">
                        <option selected>Choose...</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Product Name</span>
                    <input type="text" name="product_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Artist Name</span>
                    <input type="text" name="artist_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">List Price</span>
                    <input type="input" name="price" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea name="description"class="form-control" aria-label="With textarea" rows="5" cols="30"></textarea>
                </div>
                <div class="input-group mt-3">
                    <input type="file" class="form-control" name="product_img">
                </div>
                <label>&nbsp;</label>
                <input type="submit" value="Add Product" class="btn btn-primary mt-2"/>
                
            </form>

        </div>
    </div>

    <?php include '../../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>