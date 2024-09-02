<?php 

    require_once($_SERVER['DOCUMENT_ROOT'] . '/musicshop/model/category_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" #id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Online Music Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/musicshop/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <!-- da se napravi dinamicno -->
                <ul class="dropdown-menu">
                    <!-- <li><a class="dropdown-item" href="/musicshop/catalog/?categoryId=1">Vinyl Records</a></li>
                    <li><a class="dropdown-item" href="/musicshop/catalog/?categoryId=2">Cassettes</a></li>
                    <li><a class="dropdown-item" href="/musicshop/catalog/?categoryId=3">CDs</a></li> -->
                    <?php 
                        $categories = get_categories();
                        foreach($categories as $category):
                    ?>
                    <li><a class="dropdown-item" href="/musicshop/catalog/?categoryId=<?php echo $category['categoryID'] ?>"><?php echo $category['categoryName'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
                </li>
                <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/musicshop/cart/">My Cart</a>
                </li>
                <?php endif;?>
                <?php if(isset($_SESSION['admin'])): ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/musicshop/admin/product/">Product Manager</a></li>
                    <li><a class="dropdown-item" href="/musicshop/admin/category/">Category Manager</a></li>
                    <li><a class="dropdown-item" href="/musicshop/admin/orders/">Order Manager</a></li>
                    <li><a class="dropdown-item" href="/musicshop/admin/account">Account Manager</a></li>
                </ul>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="d-flex navbar-nav">
                <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])): ?>
                    <li class="nav-item">
                        <a href="/musicshop/account/" class="nav-link"><button class="btn btn-primary">Login</button></a>
                    </li>
                    <li class="nav-item" style="align-content: center;">
                        <a href="/musicshop/account/?action=view_register" class="nav-link">Register</a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item mx-2 py-1" style="align-content: center;" id="welcome">
                        <a href="/musicshop/account/" class="nav-link" style="margin-bottom: 0;">Welcome, <?php echo $_SESSION['user']['firstName'] . '!'?></a>
                    </li>
                <?php endif; ?> 
                <?php if(isset($_SESSION['admin'])): ?>
                    <li class="nav-item mx-2 py-1" style="align-content: center;" id="welcome">
                        <a href="/musicshop/admin/account/" class="nav-link" style="margin-bottom: 0;">Welcome, <?php echo $_SESSION['admin']['firstName'] . '!'?></a>
                    </li>
                <?php endif; ?>
            </ul>   
        </div>
    </nav>







    
</body>
</html>