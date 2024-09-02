<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">  
        <div id="content">
            <h1>Your Cart</h1>
            <?php if (cart_product_count() == 0) : ?>
                <p>There are no products in your cart.</p>
            <?php else: ?>
                <p>To remove an item from your cart, change its quantity to 0.</p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="update" />
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart as $product_id => $item) : ?>
                            <tr>
                                <td><?php echo $item['artistName'] . ' ' . $item['productName']; ?></td>
                                <td class="right">
                                    <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                                </td>
                                <td class="right">
                                    <input type="text" size="3" class="right"
                                        name="items[<?php echo $product_id; ?>]"
                                        value="<?php echo $item['quantity']; ?>" />
                                </td>
                                <td class="right">
                                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                    <tr id="cart_footer" >
                        <td colspan="3" class="right" ><b>Subtotal</b></td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', cart_subtotal()); ?>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <input type="submit" value="Update Cart" class="btn btn-primary mt-2"/>
                        </td>
                    </tr>
                </form>
                
            <?php endif; ?>


            <!-- if cart has items, display the Checkout link -->
            <?php if (cart_product_count() > 0) : ?>
                <p class="mt-2">
                   <a href="../checkout"> Proceed to Checkout</a>
                </p>
            <?php endif; ?>
        </div>
    </div>



    <?php include '../footer.php'; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>