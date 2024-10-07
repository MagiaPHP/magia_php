<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}




$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : null;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : null;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : null;
$sellers_id = (isset($_POST["sellers_id"])) ? clean($_POST["sellers_id"]) : null;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : null;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : null;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : null;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : null;
$advance = (isset($_POST["advance"])) ? clean($_POST["advance"]) : null;
$balance = (isset($_POST["balance"])) ? clean($_POST["balance"]) : null;
$comments = (isset($_POST["comments"])) ? clean($_POST["comments"]) : null;
$comments_private = (isset($_POST["comments_private"])) ? clean($_POST["comments_private"]) : null;
$r1 = (isset($_POST["r1"])) ? clean($_POST["r1"]) : null;
$r2 = (isset($_POST["r2"])) ? clean($_POST["r2"]) : null;
$r3 = (isset($_POST["r3"])) ? clean($_POST["r3"]) : null;
$fc = (isset($_POST["fc"])) ? clean($_POST["fc"]) : null;
$date_update = (isset($_POST["date_update"])) ? clean($_POST["date_update"]) : null;
$days = (isset($_POST["days"])) ? clean($_POST["days"]) : null;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : null;
$code = magia_uniqid();
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 0;
// la sede
$owner_id = contacts_field_id("owner_id", $client_id);

//$addresses_billing_json = json_encode(addresses_billing_by_contact_id(invoices_field_id("client_id" , $id))) ;
$addresses_billing_json = json_encode(addresses_billing_by_contact_id($owner_id));
$addresses_delivery_json = json_encode(addresses_delivery_by_contact_id($client_id));

$error = array();

if (!$owner_id) {
    array_push($error, '$owner_id is mandatory');
}

#************************************************************************
// Busca si uya existe el texto en la BD

if (invoices_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
if ($discounts_mode != "%" && $discounts > $price) {
    array_push($error, 'The discount cannot exceed the price');
}
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}
if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}
################################################################################
if (!$error) {


    invoices_add_by_client_id(
            $owner_id, $code, $date_expiration, 10
    );

    $lastInsertId = invoices_field_code("id", $code);

    // actualizo la comunicacion extructurada segun el id creado 

    if ($lastInsertId) {
        // actualizo la comunicacion
        invoices_update_ce($lastInsertId, generate_structured_communication($lastInsertId));
        // actualizo la direccion de facturacion
        invoices_update_billing_address($lastInsertId, $addresses_billing_json);
        // actualizo la direccion de entrega
        invoices_update_delivery_address($lastInsertId, $addresses_delivery_json);
    }



    header("Location: index.php?c=invoices&a=edit&id=$lastInsertId");
} else {

    include view("home", "pageError");
}
