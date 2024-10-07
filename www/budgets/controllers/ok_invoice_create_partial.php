<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Si ya tiene facturas, no puede ser anulado 
 * si la factura creada no es igual o superrior al monto de la factura se puede aun crear mas facturas 
 * tipo de factura PARTIAL = P
 * 
 * id
 * cambio el status si
 *      creo la factura, 
 *      copio los items 
 *      
 * 
 */
$budget_id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$description = (($_POST["description"]) != "" ) ? clean($_POST["description"]) : null;
$percent = (($_POST["percent"]) != "" ) ? intval(clean($_POST["percent"])) : 0;
$create_project = ( isset($_POST["create_project"]) && $_POST["id"] != "" ) ? clean($_POST["create_project"]) : false;

// saco el numero de cliente
$client_id = budgets_field_id("client_id", $budget_id);

$ab = budgets_field_id("addresses_billing", $budget_id);
$ad = budgets_field_id("addresses_delivery", $budget_id);

$array_budgets = array();
$error = array();
################################################################################
################################################################################
################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$percent) {
    array_push($error, '$percent is mandatory');
}
if (!$client_id) {
    array_push($error, '$client_id is mandatory');
}
################################################################################
if ($percent < 0) {
    array_push($error, '$percent cant be negative');
}
if ($percent > 100) {
    array_push($error, '$percent cant be more than 100%');
}
////////////////////////////////////////////////////////////////////////////////
//if (budgets_field_id("status", $budget_id) == 35) {
//    array_push($error, 'Invoices already create');
//}
if (budgets_field_id("status", $budget_id) == 40) {
    array_push($error, 'Budget already rejected');
}
if (budgets_field_id("status", $budget_id) == -10) {
    array_push($error, 'Budget already candeled');
}
################################################################################
if (count(budget_lines_list_tax_budget_id($budget_id)) > 1) {
    array_push($error, 'There must be only one type of VAT to use this option');
}
################################################################################
//$client_id = budgets_field_id("client_id", $budget_id);
// Saco el saldo que aun se deb facturar 
$total_budget = moneda_value(( budgets_field_id("total", $budget_id) + budgets_field_id("tax", $budget_id) ) - budgets_field_id("advance", $budget_id));
//
$average_tax = budget_lines_average_tax($budget_id);

// se desea facturar
$want_invoice = moneda_value($total_budget * ($percent / 100));

$tax = ($want_invoice * $average_tax) / (100 + $average_tax);

$price = moneda_value($want_invoice - $tax);

$extra_days = (_options_option('config_budgets_expiration_days')) ? _options_option('config_budgets_expiration_days') : 0;

$date_expiration = date_create(magia_dates_add_day(date('Y-m-d'), $extra_days));

$date_expiration = $date_expiration->format('Y-m-d');

// Cuanto esta ya facturado ?
$total_already_invoice = moneda_value(budgets_invoices_total_invoiced_by_budget_id($budget_id));

// 
$total_no_invoiced = moneda_value($total_budget - $total_already_invoice);

// lo que se desea facturar no puede ser superior a lo no facturado
// no tomo en cuenta los decimales para evitar que lo que se desea
// facturar sea superior a loq ue hay que facturar 

if (floor($want_invoice) > floor($total_no_invoiced)) {
    array_push($error, 'The total cannot be higher than the balance to be invoiced');
}
//
$code = null;
$quantity = 1;
$discounts = 0;
$discounts_mode = "%";
$tax = null;
$order_by = "0";
$code = magia_uniqid();
$status = 0;

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {
    // creation invoice

    invoices_add_partial_by_client_id(
            $client_id, $ab, $ad, $code, $status, $budget_id
    );

//    invoices_add_by_client_id(
//            $client_id, $code, $date_expiration, 10
//    );

    $lastInsertId = invoices_field_code("id", $code);

    // registro el contador de esta nueva factura
    invoices_counter_add($lastInsertId, date('Y'), invoices_counter_next_number(date('Y')));

    // actualizo el tipo de factura poniendola como partial 
    invoices_update_type($lastInsertId, 'P');

    // actualizo la comunicacion extructurada segun el id creado 
    if ($lastInsertId) {
        // ce
        invoices_update_ce($lastInsertId, generate_structured_communication($lastInsertId));

        // lleno la priera linea
        invoice_lines_add(
                //$invoice_id , $code ,  $quantity , $description , $price , $discounts , $discounts_mode , $tax,  $order_by , $status
                $lastInsertId, $code, $quantity, $description, $price, $discounts, $discounts_mode, $average_tax, $order_by, $status
        );

        // Esto me actualiza los totales en la factura
        invoices_update_total_tax($lastInsertId, invoice_lines_totalHTVA($lastInsertId), invoice_lines_totalTVA($lastInsertId));

        // agrego el id_budget en id_invoice

        invoices_update_budget_id($lastInsertId, $budget_id);

        // pongo en la tabla budgets_invoices
        budgets_invoices_add($budget_id, $lastInsertId, null, 1, 1);

        // si el total de las facturas ligadas a este presupuesto es /
        // >= al total del presupuesto 
        // cambio el status        
        if (invoices_total_invoiced_budget_id($budget_id) >= ( budgets_field_id("total", $budget_id) + budgets_field_id("tax", $budget_id))) {
            budgets_change_status_to($budget_id, 35);
        } else {
            budgets_change_status_to($budget_id, 35);
        }
    }




    // si desea crear un proyecto, 
    if ($create_project) {

        $budget = new Budgets();
        $budget->setBudgets($budget_id);

        projects_create_from_budget($budget);
    }
    //
    //
    //
    //
    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null;
    $description = "Create partial invoice [$lastInsertId] from budget [$budget_id] - ($percent %) ";
    $doc_id = $budget_id;
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
    ############################################################################
    ############################################################################
    ############################################################################
    //$id = $invoice_id; 

    $level = null;
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "invoices";
    //$a , 
    $w = null;
    $description = "Create partial invoice [$lastInsertId] from budget [$budget_id] - ($percent %) ";
    $doc_id = $lastInsertId;
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




    header("Location: index.php?c=invoices&a=details&id=$lastInsertId");
} else {
    include view("home", "pageError");
}    