<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : null;
$office_id = (isset($_POST["office_id"])) ? clean($_POST["office_id"]) : null;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : null;
$sellers_id = (isset($_POST["sellers_id"])) ? clean($_POST["sellers_id"]) : null;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : date("Y-m-d");
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
//$office_id = contacts_field_id("office_id", $client_id);

//$headoffice_id = offices_headoffice_of_office($client_id);

$addresses_billing = (addresses_billing_by_contact_id($client_id));
$addresses_delivery = (addresses_delivery_by_contact_id($client_id));

$addresses_billing_json = json_encode($addresses_billing);
$addresses_delivery_json = json_encode($addresses_delivery);




$error = array();
################################################################################


if (!$client_id) {
    array_push($error, '$cliente_id is mandatory');
}

if (!$addresses_billing) {
    array_push($error, ' addresses billing is mandatory');
}


if (!$addresses_delivery) {
    array_push($error, 'addresses delivery is mandatory');
}

#************************************************************************
// Busca si uya existe el texto en la BD

if (credit_notes_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}

################################################################################

if (!$error) {

    credit_notes_add_by_client_id(
            $client_id, $code, 10
    );

    $lastInsertId = credit_notes_field_code("id", $code);

    credit_notes_update_billing_address($lastInsertId, $addresses_billing_json);
    credit_notes_update_delivery_address($lastInsertId, $addresses_delivery_json);

    // actualizo la comunicacion extructurada segun el id creado 

    if ($lastInsertId) {
        credit_notes_update_ce($lastInsertId, generate_structured_communication($lastInsertId));
    }


    header("Location: index.php?c=credit_notes&a=edit&id=$lastInsertId");
} else {
    include view("home", "pageError");
}    