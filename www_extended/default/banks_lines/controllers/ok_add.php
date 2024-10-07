<?php

die("Disabled");
/**
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$my_account = (isset($_POST["my_account"]) && $_POST["my_account"] != "" && $_POST["my_account"] != "null" ) ? clean($_POST["my_account"]) : false;
$operation = (isset($_POST["operation"]) && $_POST["operation"] != "" && $_POST["operation"] != "null" ) ? clean($_POST["operation"]) : false;
$date_operation = (isset($_POST["date_operation"]) && $_POST["date_operation"] != "" && $_POST["date_operation"] != "null" ) ? clean($_POST["date_operation"]) : date("Y-m-d");
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : false;
$type = (isset($_POST["type"]) && $_POST["type"] != "" && $_POST["type"] != "null" ) ? clean($_POST["type"]) : false;
$total = (isset($_POST["total"]) && $_POST["total"] != "" && $_POST["total"] != "null" ) ? clean($_POST["total"]) : false;
$currency = (isset($_POST["currency"]) && $_POST["currency"] != "" && $_POST["currency"] != "null" ) ? clean($_POST["currency"]) : false;
$date_val = (isset($_POST["date_val"]) && $_POST["date_val"] != "" && $_POST["date_val"] != "null" ) ? clean($_POST["date_val"]) : date("Y-m-d");
$account = (isset($_POST["account"]) && $_POST["account"] != "" && $_POST["account"] != "null" ) ? clean($_POST["account"]) : false;
$sender = (isset($_POST["sender"]) && $_POST["sender"] != "" && $_POST["sender"] != "null" ) ? clean($_POST["sender"]) : false;
$comunication = (isset($_POST["comunication"]) && $_POST["comunication"] != "" && $_POST["comunication"] != "null" ) ? clean($_POST["comunication"]) : false;
$ce = (isset($_POST["ce"]) && $_POST["ce"] != "" && $_POST["ce"] != "null" ) ? clean($_POST["ce"]) : false;
$ref = (isset($_POST["ref"]) && $_POST["ref"] != "" && $_POST["ref"] != "null" ) ? clean($_POST["ref"]) : false;
$ref2 = (isset($_POST["ref2"]) && $_POST["ref2"] != "" && $_POST["ref2"] != "null" ) ? clean($_POST["ref2"]) : false;
$ref3 = (isset($_POST["ref3"]) && $_POST["ref3"] != "" && $_POST["ref3"] != "null" ) ? clean($_POST["ref3"]) : false;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date("Y-m-d G:i:s");
//$status_code = (isset($_POST["status_code"]) && $_POST["status_code"] != "" ) ? clean($_POST["status_code"]) : false;

$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$operation) {
    array_push($error, 'Operation is mandatory');
}
if (!$type) {
    array_push($error, 'Type is mandatory');
}
if (!$total) {
    array_push($error, 'Total is mandatory');
}
//if (!$account) {
//    array_push($error, 'Account is mandatory');
//}
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!banks_lines_is_operation($operation)) {
    array_push($error, 'Operation format error');
}
if (!banks_lines_is_type($type)) {
    array_push($error, 'Type format error');
}
if (!banks_lines_is_total($total)) {
    array_push($error, 'Total format error');
}
if (!banks_lines_is_account($account)) {
    array_push($error, 'Account format error');
}
if (!banks_lines_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!banks_lines_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!banks_lines_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

//if (banks_lines_search_by_unique("id", "operation", $operation)) {    
//    array_push($error, 'Operation already exists in data base');
//}

if (banks_lines_search_by_account_number_and_operation($my_account, $operation)) {    
    array_push($error, 'Operation already exists in data base');
}


//if( banks_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = banks_lines_add(
            $my_account, $operation, $date_operation, $description, $type,
            $total, $currency, $date_val, $account, $sender,
            $comunication, $ce, $ref, $ref2, $ref3,
            $date_registre, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=banks_lines");
            break;

        case 2:
            header("Location: index.php?c=banks_lines&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_lines&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_lines&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


*/