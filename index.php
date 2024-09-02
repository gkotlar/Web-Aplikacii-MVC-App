<?php 
    require('./model/database.php');
    require('./model/product_db.php');
    require('./model/category_db.php');
    require_once('./util/main.php');
    require_once('./util/secure_conn.php');

    //generira random ids od 1 do 15 za da se prikazat random proizvodi so tie ids
    $ids = range(1, 15);
    shuffle($ids);
    $ids_rand = array_slice($ids, 0, 9);

    include('./home.php')
?>