<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Address</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1 class="top"><?php echo $heading; ?></h1>
            <form action="" method="post" id="edit_address_form">
                <input type="hidden" name="action" value="update_address" />
                <?php if ($billing) : ?>
                    <input type="hidden" name="address_type" value="billing" />
                <?php else: ?>
                    <input type="hidden" name="address_type" value="shipping" />
                <?php endif; ?>
                <label for="line1">Address:</label>
                <input type="text" name="line1" value="<?php echo $line1; ?>" />
                <br />
                <label for="line2">Line 2:</label>
                <input type="text" name="line2" value="<?php echo $line2; ?>" />
                <br />
                <label for="city">City:</label>
                <input type="text" name="city" value="<?php echo $city; ?>" />
                <br />
                <label for="state">State:</label>
                <input type="text" name="state" value="<?php echo $state; ?>" />
                <br />
                <label for="zip">Zip Code:</label>
                <input type="text" name="zip" value="<?php echo $zip; ?>" />
                <br />
                <label for="phone">Phone:</label>
                <input type="text" name="phone" value="<?php echo $phone; ?>" />
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="<?php echo $heading; ?>" class="btn btn-primary my-2"/>
                <br />
                <form action="" method="post">
                    <label>&nbsp;</label>
                    <input type="submit" value="Cancel" class="btn btn-danger"/>
                </form>
            </form>
            
        </div>
    </div>


    <?php include '../footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>