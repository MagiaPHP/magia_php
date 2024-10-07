<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$id = (isset($_POST["id"]) && $_POST["id"] != '') ? clean($_POST["id"]) : false;
$office_id = (isset($_POST["office_id"]) && $_POST["office_id"] != '') ? clean($_POST["office_id"]) : null;
$client_id = (isset($_POST["client_id"]) && $_POST["client_id"] != '') ? clean($_POST["client_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != '') ? clean($_POST["invoice_id"]) : null;
$date = (isset($_POST["date"]) && $_POST["date"] != '') ? clean($_POST["date"]) : date("Y-m-d");
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != '') ? clean($_POST["date_registre"]) : null;
$total = (isset($_POST["total"]) && $_POST["total"] != '') ? clean($_POST["total"]) : 0;
$tax = (isset($_POST["tax"]) && $_POST["tax"] != '') ? clean($_POST["tax"]) : 0;
$comments = (isset($_POST["comments"]) && $_POST["comments"] != '') ? clean($_POST["comments"]) : 'Credit note';
$status = (isset($_POST["status"]) && $_POST["status"] != '') ? clean($_POST["status"]) : 10;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != '') ? clean($_POST["redi"]) : 1;

//

$addresses_billing = json_encode(addresses_billing_by_contact_id($client_id));
$addresses_delivery = json_encode(addresses_delivery_by_contact_id($client_id));

$returned = null;
$code = magia_uniqid();
$error = array();

################################################################################

if (!$client_id) {
    array_push($error, 'Client id is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}
################################################################################
//if ($id && !is_id($id)) {
//    array_push($error, 'Credit note number format error');
//}
################################################################################
if (credit_notes_field_id('id', $id)) {
    array_push($error, 'Credit note number already exist');
}
################################################################################


if (!$error) {


    credit_notes_add_with_credit_note_number_multi(
            $office_id, $client_id, $invoice_id, $addresses_billing, $addresses_delivery,
            $date, $total, $tax, $returned, $comments, $code, $status
    );

    $lastInsertId = credit_notes_field_code('id', $code);
    //credit_notes_counter_add($lastInsertId, date('Y'), credit_notes_counter_next_number(date('Y')));

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=credit_notes");
            break;

        case 2:
            header("Location: index.php?c=credit_notes&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=credit_notes&a=edit&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=credit_notes&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {
    //
    //
    //
    include view("home", "pageError");
}



