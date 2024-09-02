<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<body>
    <?php include '../header.php'; ?>
    <div class="container">
        <div id="content">
            <h2>Billing Address</h2>
            <p><?php echo $bill_line1; ?><br />
                <?php if ( strlen($bill_line2) > 0 ) : ?>
                    <?php echo $bill_line2; ?><br />
                <?php endif; ?>
                <?php echo $bill_city; ?>, <?php echo $bill_state; ?>
                <?php echo $bill_zip; ?><br />
                <?php echo $bill_phone; ?>
            </p>
            <form action="../account" method="post">
                <input type="hidden" name="action" value="edit_billing" />
                <input type="submit" value="Edit Billing Address" class="btn btn-secondary"/>
            </form>
            <h2>Payment Information</h2>
            <form action="." method="post" id="payment_form">
                <input type="hidden" name="action" value="process" />
                <label for="card_type">Card Type:</label>
                <select name="card_type">
                    <option value="1">MasterCard</option>
                    <option value="2">Visa</option>
                    <option value="3">Discover</option>
                    <option value="4">American Express</option>
                </select>
                <br />
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number" />
                &nbsp;&nbsp;No dashes or spaces.
                <br />
                <label for="card_cvv">CVV:</label>
                <input type="text" name="card_cvv" />
                <br />
                <label for="card_expires">Expiration:</label>
                <input type="text" name="card_expires" />&nbsp;&nbsp;MM/YYYY
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="Place Order" class="btn btn-primary mb-1"/>&nbsp;&nbsp;
                Click only once.
            </form>
            <form action="../cart" method="post" >
                <input type="submit" value="Cancel Payment Entry" class="btn btn-danger"/>
            </form>
        </div>
    </div>


    <?php include '../footer.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>