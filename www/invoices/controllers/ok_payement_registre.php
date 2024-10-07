<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Registra el pago de una factura 
// si viene de banks_lines 

$banks_lines_id = (isset($_POST["banks_lines_id"])) ? clean($_POST["banks_lines_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : 1;

if ($banks_lines_id) { // esto 
    $bl = new Banks_lines();
    $bl->setBanks_lines($banks_lines_id);

    // Verificar:
    // si esa operacion esta o no en la balanza
    // su estatus 
    // 
    $invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
    $client_id = invoices_field_id("client_id", $invoice_id) ?? null;
    $expense_id = null;
    $credit_note_id = null;
    $type = 1;
    $account_number = $bl->getMy_account();
    $total = $bl->getTotal();
    $ref = $bl->getOperation();
    $description = $bl->getDescription();
    $ce = $bl->getCe() ?? '';
    $details = $bl->getDetails() ?? '';
    $comunication = $bl->getComunication() ?? '';
    $message = $bl->getMessage() ?? '';
    $date = $bl->getDate_value();
    $date_registre = null; // hoy
    $canceled = null;
    $canceled_code = null;
    $code = 'BanksLines' . magia_uniqid();
    //
    //
} else { //
    $invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
    $client_id = (invoices_field_id("client_id", $invoice_id)) ? invoices_field_id("client_id", $invoice_id) : null;
    $expense_id = null;
    $credit_note_id = (invoices_field_id("credit_note_id", $invoice_id)) ? invoices_field_id("credit_note_id", $invoice_id) : null;
    $type = 1;
    $account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : false;
    $total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? (clean($_POST["total"])) : null;
    $ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : null;
    $description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Invoice $invoice_id";
    $ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : null;
    $date = ( isset($_POST["date"]) && ($_POST["date"]) != '') ? clean($_POST["date"]) : null;
    $date_registre = null;
    $canceled = null;
    $canceled_code = null;
    $code = magia_uniqid();
}

$error = array();

################################################################################
# O B L I G A T O R I O S
if (!$invoice_id) {
    array_push($error, 'Client id is mandatory');
}
if (!$account_number) {
    array_push($error, 'Account number is mandatory');
}
if (!$total) {
    array_push($error, 'Total is mandatory');
}
if (!$ref) {
    array_push($error, 'Ref. is mandatory');
}
################################################################################
# F O R M A T O
if (!is_id($invoice_id)) {
    array_push($error, 'Client id is mandatory');
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
// El el pago sobrepasa el saldo de la factura 
if ((float) $total > ( (float) invoices_field_id('total', $invoice_id) + (float) invoices_field_id('tax', $invoice_id) - (float) invoices_field_id('advance', $invoice_id) )) {
    array_push($error, 'The total is greater than the invoice balance');
}

################################################################################
// Paso a valores positivos 
#************************************************************************
# 
#************************************************************************
// Promedio de tax
$average_tax = invoice_lines_average_tax($invoice_id);
//$total = ""; // 121%
$tax = ($average_tax > 0 ) ? ($total * $average_tax) / ($average_tax + 100) : 0; // 21% 

$sub_total = $total - $tax;

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {


    balance_add($client_id, $expense_id, $invoice_id, $credit_note_id, $type,
            $account_number, $sub_total, $tax, $total,
            $ref, $description, $ce, $date, $date_registre,
            $code, $canceled, $canceled_code);

    $lastInsertId = balance_field_code("id", $code);
    // si se registra correctametne en la balance 
    // se debe pasar tambien banks_lines a 
//    banks_lines_update_status_code($banks_lines_id, 100);
    banks_lines_update_status($banks_lines_id, 100);

    ############################################################################
    ############################################################################
    ############################################################################
    $id = $invoice_id;

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Registre payment<br>Balance details: [Id: $lastInsertId, client_id: $client_id, invoice_id: $invoice_id, credit_note_id: $credit_note_id, type: $type, account_number: $account_number, sub_total: $sub_total, tax: $tax, total: $total,
    ref: $ref, description: $description, ce: $ce, date: $date, date_registre: $date_registre,
    code: $code, canceled: $canceled, canceled_code: $canceled_code]";
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
        // Sumamos el pago a lo pagado en la factura 

        invoices_update_total_advance($invoice_id, invoices_field_id("advance", $invoice_id) + ($sub_total + $tax));

        invoices_change_status_to($invoice_id, 20); // cobro parcial
        //
        ############################################################################
        ## CAMBIO STATUS DE FACTURA A COBRO PARCIAL ################################
        ############################################################################
        $id = $invoice_id;

        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null;
        $description = "Change status to status [20] " . invoice_status_by_status(20);
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


        if (invoices_field_id("advance", $invoice_id) >= (invoices_field_id('total', $invoice_id) + invoices_field_id('tax', $invoice_id) )) {
            // cambio de estatus a cobro total
            invoices_change_status_to($invoice_id, 30); // cobro total
            ############################################################################
            ## CAMBIO STATUS DE FACTURA A COBRO TOTAL   ################################
            ############################################################################
            $id = $invoice_id;

            $level = null;
            $date = null;
            //$u_id
            //$u_rol , 
            //$c , $a , 
            $w = null;
            $description = "Change status to status [30] " . invoice_status_by_status(30);
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
    }

    // actualizo los totales de la factura 
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=invoices&a=registre_payement&id=$invoice_id#1");
            break;

        case 2:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#2");
            break;

        case 3:
            header("Location: index.php?c=invoices&a=details_payement&id=$invoice_id#3");
            break;

        default:
            header("Location: index.php?c=invoices");
            break;
    }
} else {

    include view("home", "pageError");
}
