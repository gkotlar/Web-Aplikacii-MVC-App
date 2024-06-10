<?php 
    function add_user($user_id, $user_name, $pass, $email, $slika, $admin) {
        global $db;
        $query = "INSERT INTO users
                     (username, pass, email, slikaURL, isAdmin)
                  VALUES
                     ($user_name', '$pass', '$email', '$slika', '$admin')";
        $db->exec($query);
    }


?>