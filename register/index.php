<?php
    require('../model/user_db.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    add_user($username, $pass, $email, '', '0');



?>