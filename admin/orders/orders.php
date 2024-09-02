<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1>Outstanding Orders</h1>
            <?php if (count($new_orders) > 0 ) : ?>
                <ul>
                    <?php foreach($new_orders as $order) :
                        $order_id = $order['orderID'];
                        $order_date = strtotime($order['orderDate']);
                        $order_date = date('M j, Y', $order_date);
                        $url = $app_path . 'orders' .
                            '?action=view_order&order_id=' . $order_id;
                        ?>
                        <li>
                            <a href="<?php echo $url; ?>">Order # 
                            <?php echo $order_id; ?></a> for
                            <?php echo $order['firstName'] . ' ' .
                                    $order['lastName']; ?> placed on
                            <?php echo $order_date; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>There are no shipped orders.</p>
            <?php endif; ?>
            <h1>Shipped Orders</h1>
            <?php if (count($old_orders) > 0 ) : ?>
                <ul>
                    <?php foreach($old_orders as $order) :
                        $order_id = $order['orderID'];
                        $order_date = strtotime($order['orderDate']);
                        $order_date = date('M j, Y', $order_date);
                        $url = $app_path . 'orders' .
                            '?action=view_order&order_id=' . $order_id;
                        ?>
                        <li>
                            <a href="<?php echo $url; ?>">Order #
                            <?php echo $order_id; ?></a> for
                            <?php echo $order['firstName'] . ' ' .
                                    $order['lastName']; ?> placed on
                            <?php echo $order_date; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>There are no shipped orders.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include '../../footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>