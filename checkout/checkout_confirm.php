<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1>Confirm Order</h1>
            <table id="cart">
                <tr id="cart_header">
                    <th class="left" >Item</th>
                    <th class="right">Price</th>
                    <th class="right">Quantity</th>
                    <th class="right">Total</th>
                </tr>
                <?php foreach ($cart as $product_id => $item) : ?>
                    <tr>
                        <td><?php echo $item['productName']; ?></td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', $item['unit_price']); ?>
                        </td>
                        <td class="right">
                            <?php echo $item['quantity']; ?>
                        </td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', $item['line_price']); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr id="cart_footer">
                    <td colspan="3" class="right"><b>Subtotal</b></td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $subtotal); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="right"><?php echo $state; ?> Tax</td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $tax); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="right">Shipping</td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $shipping_cost); ?>
                    </td>
                </tr>
                    <tr>
                    <td colspan="3" class="right"><b>Total</b></td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $total); ?>
                    </td>
                </tr>
        </table>
            <p>
                Proceed to: <a href="<?php echo '?action=payment'; ?>">Payment</a>
            </p>
        </div>
    </div>


    <?php include '../footer.php'; ?>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>