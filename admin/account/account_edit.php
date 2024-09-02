<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../../styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php include '../../header.php'; ?>
    <div class="container">
        <div id="content">
            <h1 class="top">Edit Account</h1>
            <form action="" method="post"
                class="aligned">
                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="admin_id"
                    value="<?php echo $admin_id; ?>" />
                <label for="email">E-Mail:</label>
                <input type="text" name="email" value="<?php echo $email; ?>" />
                <br />
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $first_name; ?>" />
                <br />
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $last_name; ?>" />
                <br />
                <label for="password_1">New Password:</label>
                <input type="password" name="password_1" />
                Leave blank to leave unchanged
                <br />
                <label for="password_2">Retype Password:</label>
                <input type="password" name="password_2" />
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="Update Account" class="btn btn-primary mb-1"/>
            </form>
            <form action="" method="post" class="aligned">
                <label>&nbsp;</label>
                <input type="submit" value="Cancel" class="btn btn-danger"/>
            </form>
        </div>
    </div>


    <?php include '../../footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>