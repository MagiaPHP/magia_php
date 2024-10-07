<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//Es una copia adaptada de ok_add.php
//
// verifico si tiene rappels para ser agregados en las factura
//vardump(reminders_invoices_search_remindres_from_invoice('73'));
//vardump(reminders_invoices_search_remindres_from_invoice_not_invoiced('73'));      
//
//$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? ($_REQUEST["ids"]) : null;

$office_id = (isset($_REQUEST["office_id"]) && $_REQUEST["office_id"] != "" ) ? clean($_REQUEST["office_id"]) : 1022;

$budget_id = (isset($_REQUEST["budget_id"])) ? clean($_REQUEST["budget_id"]) : null;
$title = (isset($_REQUEST["title"]) && ($_REQUEST["title"]) != "" ) ? clean($_REQUEST["title"]) : '';
$credit_note_id = (isset($_REQUEST["credit_note_id"])) ? clean($_REQUEST["credit_note_id"]) : null;
// aca viene un array de clientes
$clients_id = (isset($_REQUEST["clients_id"])) ? ($_REQUEST["clients_id"]) : null;
//$client_id = (isset($_REQUEST["client_id"])) ? clean($_REQUEST["client_id"]) : null;
//
$sellers_id = (isset($_REQUEST["sellers_id"])) ? clean($_REQUEST["sellers_id"]) : null;
/////////////////////////////
// Fecha de la factura 
$invoice_date = (isset($_REQUEST["invoice_date"])) ? clean($_REQUEST["invoice_date"]) : null;
// Fecha de registro de la factura 
$date_registre = (isset($_REQUEST["date_registre"])) ? clean($_REQUEST["date_registre"]) : date('Y-m-d');
// Fecha de registro de la factura 
//$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "" ) ? clean($_REQUEST["date_expiration"]) : magia_dates_add_day($date, _options_option('config_invoices_expiration_days'));
$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "" ) ? clean($_REQUEST["date_expiration"]) : null;
//
//$diff = date_diff(date_create(date("Y-m-d")), date_create($date_expiration));
//// diferencia de dias entre hoy y expiracio days,
//// esta debe ser cero o superior a cero 
//$diff_days = $diff->format('%R%a');
$total = (isset($_REQUEST["total"])) ? clean($_REQUEST["total"]) : null;
$tax = (isset($_REQUEST["tax"])) ? clean($_REQUEST["tax"]) : null;
$advance = (isset($_REQUEST["advance"])) ? clean($_REQUEST["advance"]) : null;
$balance = (isset($_REQUEST["balance"])) ? clean($_REQUEST["balance"]) : null;
$comments = (isset($_REQUEST["comments"])) ? clean($_REQUEST["comments"]) : null;
//$comments_private = (isset($_REQUEST["comments_private"])) ? clean($_REQUEST["comments_private"]) : null;
$r1 = (isset($_REQUEST["r1"])) ? clean($_REQUEST["r1"]) : null;
$r2 = (isset($_REQUEST["r2"])) ? clean($_REQUEST["r2"]) : null;
$r3 = (isset($_REQUEST["r3"])) ? clean($_REQUEST["r3"]) : null;
$fc = (isset($_REQUEST["fc"])) ? clean($_REQUEST["fc"]) : null;
$date_update = (isset($_REQUEST["date_update"])) ? clean($_REQUEST["date_update"]) : null;
$days = (isset($_REQUEST["days"])) ? clean($_REQUEST["days"]) : null;
$ce = (isset($_REQUEST["ce"])) ? clean($_REQUEST["ce"]) : null;
$code = magia_uniqid();
$status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : 0;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
// la sede
//$owner_id = contacts_field_id("owner_id", $client_id);
//
//$addresses_billing_json = json_encode(addresses_billing_by_contact_id(invoices_field_id("client_id" , $id))) ;
//$addresses_billing_json = json_encode(addresses_billing_by_contact_id($owner_id));
//$addresses_delivery_json = json_encode(addresses_delivery_by_contact_id($client_id));
//
$discounts_mode = null;
$price = null;
$discounts = null;
$quantity = null;
$tax = null;
// extraction año de una fecha 
$error = array();

// debe tener:
// titulo 
// date
// $date_expiration 
// //////////////////////////////////////////////////////////////////////
if ($title == "") {
    array_push($error, 'Title is mandatory');
}



if (!$invoice_date || $invoice_date == "") {
    array_push($error, 'Invoice date is mandatory');
}

if (!is_date($invoice_date)) {
    array_push($error, 'Invoice date format error');
}

if (!$date_expiration || $date_expiration == "") {
    array_push($error, 'Expiration date is mandatory');
}

if (!is_date($date_expiration)) {
    array_push($error, 'Expiration date format error');
}

// si las fechas tiene el formato correcto, 
// 
if (is_date($invoice_date) && is_date($date_expiration)) {
    // date 
    $diff = date_diff(date_create($invoice_date), date_create($date_expiration));
    $diff_days = $diff->format('%R%a');

    // si la date es superior a $date_expiration da error
    if ($diff_days < 0) {
        array_push($error, 'The expiration date must be greater than or equal to the date of the invoice');
    }
}
################################################################################
################################################################################
################################################################################
################################################################################
//foreach ($clients_id as $client_id) {
//
//    // fecha de expiracion no puede ser inferior a la fecha actual 
//    if ($diff_days < 0) {
//        array_push($error, 'Expiration date must be after today, or today');
//    }
////    if (invoices_field_id('id', $id)) {
////        array_push($error, 'Invoice number already exist');
////    }
//    //$year = magia_dates_get_year_from_date($date_registre);
$year = magia_dates_get_year_from_date(date('Y'));
//    // si el pais de la direccion de facturacion es diferente al pais de BE
//    // pongo el comentario "Autoliquidacion"
//    //vardump(_options_option('config_company_a_country'));
//    //vardump($addresses_billing_json);
//    //
//    //die(); 
//}
################################################################################

if (!$error) {

    foreach ($clients_id as $client_id) {

        $code = magia_uniqid();

        invoices_add_by_client_id_and_invoice_number(
                invoices_next_number(), $office_id, $client_id, $code, $date_expiration, 0
        );

        $lastInsertId = invoices_field_code("id", $code);
        ############################################################################ 
        # Actualizo la fecha de inicion "invoice_date"
        invoices_update_date($lastInsertId, $invoice_date);

        ############################################################################
        #
        #    
        // ingreso en el contador 
        invoices_counter_add(
                $lastInsertId, $year, invoices_counter_next_number($year)
        );

        if ($lastInsertId) {

            // actualizo las direcciones 

            $addresses_billing_json = json_encode(addresses_billing_by_contact_id(contacts_field_id("owner_id", $client_id)));
            $addresses_delivery_json = json_encode(addresses_delivery_by_contact_id($client_id));

            // actulizo el titulo de la factura
            invoices_title_update($lastInsertId, $title);

            // actualizo la comunicacion extructurada segun el id creado 
            invoices_update_ce($lastInsertId, generate_structured_communication($lastInsertId));

            // actualizo la direccion de facturacion
            invoices_update_billing_address($lastInsertId, $addresses_billing_json);

            // actualizo la direccion de entrega
            invoices_update_delivery_address($lastInsertId, $addresses_delivery_json);

            // agrega los mensajes de exoneration de la ttva
            // • Pour les livraisons de bien hors Belgique/intra europe, la mention est : 
            // Autoliquidation – Article 146 directive TVA
            // 
            // • Pour les livraisons de bien hors europe, la mention est : 
            // Exonération – Article 39 du Code TVA 
            // debe estar despues de la direcciones sino da error
            // 
            // 
            // 
            // 
            //invoices_add_comment_automatically($lastInsertId);
//        // agrego una linea de los recordatorios que tenga esta compania
//        foreach (reminders_invoices_list_by_company_id($owner_id) as $key => $ri) {                        
//            
//            // agrego la linea
//            invoice_lines_add($lastInsertId, $ri['reminder'], 1, "Reminder " . $ri['reminder'] . " invoice " . $ri['invoice_id'] , 100, 0, '%', 21, 0, 0); 
//            
//            // agrego la factura de destino de los rappels                        
//            reminders_invoices_update_invoice_to($ri['invoice_id'], 'r1', $lastInsertId); 
//            
//        }
            // actualizo los totales de la factura 
            invoices_update_total_tax($lastInsertId, invoice_lines_totalHTVA($lastInsertId), invoice_lines_totalTVA($lastInsertId));

            // si mandamos pedimos una factura mensual
            invoices_update_type($lastInsertId, 'M');
//            if ($type == "M") {
//                invoices_update_type($lastInsertId, 'M');
//            }
//            if ($type == "I") {
//                invoices_update_type($lastInsertId, 'I');
//            }
            ############################################################################
            ############################################################################
            ############################################################################
            $id = $lastInsertId;

            $level = null;
            $date = null;
            //$u_id
            //$u_rol , 
            //$c , $a , 
            $w = null;
            $description = "Create a new invoice: $id";
            $doc_id = $id;
            $crud = "read";
            $error = null;
            $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
            $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
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




    switch ($redi) {
        case 1:
            header("Location: index.php?c=budgets&a=details&id=$budget_id");
            break;
        case 2:
            header("Location: index.php?c=invoices&a=create_monhtly&month=$mont&year=$year");
            break;

        default:
            header("Location: index.php?c=invoices&a=edit&id=$lastInsertId");
            break;
    }
} else {

    include view("home", "pageError");
}
