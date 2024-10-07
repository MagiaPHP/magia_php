<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$address_delivery_id = (!empty($_REQUEST['da_id'])) ? clean($_REQUEST['da_id']) : false;

$ad = addresses_details($address_delivery_id);
$address_delivery_json = json_encode($ad);

$error = array();
################################################################################

if (addresses_field_id("contact_id", $address_delivery_id) != $u_owner_id) {
    array_push($error, 'This address is not yours');
}
################################################################################
if (!$error) {

    //shop_orders_update_delivery_address($order_id, $address_delivery_json); 

    $_SESSION['order']['address_delivery'] = $address_delivery_id;

    header("Location: index.php?c=shop&a=order_new_9080#order");
} else {
    include view("home", "pageError");
}