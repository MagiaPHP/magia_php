<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$order_col = (isset($_GET["order_col"]) && $_GET["order_col"] != "" ) ? clean($_GET["order_col"]) : "id";
$order_way = (isset($_GET["order_way"]) && $_GET["order_way"] != "" ) ? clean($_GET["order_way"]) : "desc";
$account_number = (isset($_GET["account_number"]) && $_GET["account_number"] != "" ) ? clean($_GET["account_number"]) : false;
$error = array();

################################################################################
//if (!banks_field_account_number('id', $account_number)) {
//    array_push($error, 'This account number does not exist in the system');
//}
// Actualizo con que columna esta ordenado 
if (isset($_GET["order_col"])) {
    $data = json_encode(array("order_col" => $order_col, "order_way" => $order_way));
    _options_push("config_banks_lines_check_order_col", $data, "banks_lines_check");
}
################################################################################
$banks_lines_check = null;

################################################################################
$pagination = new Pagination($page, banks_lines_check_list_to_check());
// puede hacer falta
//$pagination->setUrl($url);
$banks_lines_check = banks_lines_check_list_to_check($pagination->getStart(), $pagination->getLimit());
################################################################################    
//$banks_lines_check = banks_lines_check_list(10, 5);

if (!$error) {

    if ($account_number) {
        $bank_id = banks_field_account_number('id', $account_number);
        $bank = new Banks();
        $bank->setBanks($bank_id);
    }

//    vardump(banks_lines_tmp_search_by_account_number($account_number)); 

    include view("banks_lines_check", "index");
} else {
    include view("home", "pageError");
}

    
