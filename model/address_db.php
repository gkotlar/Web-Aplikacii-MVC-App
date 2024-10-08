<?php
function add_address($customer_id, $line1, $line2,
                     $city, $state, $zip_code, $phone) {
    global $db;
    $query = '
        INSERT INTO addresses (customerID, line1, line2,
                               city, state, zipCode, phone)
        VALUES (:customer_id, :line1, :line2,
                :city, :state, :zip_code, :phone)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $address_id = $db->lastInsertId();
    $statement->closeCursor();
    return $address_id;
}

function get_address($address_id) {
    global $db;
    $query = 'SELECT * FROM addresses WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->execute();
    $address = $statement->fetch();
    $statement->closeCursor();
    return $address;
}

function update_address ($address_id, $line1, $line2,
                         $city, $state, $zip_code, $phone) {
    global $db;
    $query = '
        UPDATE addresses
        SET line1 = :line1,
            line2 = :line2,
            city = :city,
            state = :state,
            zipCode = :zip_code,
            phone = :phone
        WHERE addressID = :address_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':address_id', $address_id);
    $statement->bindValue(':line1', $line1);
    $statement->bindValue(':line2', $line2);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip_code', $zip_code);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();
}

function disable_or_delete_address($address_id) {
    global $db;
    if (is_used_address_id($address_id)) {
        $query = 'UPDATE addresses SET disabled = 1 WHERE addressID = :address_id';
        $statement = $db->prepare($query);
        $statement->bindValue(":address_id", $address_id);
        $statement->execute();
        $statement->closeCursor();
    } else {
        $query = 'DELETE FROM addresses WHERE addressID = :address_id';
        $statement = $db->prepare($query);
        $statement->bindValue(":address_id", $address_id);
        $statement->execute();
        $statement->closeCursor();
    }
}

function is_used_address_id($address_id) {
    global $db;

    // Check if the address is used as a billing address
    $query = "SELECT COUNT(*) FROM orders WHERE billingAddressID = :value";
    $statement = $db->prepare($query);
    $statement->bindValue(':value', $address_id);
    $statement->execute();
    $result = $statement->fetch();
    $billing_count = $result[0];
    $statement->closeCursor();
    if ($billing_count > 0) return true;

    // Check if the address is used as a shipping address
    $query = "SELECT COUNT(*) FROM orders WHERE shipAddressID = :value";
    $statement = $db->prepare($query);
    $statement->bindValue(':value', $address_id);
    $statement->execute();
    $result = $statement->fetch();
    $ship_count = $result[0];
    $statement->closeCursor();
    if ($ship_count > 0) return true;

    return false;
}

?>