<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Registra el pago de una expense

$invoice_id = null;
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : null;
$client_id = expenses_field_id("provider_id", $expense_id) ? expenses_field_id("provider_id", $expense_id) : null;

$credit_note_id = null;
$type = -1; // es un gasto
$account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : false;
//$sub_total = ( isset($_POST["sub_total"]) && ($_POST["sub_total"]) != '') ? clean($_POST["sub_total"]) : 0.0;
//$tax = ( isset($_POST["tax"]) && ($_POST["tax"]) != '') ? clean($_POST["tax"]) : 0.0;
//Total siempre positivo 
$total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? (clean($_POST["total"])) : null;
//$total = 0;
$ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : '-';
$description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Expense $expense_id";
$ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : expenses_field_id("ce", $expense_id);
//$date_registre = ( isset($_POST["date_registre"]) && ($_POST["date_registre"]) != '') ? clean($_POST["date_registre"]) : null;
$date = ( isset($_POST["date"]) && ($_POST["date"]) != '') ? clean($_POST["date"]) : null;
$date_registre = null;
$canceled = null;
$canceled_code = null;
$code = magia_uniqid();

$error = array();

################################################################################
# O B L I G A T O R I O S
if (!$expense_id) {
    array_push($error, '$expense_id is mandatory');
}
if (!$client_id) {
    array_push($error, '$client_id is mandatory');
}
if (!$account_number) {
    array_push($error, '$account_number is mandatory');
}
if (!$total) {
    array_push($error, '$total is mandatory');
}
if (!$ref) {
    array_push($error, '$total is mandatory');
}
################################################################################
# F O R M A T O
if (!is_id($expense_id)) {
    array_push($error, '$client_id is mandatory');
}
if ($total < 0) {
    array_push($error, 'The amount must be positive');
}
################################################################################
# C h e q u o
// si existe una referencia con ese umero de cuenta no no anulada
// La referencia es el numero de operacio en los extractos del banco 
if (balance_search_by_account_ref($account_number, $ref)) {
    array_push($error, 'This reference already exists in this account number');
}
################################################################################
// Paso a valores positivos 
#************************************************************************
# 
#************************************************************************
// Promedio de tax
$average_tax = expenses_lines_average_tax($expense_id);
//$total = ""; // 121%
$tax = ($average_tax > 0 ) ? ($total * $average_tax) / ($average_tax + 100) : 0; // 21% 

$sub_total = $total - $tax;

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
//vardump($error);
//vardump($_POST);
//vardump(array(
//    $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
//    $account_number, $sub_total, $tax, $total,
//    $ref, $description, $ce, $date, $date_registre,
//    $code, $canceled, $canceled_code
//));
//die();

if (!$error) {


    balance_add(
            $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
            $account_number, -($sub_total), -($tax), -($total),
            $ref, $description, $ce, $date, $date_registre,
            $code, $canceled, $canceled_code
    );

    $lastInsertId = balance_field_code("id", $code);

    ############################################################################
    ############################################################################
    ############################################################################
    $id = $expense_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Registre payement<br>Balance details: [ Id: $lastInsertId, Provider: $client_id , invoice_id: $invoice_id , credit_note_id: $credit_note_id , type: $type , account_number: $account_number , sub_total: $sub_total , tax: $tax , total: $total , 
            ref: $ref , description: $description , ce: $ce , date: $date , date_registre: $date_registre , 
            code: $code , canceled: $canceled , canceled_code: $canceled_code ]";
    $doc_id = $id;
    $crud = "create";
    $error = null;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
    ############################################################################
    ############################################################################ 


    if ($lastInsertId) {
        // Sumamos el pago a lo pagado en expenses 

        expenses_update_total_advance($expense_id, expenses_field_id("advance", $expense_id) + ($sub_total + $tax));

        if ((expenses_field_id('total', $expense_id) + expenses_field_id('tax', $expense_id)) >= expenses_field_id('advance', $expense_id)) {
            $new_status = 20;
            expenses_change_status_to($expense_id, $new_status); // pago total
        } else {
            $new_status = 30;
            expenses_change_status_to($expense_id, $new_status); // pago parcial
        }

        //
        //
        ############################################################################
        ############################################################################
        $id = $expense_id;

        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null;
        $description = "Change status to status [$new_status] " . expenses_status_by_status($new_status);
        $doc_id = $id;
        $crud = "update";
        $error = null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################ 
    }

    // actualizo los totales de la factura 
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    header("Location: index.php?c=expenses&a=details&id=$expense_id#Payments");
} else {

    include view("home", "pageError");
}
