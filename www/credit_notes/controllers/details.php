<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$lang = (isset($_REQUEST["lang"])) ? clean($_REQUEST["lang"]) : false;

$error = array();

################################################################################

if (!$id) {
    array_push($error, "ID Don't send");
}

################################################################################

if (!credit_notes_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!credit_notes_field_id("id", $id)) {
    array_push($error, "Id not exist");
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    $credit_notes = credit_notes_details($id);

    $cn = new Credit_notes($id);

    

    $addresses_billing = (is_json($credit_notes['addresses_billing'])) ? json_decode($credit_notes['addresses_billing'], true) : [];
    $addresses_delivery = (is_json($credit_notes['addresses_delivery'])) ? json_decode($credit_notes['addresses_delivery'], true) : [];

   
    include view("credit_notes", "details");
} else {

    include view("home", "pageError");
}
