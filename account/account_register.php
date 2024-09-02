<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Register</title>

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" type="text/css" href="../styles.css" />
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
       <?php include '../header.php'; ?>
       <div class="container">
              <h1 class="my-2">Register</h1>
              <form action="" method="post">
                     <input type="hidden" name="action" value="register" />
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="first_name">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="last_name">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Email Address:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputPassword1" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password_1">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password_2">
                     </div>
                     <h3 class="my-2">Shipping Address</h3>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_line1">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Line 2:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_line2">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">City:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_city">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">State:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_state">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Zip Code:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_zip">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ship_phone">
                     </div>
                     <label>&nbsp;</label>
                     <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="use_shipping">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                     </div>

                     <h3>Billing Address:</h3>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_line1">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Line 2:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_line2">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">City:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_city">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">State:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_state">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Zip Code:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_zip">
                     </div>
                     <div class="mb-1">
                            <label for="exampleInputEmail1" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bill_phone">
                     </div>
                     <button type="submit" class="btn btn-primary">Register</button>
              </form>
       </div>



       <?php include '../footer.php'; ?>





















       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>