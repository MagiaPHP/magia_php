<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
//$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$field = (isset($_POST["field"])) ? clean($_POST["field"]) : false;
$new_value = (isset($_POST["new_value"])) ? clean($_POST["new_value"]) : false;

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

################################################################################
// re quired
// fo rmat
// co ndicional
//------------------------------------------------------------------------------
if (!$id) {
    array_push($error, 'id is mandatory');
}
if (!$field) {
    array_push($error, 'field is mandatory');
}
if (!$new_value) {
    array_push($error, 'new_value is mandatory');
}
################################################################################
if (!balance_is_id($id)) { // error en format o no existe
    array_push($error, 'id format error');
}
//
switch ($field) {
    case 'client_id': // si no es id y no existe
        (!contacts_is_id($new_value)) ? array_push($error, 'client_id format error') : false;
        break;

    case 'ref': // si la referencia ya existe da error        
        $account_number = balance_field_id("account_number", $id);
        ( balance_search_by_account_ref($account_number, $new_value)) ? array_push($error, 'ref already exist') : false;
        break;

    default:
        break;
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    balance_field_update($id, $field, $new_value);

    switch ($redi) {
        case 1:
            header("Location: index.php?c=balance");
            break;

        case 2:
            header("Location: index.php?c=balance&a=edit&id=$id#2");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {
    //
    include view("home", 'pageError');
}
*/
