<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
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

$code = magia_uniqid();

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
// saco el X% del budget para facturarlo 
$price = ($percent) ? (x * $percent) / 100 : 0;

################################################################################
################################################################################

if (!$error) {



    // creation invoice

    invoices_add_by_client_id(
            $client_id, $code, $date_expiration, 10
    );

    $lastInsertId = invoices_field_code($field, $code);

    // actualizo la comunicacion extructurada segun el id creado 

    if ($lastInsertId) {
        // ce
        invoices_update_ce($lastInsertId, generate_structured_communication($lastInsertId));

        // lleno la priera linea
        invoice_lines_add(
                //$lastInsertId, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
                $lastInsertId, null, 1, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
        );

        // Esto me actualiza los totales en la factura
        invoices_update_total_tax($lastInsertId, invoice_lines_totalHTVA($lastInsertId), invoice_lines_totalTVA($lastInsertId));
    }






//    
//
//    // creo la factura copiando el budget
//    // si ok, copio los items del budget a la factura 
//    // cambio de estatus al budget
//    $new_invoice_id = budgets_copy_to_invoice($budget_id);
//
//    if ($new_invoice_id) {
//        // recojo cada uno de los busdgets_id que viene en el array y copio enuna sola factura 
//        
//        foreach ($array_budgets as $budget_id) {
//            // copio los items de budget a invoice
//            
////            budget_lines_add(
////                //$budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
////                $budget_id, null, 1, "Budget $budget_id ", null, null, null, null, null, null
////            );
////            
//            
//            budgets_copy_items_to_invoice_items($budget_id, $new_invoice_id);
//            
//            budgets_change_status_to($budget_id, 30);
//            
//            budgets_update_invoice_id($budget_id, $new_invoice_id);
//            // invoice
//            invoices_update_ce($new_invoice_id, generate_structured_communication($new_invoice_id));
//        }
//        
//    }
//    
//    
//    vardump($error); 
//    vardump($new_invoice_id); 
//    
//    die();
//    
//    



    header("Location: index.php?c=budgets&a=details&id=$id");
} else {
    include view("home", "pageError");
}    