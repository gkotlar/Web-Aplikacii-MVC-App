<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1 class="top">My Account</h1>
            <p><?php echo $customer_name . ' (' . $email . ')'; ?></p>
            <form action="" method="post">
                <input type="hidden" name="action" value="view_account_edit" />
                <input type="submit" value="Edit Account" class="btn btn-primary mb-2" />
            </form>
            <form action="" method="post">
                <input type="hidden" name="action" value="logout" />
                <input type="submit" value="Log Out" class="btn btn-danger mb-2"/>
            </form>
            <h2>Shipping Address</h2>
            <p><?php echo $ship_line1; ?><br />
                <?php if ( strlen($ship_line2) > 0 ) : ?>
                    <?php echo $ship_line2; ?><br />
                <?php endif; ?>
                <?php echo $ship_city; ?>, <?php echo $ship_state; ?>
                <?php echo $ship_zip; ?><br />
                <?php echo $ship_phone; ?>
            </p>
            <form action="" method="post">
                <input type="hidden" name="action" value="view_address_edit" />
                <input type="hidden" name="address_type" value="shipping" />
                <input type="submit" value="Edit Shipping Address" class="btn btn-secondary mb-2"/>
            </form>
            <h2>Billing Address</h2>
            <p><?php echo $bill_line1; ?><br />
                <?php if ( strlen($bill_line2) > 0 ) : ?>
                    <?php echo $bill_line2; ?><br />
                <?php endif; ?>
                <?php echo $bill_city; ?>, <?php echo $bill_state; ?>
                <?php echo $bill_zip; ?><br />
                <?php echo $bill_phone; ?>
            </p>
            <form action="" method="post">
                <input type="hidden" name="action" value="view_address_edit" />
                <input type="hidden" name="address_type" value="billing" />
                <input type="submit" value="Edit Billing Address" class="btn btn-secondary mb-2"/>
            </form>
            <?php if (count($orders) > 0 ) : ?>
                <h2>Your Orders</h2>
                <ul>
                    <?php foreach($orders as $order) :
                        $order_id = $order['orderID'];
                        $order_date = strtotime($order['orderDate']);
                        $order_date = date('M j, Y', $order_date);
                        $url = $app_path .
                            '?action=view_order&order_id=' . $order_id;
                        ?>
                        <li>
                            Order # <a href="<?php echo $url; ?>">
                            <?php echo $order_id; ?></a> placed on
                            <?php echo $order_date; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>


    <?php include '../footer.php'; ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>