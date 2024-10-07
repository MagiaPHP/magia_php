<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//vardump($_GET);

die();

/**
 * Si ya tiene facturas, no puede ser anulado 
 * si la factura creada no es igual o superrior al monto de la factura se puede aun crear mas facturas 
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
$percent = (($_POST["percent"]) != "" ) ? clean($_POST["percent"]) : 0;

$array_budgets = array();

array_push($array_budgets, $budget_id);

$error = array();

################################################################################
if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$percent) {
    array_push($error, '$percent is mandatory');
}
if ($percent < 0) {
    array_push($error, '$percent cant be negative');
}
if ($percent > 100) {
    array_push($error, '$percent cant be more than 100%');
}

if (!budgets_field_id("client_id", $budget_id)) {
    array_push($error, 'client_id not present in budget');
}

################################################################################
# // si el budget esta en status enviado o registrado
if (budgets_field_id("status", $budget_id) == 30) {
    array_push($error, 'Budget already accepted');
}
if (budgets_field_id("status", $budget_id) == 40) {
    array_push($error, 'Budget already rejected');
}
if (budgets_field_id("status", $budget_id) == -10) {
    array_push($error, 'Budget already candeled');
}

################################################################################

$client_id = budgets_field_id("client_id", $budget_id);

$solde = ( budgets_field_id("total", $id) + budgets_field_id("tax", $id) ) - budgets_field_id("advance", $id);

$average_tax = budget_lines_average_tax($budget_id);

// saco el X% del budget para facturarlo 
$price = ($average_tax) ? ($solde * 100 ) / $average_tax : $solde;

$tax = ($average_tax) ? ($solde * 100) / 100 + $average_tax : $solde;

$code = null;
$quantity = 1;
$discounts = 0;
$discounts_mode = "%";
$tax = null;
$order_by = "0";
$status = 1;

################################################################################
################################################################################
if (!$error) {
    // creation invoice
    invoices_add_by_client_id(
            $client_id, $code, $date_expiration, 0
    );

    $lastInsertId = invoices_field_code("id", $code);

    // actualizo la comunicacion extructurada segun el id creado 
    if ($lastInsertId) {
        // ce
        invoices_update_ce($lastInsertId, generate_structured_communication($lastInsertId));

        // lleno la priera linea
        invoice_lines_add(
                //$invoice_id , $code ,  $quantity , $description , $price , $discounts , $discounts_mode , $tax,  $order_by , $status
                $lastInsertId, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
        );

        // Esto me actualiza los totales en la factura
        invoices_update_total_tax($lastInsertId, invoice_lines_totalHTVA($lastInsertId), invoice_lines_totalTVA($lastInsertId));

        // agrego el id_invoice en el id_budget
    }

    header("Location: index.php?c=invoices&a=edit&id=$lastInsertId");
} else {
    include view("home", "pageError");
}    