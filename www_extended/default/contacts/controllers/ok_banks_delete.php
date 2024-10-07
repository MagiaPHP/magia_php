<?php

if (!permissions_has_permission($u_rol, "banks", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$account_number = (($_POST['account_number']) != "") ? clean($_POST['account_number']) : false;
$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : 1;

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id dont send');
}
if (!is_id($contact_id)) {
    array_push($error, '$contact_id format error send');
}

if (!$account_number) {
    array_push($error, '$account_number is mandatory');
}

if (!banks_search_by_account_contact($account_number, $contact_id)) { // banco y contacto 
    array_push($error, 'Account number already exists');
}


if (!$error) {

    banks_delete_account_contact($account_number, $contact_id);

    if (!banks_search_by_account_contact($account_number, $contact_id)) {
        
    }


    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=banks&id=$contact_id&1");

            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }


    ############################################################################
    ############################################################################ 
} else {

    include view("home", "pageError");
}


