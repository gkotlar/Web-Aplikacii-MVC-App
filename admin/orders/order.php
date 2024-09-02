<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1>Order Information</h1>
            <p>Order Number: <?php echo $order_id; ?></p>
            <p>Order Date: <?php echo $order_date; ?></p>
            <p>Customer: <?php echo $name . ' (' . $email . ')'; ?></p>
            <h2>Shipping</h2>
            <?php if ($order['shipDate'] === NULL) : ?>
                <p>Ship Date: Not yet shipped</p>
                <p>
                    <form action="" method="post" >
                        <input type="hidden" name="action" value="set_ship_date" />
                        <input type="hidden" name="order_id"
                            value="<?php echo $order_id; ?>" />
                        <input type="submit" value="Ship Order" class="btn btn-secondary mb-1"/>
                    </form>
                    <form action="" method="post" >
                        <input type="hidden" name="action" value="confirm_delete" />
                        <input type="hidden" name="order_id"
                            value="<?php echo $order_id; ?>" />
                        <input type="submit" value="Delete Order" class="btn btn-danger"/>
                    </form>
                </p>

            <?php else:
                $ship_date = date('M j, Y', strtotime($order['shipDate']));
                ?>
                <p>Ship Date: <?php echo $ship_date; ?></p>
            <?php endif; ?>
            <p><?php echo $ship_line1; ?><br />
                <?php if ( strlen($ship_line2) > 0 ) : ?>
                    <?php echo $ship_line2; ?><br />
                <?php endif; ?>
                <?php echo $ship_city; ?>, <?php echo $ship_state; ?>
                <?php echo $ship_zip; ?><br />
                <?php echo $ship_phone; ?>
            </p>
            <h2>Billing</h2>
            <p>Card Number: <?php echo $card_number . ' (' . $card_name . ')'; ?></p>
            <p>Card Expires: <?php echo $card_expires; ?></p>
            <p><?php echo $bill_line1; ?><br />
                <?php if ( strlen($bill_line2) > 0 ) : ?>
                    <?php echo $bill_line2; ?><br />
                <?php endif; ?>
                <?php echo $bill_city; ?>, <?php echo $bill_state; ?>
                <?php echo $bill_zip; ?><br />
                <?php echo $bill_phone; ?>
            </p>
            <h2>Order Items</h2>
            <table id="cart">
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">List Price</th>
                    <!-- <th class="right">Savings</th>
                    <th class="right">Your Cost</th> -->
                    <th class="right">Quantity</th>
                    <th class="right">Line Total</th>
                </tr>
                <?php
                $subtotal = 0;
                foreach ($order_items as $item) :
                    $product_id = $item['productID'];
                    $product = get_product($product_id);
                    $item_name = $product['productName'];
                    $list_price = $item['itemPrice'];
                    /*$savings = $item['discountAmount'];
                    $your_cost = $list_price - $savings;*/
                    $quantity = $item['quantity'];
                    $line_total = $list_price * $quantity;
                    $subtotal += $line_total;
                    ?>
                    <tr>
                        <td><?php echo $item_name; ?></td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', $list_price); ?>
                        </td>
                        <!-- <td class="right">
                            <?php //echo sprintf('$%.2f', $savings); ?>
                        </td> -->
                        <!-- <td class="right">
                            <?php //echo sprintf('$%.2f', $your_cost); ?>
                        </td> -->
                        <td class="right">
                            <?php echo $quantity; ?>
                        </td>
                        <td class="right">
                            <?php echo sprintf('$%.2f', $line_total); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr id="cart_footer">
                    <td colspan="5" class="right">Subtotal:</td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $subtotal); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="right"><?php echo $ship_state; ?> Tax:</td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $order['taxAmount']); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="right">Shipping:</td>
                    <td class="right">
                        <?php echo sprintf('$%.2f', $order['shipAmount']); ?>
                    </td>
                </tr>
                    <tr>
                    <td colspan="5" class="right">Total:</td>
                    <td class="right">
                        <?php
                            $total = $subtotal + $order['taxAmount'] +
                                    $order['shipAmount'];
                            echo sprintf('$%.2f', $total);
                        ?>
                    </td>
                </tr>
        </table>
        </div>
    </div>
    <?php include '../../footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>