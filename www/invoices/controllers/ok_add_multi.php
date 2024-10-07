<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
/**
 * Agrega multiples facturas
 */
$multi = (isset($_REQUEST["multi"])) ? clean($_REQUEST["multi"]) : null;

foreach ($multi as $key => $inv) {



    $id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : invoices_next_number();
    $office_id = (isset($_REQUEST["office_id"]) && $_REQUEST["office_id"] != "" ) ? clean($_REQUEST["office_id"]) : 1022;
    $budget_id = (isset($_REQUEST["budget_id"])) ? clean($_REQUEST["budget_id"]) : null;

    //$title = (isset($_REQUEST["title"]) && ($_REQUEST["title"]) != "" ) ? clean($_REQUEST["title"]) : '';
    $title = $inv['title'];

    $credit_note_id = (isset($_REQUEST["credit_note_id"])) ? clean($_REQUEST["credit_note_id"]) : null;
    $client_id = (isset($_REQUEST["client_id"])) ? clean($_REQUEST["client_id"]) : null;
    $sellers_id = (isset($_REQUEST["sellers_id"])) ? clean($_REQUEST["sellers_id"]) : null;
// Dates
    $date = (isset($_REQUEST["date"])) ? clean($_REQUEST["date"]) : null;
//
    $date_registre = (isset($_REQUEST["date_registre"])) ? clean($_REQUEST["date_registre"]) : date('Y-m-d');
//
//$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "" ) ? clean($_REQUEST["date_expiration"]) : magia_dates_add_day($date, _options_option('config_invoices_expiration_days'));
    //$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "" ) ? clean($_REQUEST["date_expiration"]) : _options_option('config_invoices_expiration_days');

    $date_expiration = $inv['date_expiration'];
    //$date_expiration = magia_dates_add_day(date("Y-m-d"), $date_expiration);
// 
// 
    //$diff = date_diff(date_create(date("Y-m-d")), date_create($date_expiration));
// diferencia de dias entre hoy y expiracio days,
// esta debe ser cero o superior a cero 
//    $diff_days = $diff->format('%R%a');
//
//
    $total = (isset($_REQUEST["total"])) ? clean($_REQUEST["total"]) : null;
    $total = $inv['total'];

    $tax = (isset($_REQUEST["tax"])) ? clean($_REQUEST["tax"]) : null;
    $advance = (isset($_REQUEST["advance"])) ? clean($_REQUEST["advance"]) : null;
    $balance = (isset($_REQUEST["balance"])) ? clean($_REQUEST["balance"]) : null;
    $comments = (isset($_REQUEST["comments"])) ? clean($_REQUEST["comments"]) : null;
    $comments_private = (isset($_REQUEST["comments_private"])) ? clean($_REQUEST["comments_private"]) : null;
    $r1 = (isset($_REQUEST["r1"])) ? clean($_REQUEST["r1"]) : null;
    $r2 = (isset($_REQUEST["r2"])) ? clean($_REQUEST["r2"]) : null;
    $r3 = (isset($_REQUEST["r3"])) ? clean($_REQUEST["r3"]) : null;
    $fc = (isset($_REQUEST["fc"])) ? clean($_REQUEST["fc"]) : null;
    $date_update = (isset($_REQUEST["date_update"])) ? clean($_REQUEST["date_update"]) : null;
    $days = (isset($_REQUEST["days"])) ? clean($_REQUEST["days"]) : null;
    $ce = (isset($_REQUEST["ce"])) ? clean($_REQUEST["ce"]) : null;
    $code = magia_uniqid();
// el estatus por defecto segun la configuracion
    $status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : _options_option("config_invoices_checked_by_default");
    $type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
//
    $redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;
// la sede
    $owner_id = contacts_field_id("owner_id", $client_id);
//
//$addresses_billing_json = json_encode(addresses_billing_by_contact_id(invoices_field_id("client_id" , $id))) ;
    $addresses_billing_json = json_encode(addresses_billing_by_contact_id($owner_id));
    $addresses_delivery_json = json_encode(addresses_delivery_by_contact_id($client_id));
//
    $discounts_mode = null;
    $price = null;
    $discounts = null;
    $quantity = null;
    $tax = null;
// extraction año de una fecha 
    $error = array();
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
    if (!$owner_id) {
        array_push($error, '$owner_id is mandatory');
    }
################################################################################
// formato 
    if ($id && !is_id($id)) {
        array_push($error, 'Invoice number format error');
    }
################################################################################
#************************************************************************
#************************************************************************
// Busca si ya existe el texto en la BD
//if (invoices_search($status)) {
//array_push($error, "That text with that context the database already exists");
//}

    if ($discounts_mode != "%" && $discounts > $price) {
        array_push($error, 'The discount cannot exceed the price');
    }
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
    if ($quantity) {
        $quantity = abs($quantity);
    }
    if ($price) {
        $price = abs($price);
    }
    if ($discounts) {
        $discounts = abs($discounts);
    }
    if ($tax) {
        $tax = abs($tax);
    }

    if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
        array_push($error, 'The discount cannot exceed the price');
    }

    if ($discounts_mode == "%" && $discounts > 100) {
        array_push($error, 'The discount cannot exceed 100%');
    }

// fecha de expiracion no puede ser inferior a la fecha actual 
    if ($diff_days < 0) {
        array_push($error, 'Expiration date must be after today, or today');
    }
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// Vamos a evitar que el cliente mande un numero de factura
    if (isset($id) && invoices_field_id('id', $id)) {
        array_push($error, 'Invoice number already exist');
    }


//$year = magia_dates_get_year_from_date($date_registre);
    $year = magia_dates_get_year_from_date(date('Y'));

// si el pais de la direccion de facturacion es diferente al pais de BE
// pongo el comentario "Autoliquidacion"
//vardump(_options_option('config_company_a_country'));
//vardump($addresses_billing_json);
//
//die(); 
################################################################################


    invoices_add_by_client_id_and_invoice_number(
            $id, $office_id, $owner_id, $code, $date_expiration, $status
    );

    $lastInsertId = invoices_field_code("id", $code);

    ############################################################################ 
    ############################################################################
    #
    #    
// ingreso en el contador 
    invoices_counter_add(
            $lastInsertId, $year, invoices_counter_next_number($year)
    );

    if ($lastInsertId) {

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
//        


        invoice_lines_add($lastInsertId, magia_uniqid(), 1, $title, $total, 0, '%', 0, 1, 1);

        // actualizo los totales de la factura 
        invoices_update_total_tax($lastInsertId, invoice_lines_totalHTVA($lastInsertId), invoice_lines_totalTVA($lastInsertId));

        // si mandamos pedimos una factura mensual 
        if ($type == "M") {
            invoices_update_type($lastInsertId, 'M');
        }
        if ($type == "I") {
            invoices_update_type($lastInsertId, 'I');
        }



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
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices");
            break;

        default:
            header("Location: index.php?c=invoices");
            break;
    }
} else {

    include view("home", "pageError");
}
